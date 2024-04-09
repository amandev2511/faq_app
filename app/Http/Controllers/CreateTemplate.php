<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\htmlTemplate;
class CreateTemplate extends Controller
{
    public function show_template(Request $request)
    {
        if($request->shop)
        {
            $shop = $request->shop;
        }else{
            $shop = $_GET["shop"];
        }
        
        $template = htmlTemplate::where('shop_name',$shop)->get();
        return view('show_template',compact('template','shop'));
    }
    public function create_template(Request $request){
        $shop = $request->shop;
        return view("create_template",compact("shop"));
    }
    public function save_template(Request $request)
    {
        $html_create = $request->htmldata;
        $css_data = $request->cssdata;
        $shop_name = $request->shop_name;
        if($html_create)
        {
            $new_template = new htmlTemplate();
            $new_template->shop_name = $shop_name;
            $new_template->css_data = $css_data;
            $new_template->html_data = $html_create;
            $new_template->save();
            return $new_template;
        }else{
            return 0;
        }
    }
    public function edit_template(Request $request)
    {
        $shop = $request->shop;
        $template = htmlTemplate::where('id',$request->id)->get();
        return view('update_template',compact('template','shop'));
    }
    public function update_template(Request $request)
    {
        
        $template = htmlTemplate::where('id',$request->id)->update(['html_data' => $request->htmldata,"css_data" => $request->cssdata]);
        return $template;
    }
    public function delete_template(Request $request)
    {
        $template = htmlTemplate::where('id',$request->id)->delete();
    }
}
