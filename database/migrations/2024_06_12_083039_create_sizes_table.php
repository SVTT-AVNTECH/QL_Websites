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
<<<<<<<< HEAD:database/migrations/2024_06_12_083039_create_sizes_table.php
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
========
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
>>>>>>>> c4d220f1aea7106517851a3701f915ddb92ce78c:database/migrations/2024_05_21_020326_create_categories_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2024_06_12_083039_create_sizes_table.php
        Schema::dropIfExists('sizes');
========
        Schema::dropIfExists('categories');
>>>>>>>> c4d220f1aea7106517851a3701f915ddb92ce78c:database/migrations/2024_05_21_020326_create_categories_table.php
    }
};
