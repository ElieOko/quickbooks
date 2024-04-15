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
        Schema::create('TAdresseEmails', function (Blueprint $table) {
            $table->id("AdresseEmailId");
            $table->integer("CustomerFId")->nullable();
            $table->integer("CompanyFId")->nullable();
            $table->string("Adresse")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TAdresseEmails');
    }
};
