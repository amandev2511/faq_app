<?php

namespace App\Http\Controllers;

use App\Models\SquareLocation;
use App\Models\SquareSetting;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Hash;
class AuthController extends Controller
{
    public function index(Request $request)
    {
        $inputs = $request->all();

        if (!isset($inputs['shop'])) {
            abort(403);
            die;
        }

        $shopifyApiKey = env('SHOPIFY_API_KEY');
        $shopUrl = $inputs['shop'];
        $redirectUri = env('APP_URL') . "/authenticate";

        // Step 1: Redirect the user to the Shopify authorization page
        $authorizationUrl = "https://$shopUrl/admin/oauth/authorize?client_id=$shopifyApiKey&scope=read_products,write_products,write_script_tags,read_price_rules,read_checkouts,write_checkouts,read_content,write_content,read_products,write_products,read_product_listings,read_cart_transforms,write_cart_transforms&redirect_uri=$redirectUri";

        // Redirect the user to the authorization URL
        header("Location: $authorizationUrl");
        exit();
    }

    public function authenticate(Request $request)
    {
        $shop_name = explode('.',$request->shop);
        // if(\Session::get('accessToken')) 
        // {
            
        //     return redirect('https://admin.shopify.com/store/'.$shop_name[0].'/apps/'.env('SHOPIFY_APP_NAME'));
        // }
        $inputs = $request->all();
        try {
            $shopifyApiKey = env('SHOPIFY_API_KEY');
            $shopifyApiSecret = env("SHOPIFY_API_SECRET");
            $shopUrl = $inputs['shop'];
            // Step 2: After the user approves the app, Shopify will redirect back to the specified redirect URI with a temporary code

            // Step 3: Use cURL to exchange the temporary code for a permanent access token
            $accessTokenUrl = "https://$shopUrl/admin/oauth/access_token";
            $code = $inputs['code']; // Retrieve the temporary code from the URL
            $data = array(
                'client_id' => $shopifyApiKey,
                'client_secret' => $shopifyApiSecret,
                'code' => $code
            );
            $options = array(
                CURLOPT_URL => $accessTokenUrl,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query($data),
                CURLOPT_RETURNTRANSFER => true,
            );

            $curl = curl_init();
            curl_setopt_array($curl, $options);
            $response = curl_exec($curl);

            curl_close($curl);
            //dd($response);

            $result = json_decode($response, true);
           
            if (isset($result['access_token'])) {
                $accessToken = $result['access_token'];

                //store user in db
                (new User)->updateOrCreate($shopUrl, $accessToken);
                
                $this->registerWebhook($shopUrl, $accessToken);
            } else {
                abort(403, 'Could not fetch access token');
                die;
            }
            $password_value = Hash::make($accessToken);
            $userDetail = User::where('name', $shopUrl)->first();
            \Session::put('accessToken', $accessToken);
            \Session::put('shopName', $shopUrl);
            \Session::put('userId', $userDetail->id);
            $shop_name = $userDetail->name;
            return redirect()->route('dashboard', ['shop'=>$shop_name]);

        } catch (Exception $e) {
            dd($e);
            abort(500, $e->getMessage());
            die;
        }
    }

    

    public function registerWebhook($shopUrl, $accessToken)
    {

        $url = env('APP_URL') . "/api/uninstalled/" . $shopUrl;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://' . $shopUrl . '/admin/api/' . env('SHOPIFY_API_VERSION') . '/webhooks.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "webhook": {
                    "address": "' . $url . '",
                    "topic": "app/uninstalled",
                    "format": "json"
                }
            }',
            CURLOPT_HTTPHEADER => array(
                'X-Shopify-Access-Token: ' . $accessToken,
                'Content-Type: application/json'
            ),
        ));

        curl_exec($curl);
        curl_close($curl);

        return true;
    }

    public function appUninstalled($shop)
    {
        User::where('name', $shop)->update(['password' => '']);
    }

    
}
