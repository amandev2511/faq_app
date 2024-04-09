<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class htmlTemplate extends Model
{
    use HasFactory;
    protected $table = "template";
    protected $fillable = ['shop_name','html_data','css_data'];
}
