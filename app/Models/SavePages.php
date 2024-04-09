<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavePages extends Model
{
    use HasFactory;
    protected $table = "save_pages";
    
    protected $fillable = ['category_name','select_icon','hide_cat','ena_pro','save_page_id'];
}
