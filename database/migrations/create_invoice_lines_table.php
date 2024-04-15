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
        Schema::create('TInvoiceLines', function (Blueprint $table) {
            $table->id("AllLineId");
            $table->integer("InvoiceLineId")->nullable();
            $table->integer("InvoiceFId")->nullable();
            $table->string("DetailType")->nullable();
            $table->string("LineNum")->nullable();
            $table->integer("Amount")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TInvoiceLines');
    }
};