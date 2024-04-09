<?php

use App\Models\SquareSetting;

function getSquareLocations() 
{
    $squareAccount = getSquareAccount();
    $url = env('SQUARE_URL_SANDBOX')."/v2/locations";
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Square-Version: 2023-11-15',
            'Authorization: Bearer ' . $squareAccount->access_token,
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);
    $responseArr = json_decode($response, true);
    curl_close($curl);
    
    return ['id' => $squareAccount->id, 'data' => $responseArr];
}

function getSquareAccount() {
    $userId = \Session::get('userId');
    $result = (new SquareSetting)->where('user_id', $userId)->first();

    return $result;
}

function sanitizeShopifyHeader($header) {
    $newheader = strtolower($header);
    $newheader = str_replace(" ","_",$newheader);
    $newheader = str_replace("(","",$newheader);
    $newheader = str_replace(")","",$newheader);
    return $newheader;
}
?>