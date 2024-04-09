<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    
    protected $fillable = ['collection_id','title','vendor','product_type','handle','tags','status','images','variants','body_html'];
}
