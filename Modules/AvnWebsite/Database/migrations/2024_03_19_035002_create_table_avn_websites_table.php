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
        Schema::create('table_avn_websites', function (Blueprint $table) {
            $table->id();
            $table->text('url');
            $table->date('domain_date_register');
            $table->date('domain_date_expried');
            $table->text('domain_info');
            $table->date('hosting_date_register');
            $table->date('hosting_date_expried');
            $table->text('hosting_info');
            $table->text('note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_avn_websites');
    }
};
