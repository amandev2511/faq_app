<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveBlogs extends Model
{
    use HasFactory;
    protected $table = "save_blogs";
    
    protected $fillable = ['category_name','select_icon','hide_cat','ena_pro','collection_val_id'];
}
