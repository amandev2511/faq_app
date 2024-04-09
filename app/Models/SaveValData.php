<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveValData extends Model
{
    use HasFactory;
    protected $table = "save_val_data";
    
    protected $fillable = ['shop_name','category_name','select_icon','hide_cat','ena_pro','pro_valll_id','collection_val_id','type','blogs_val_id','save_page_id',];
}
