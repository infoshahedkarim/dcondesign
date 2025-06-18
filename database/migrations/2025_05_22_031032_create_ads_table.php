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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('subtitle');
            $table->string('img');
            $table->string('price')->nullable()->change();
             $table->unsignedBigInteger('place_id')->nullable()->change();
    $table->unsignedBigInteger('category_id')->nullable()->change();
            $table->longText('des');
             $table->string('contact')->nullable()->change();
            $table->boolean('premium_ads')->default(false);
            $table->timestamps();

            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
