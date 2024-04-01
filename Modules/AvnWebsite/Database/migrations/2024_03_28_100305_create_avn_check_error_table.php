<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('status_code');
            $table->unsignedBigInteger('website_id');
            $table->foreign('website_id')->references('id')->on('table_avn_websites')->onDelete('cascade')->onUpdate('cascade');            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('websites');
    }
};
