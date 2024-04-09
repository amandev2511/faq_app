<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveCollection extends Model
{
    use HasFactory;
    protected $table = "save_collections";
    
    protected $fillable = ['category_name','select_icon','hide_cat','ena_pro','pro_valll_id'];
}
