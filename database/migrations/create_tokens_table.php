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
        Schema::create('TTokens', function (Blueprint $table) {
            $table->integer("TokenId")->unique();
            $table->string("token_type")->nullable();
            $table->text("access_token")->nullable();
            $table->text("refresh_token")->nullable();
            $table->string("x_refresh_token_expires_in")->nullable();
            $table->string("expires_in")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TTokens');
    }
};