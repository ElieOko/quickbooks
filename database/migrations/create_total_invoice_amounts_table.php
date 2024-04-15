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
        Schema::create('TTotalInvoiceAmounts', function (Blueprint $table) {
            $table->id("TotalInvoiceAmountId");
            $table->integer("InvoiceFId")->nullable();
            $table->integer("Amount")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TTotalInvoiceAmounts');
    }
};