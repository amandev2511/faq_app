<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFaq extends Model
{
    use HasFactory;
    protected $table = "category_faqs";
    
    protected $fillable = ['user_id','category_name','faq_qus','faq_slug','faq_close_icon','faq_open_icon','faq_product_enable','faq_ans'];
}
