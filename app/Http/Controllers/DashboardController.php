<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SaveValData;
use App\Models\SaveCollection;
use App\Models\SaveBlogs;
use App\Models\SavePages;
use App\Models\CategoryFaq;
use App\Models\FontAwesome;
use DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->shop;
        $save_data_det = SaveValData::where('shop_name',$shop)->orderBy('id', 'DESC')->get();
        $ids = $save_data_det->pluck('id')->toArray();
        $faqCategories = CategoryFaq::whereIn('category_id', $ids)->get();
        $categories = $faqCategories->pluck('category_name')->toArray();
        $font_awesome = FontAwesome::all();
        return view('faq.dashboard',compact('shop','save_data_det','font_awesome','faqCategories','categories'));
    }

    public function createfaq(Request $request){
        $shop = $request->shop;
        $save_data_det = SaveValData::where('shop_name',$shop)->orderBy('id', 'DESC')->get();
        $font_awesome = FontAwesome::all();
        return view('faq.create',compact('shop','save_data_det','font_awesome'))->with('success', 'User Deleted successfully.');
    }


    public function custom_collection($shop_name)
    {
        $custom_collection = User::where('name',$shop_name)->get()->first();

        $curl = curl_init();
        $theme_url = 'https://'.env('SHOPIFY_API_KEY').':'.$custom_collection->password.'@'.$shop_name.'/admin/api/2023-10/custom_collections.json';
        curl_setopt_array($curl, array(
          CURLOPT_URL => $theme_url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
       curl_close($curl);
       $custom_collection = json_decode($response);

        return $custom_collection;
    }
    public function all_product($shop_name){

        $all_pro = User::where('name',$shop_name)->get()->first();
        $curl = curl_init();
        $theme_url = 'https://'.env('SHOPIFY_API_KEY').':'.$all_pro->password.'@'.$shop_name.'/admin/api/2023-10/products.json';
        curl_setopt_array($curl, array(
          CURLOPT_URL => $theme_url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
       curl_close($curl);
       $store_prod = json_decode($response);

        return $store_prod;
    }
    public function get_all_blogs($shop_name){
        $all_blogs = User::where('name',$shop_name)->get()->first();

        $curl = curl_init();
        $theme_url = 'https://'.env('SHOPIFY_API_KEY').':'.$all_blogs->password.'@'.$shop_name.'/admin/api/2023-10/blogs.json';
        curl_setopt_array($curl, array(
          CURLOPT_URL => $theme_url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
       curl_close($curl);
       $store_blogs = json_decode($response);

        return $store_blogs;
    }

    public function get_all_pages($shop_name){
      $all_pages = User::where('name',$shop_name)->get()->first();
      $curl = curl_init();
      $theme_url = 'https://'.env('SHOPIFY_API_KEY').':'.$all_pages->password.'@'.$shop_name.'/admin/api/2023-10/pages.json';
      curl_setopt_array($curl, array(
        CURLOPT_URL => $theme_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      ));
      
      $response = curl_exec($curl);
      
     curl_close($curl);
     $store_pages = json_decode($response);

      return $store_pages;
  }




    public function show_save_data(){
      // $sav_val = SaveValData();
    }

    public function save_val_data(Request $request){
      $input = $request->all();
      // dd($input);
      if(isset($input['pro_valll_id']))
      {
        $pro_val = explode(",",$input['pro_valll_id']);
        foreach($pro_val as $val){
          $sav_val = new SaveValData();
          $sav_val->shop_name = $input['shop_name'];
          $sav_val->category_name = $input['category_name'];
          $sav_val->select_icon = $input['select_icon'];
          $sav_val->hide_cat = $input['hide_cat'];
          $sav_val->ena_pro = $input['ena_pro'];
          $sav_val->pro_valll_id = $val;
          $sav_val->type= $input['type'];
          $sav_val->save();
        }
        return 1;
      }elseif(isset($input['collection_val'])){
        $coll_val = explode(",",$input['collection_val']);
        foreach($coll_val as $col_val){
          $sav_val = new SaveValData();
          $sav_val->shop_name = $input['shop_name'];
          $sav_val->category_name = $input['category_name'];
          $sav_val->select_icon = $input['select_icon'];
          $sav_val->hide_cat = $input['hide_cat'];
          $sav_val->ena_pro = $input['ena_pro'];
          $sav_val->collection_val_id = $col_val;
          $sav_val->type= $input['type'];
          $sav_val->save();
        }
        return 1;
      }elseif(isset($input['blogs_val'])){
        $blogs_val = explode(",",$input['blogs_val']);
        foreach($blogs_val as $blog_val){
          $sav_val = new SaveValData();
          $sav_val->shop_name = $input['shop_name'];
          $sav_val->category_name = $input['category_name'];
          $sav_val->select_icon = $input['select_icon'];
          $sav_val->hide_cat = $input['hide_cat'];
          $sav_val->ena_pro = $input['ena_pro'];
          $sav_val->blogs_val_id = $blog_val;
          $sav_val->type= $input['type'];
          $sav_val->save();
        }
        return 1;
      }elseif(isset($input['pages_val'])){
        $pages_val = explode(",",$input['pages_val']);
        
        foreach($pages_val as $page_val){
          $sav_val = new SaveValData();
          $sav_val->shop_name = $input['shop_name'];
          $sav_val->category_name = $input['category_name'];
          $sav_val->select_icon = $input['select_icon'];
          $sav_val->hide_cat = $input['hide_cat'];
          $sav_val->ena_pro = $input['ena_pro'];
          $sav_val->save_page_id = $page_val;
          $sav_val->type= $input['type'];
          $sav_val->save();
        }
        return 1;
      }
      
      

      

    }
    public function update_pro_status(Request $request) {
      $val_upds = $request->pro_check_val;
     
      $val_upd =  DB::table('save_val_data')
            ->where('shop_name',$request->shop_name)
            ->where('pro_valll_id',$request->row)
            ->update(['ena_pro'=>$val_upds]);
      return $val_upd;
    }

    public function get_faq_data(Request $request){
      $faq = CategoryFaq::where('category_id',$request->id)->orderBy('id','DESC')->get();
      return json_encode($faq);
      // return view('welcome',compact('faq','shop','save_data_det'));
    }
  

    public function save_faq_data(Request $request){
        $input = $request->all();
        $category = SaveValData::where('category_name', $input['faq_category'])->first();
        if(isset($input))
        {
          $sav_faq_val = new CategoryFaq();
          $sav_faq_val->category_id = $category->id;
          $sav_faq_val->category_name = $input['faq_category'];
          $sav_faq_val->faq_qus = $input['faq_questions'];
          $sav_faq_val->faq_slug = $input['faq_slug'];
          $sav_faq_val->faq_close_icon = $input['faq_close_icon'];
          $sav_faq_val->faq_open_icon = $input['faq_open_icon'];
          $sav_faq_val->faq_product_enable = $input['ena_pro_toggle'];
          $sav_faq_val->faq_ans = $input['content'];
          $sav_faq_val->save();
          return 1;
        }
       
    }
    public function recurringAppCharge(){
      $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://b2fef71648e22a22718782b92a48ff96:shpua_32e83d4c3a8b4bd22b225703bf8eebcb@quickstart-b98cddd8.myshopify.com/admin/api/2023-10/recurring_application_charges.json',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{"recurring_application_charge":{"name":"Super Duper Plan","price":10.0,"return_url":"http://super-duper.shopifyapps.com","test":true}}' ,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;


    }
    public function show_faq_product()
    {
      $data = DB::table('save_val_data')
              ->join('category_faqs','save_val_data.id','=','category_faqs.category_id')
              ->where('save_val_data.type','=','Product')
              ->get();
       return $data;      
    }
    public function show_faq_collection()
    {
      $data = DB::table('save_val_data')
              ->join('category_faqs','save_val_data.id','=','category_faqs.category_id')
              ->where('save_val_data.type','=','Collections')
              ->get();
              return $data;  
    }
    public function show_faq_page()
    {
      $data = DB::table('save_val_data')
              ->join('category_faqs','save_val_data.id','=','category_faqs.category_id')
              ->where('save_val_data.type','=','Pages')
              ->get();
              return $data;       
    }
    public function show_faq_blogs()
    {
      $data = DB::table('save_val_data')
              ->join('category_faqs','save_val_data.id','=','category_faqs.category_id')
              ->where('save_val_data.type','=','Blogs')
              ->get();
              return $data;  
    }
    public function update_category_data(Request $request){
      $hide_cat_val = $request->hide_cat_name_update;
      if($hide_cat_val == 'false')
      {
        $hide_cat_vals = 0;
      }else{
        $hide_cat_vals = 1;
      }

      if($request->category_type == "Product"){
        SaveValData::where('id',$request->id)->where('shop_name',$request->shop)->update([
         'category_name'=>$request->category_name_update,
         'select_icon'=>$request->select_icon_update,
         'hide_cat' =>$hide_cat_vals,
         'ena_pro' =>$request->ena_update_pro_toggle,
         'pro_valll_id' =>$request->cat_pro_id,
          'type' => $request->category_type
        ]);
        return 1;
      }elseif($request->category_type == "Collections")
      {
        SaveValData::where('id',$request->id)->where('shop_name',$request->shop)->update([
          'category_name'=>$request->category_name_update,
          'select_icon'=>$request->select_icon_update,
          'hide_cat' =>$hide_cat_vals,
          'ena_pro' =>$request->ena_update_pro_toggle,
          'collection_val_id' =>$request->cat_coll_id,
           'type' => $request->category_type
         ]);
         return 1 ;
      }elseif($request->category_type == "Blogs"){
        SaveValData::where('id',$request->id)->where('shop_name',$request->shop)->update([
          'category_name'=>$request->category_name_update,
          'select_icon'=>$request->select_icon_update,
          'hide_cat' =>$hide_cat_vals,
          'ena_pro' =>$request->ena_update_pro_toggle,
          'blogs_val_id' =>$request->cat_blogs_id,
           'type' => $request->category_type
         ]);
         return 1 ;
      }elseif($request->category_type == "Pages")
      {
        SaveValData::where('id',$request->id)->where('shop_name',$request->shop)->update([
          'category_name'=>$request->category_name_update,
          'select_icon'=>$request->select_icon_update,
          'hide_cat' =>$hide_cat_vals,
          'ena_pro' =>$request->ena_update_pro_toggle,
          'save_page_id' =>$request->cat_pages_id,
           'type' => $request->category_type
         ]);
         return 1 ;
      }
    }

    public function del_category(Request $request){
      $id = $request->id;
      $res=SaveValData::where('id',$id)->delete();
      return $res;
    }
    public function del_faq_qusans(Request $request){
     $id= $request->id;
     $res=CategoryFaq::where('id',$id)->delete();
     return $res;
    }
    public function update_faq_data(Request $request){
        // dd($request->all());
        $input = $request->all();
        $faq_update = CategoryFaq::where('id',$request->id)->update(
          [
          'category_id'=>$input['faq_qus_ans_cid'],
          'category_name'=>$input['faq_qus_ans_name'],
          'faq_qus'=>$input['faq_qus_ans_qus'],
          'faq_slug'=>$input['faq_qus_ans_slug'],
          'faq_close_icon'=>$input['faq_close_icon_update'],
          'faq_open_icon'=>$input['faq_open_icon_update'],
          'faq_product_enable'=>$input['update_ena_pro_toggle'],
          'faq_ans'=>$input['content_update'],
        ]
      );
        return $faq_update;
    }
    public function update_status_faq(Request $request){
      $val_upds = $request->pro_check_val_update;
     
      $val_upd =  CategoryFaq::where('id',$request->id)
            ->update(['faq_product_enable'=>$val_upds]);
      return $val_upd;
    }
}
