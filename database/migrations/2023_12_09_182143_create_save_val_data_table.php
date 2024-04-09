<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('save_val_data', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name')->nullable();
            $table->string('category_name')->nullable();
            $table->string('select_icon')->nullable();
            $table->string('hide_cat')->nullable();
            $table->string('ena_pro')->nullable();
            $table->string('pro_valll_id')->nullable();
            $table->string('type')->nullable();
            $table->string('collection_val_id')->nullable();
            $table->string('blogs_val_id')->nullable();
            $table->string('save_page_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('save_val_data');
    }
};
