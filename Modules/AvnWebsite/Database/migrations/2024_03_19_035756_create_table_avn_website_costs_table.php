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
        Schema::create('table_avn_website_costs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('website_id');
            $table->date('date');
            $table->text('title');
            $table->string('price');
            $table->string('type');
            $table->foreign('website_id')->references('id')->on('table_avn_websites')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_avn_website_costs');
    }
};
