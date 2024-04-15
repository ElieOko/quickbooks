<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = "TInvoices";
    protected $primaryKey = "InvoiceId";

    public $timestamps = false;
    protected $fillable = [
        'InvoiceId', //
        'Balance', //
        'DocNumber', //
        'DueDate', //
        'TotalAmt', //
        'SalesTermRef',
        'PrintStatus', //
        'Domain', //
        'TxnDate', //
        'Sparse', //
        'SyncToken', //
        'EmailStatus', //
        "AllowIPNPayment",
        "AllowOnlinePayment",
        "AllowOnlineCreditCardPayment",
        "AllowOnlineACHPayment",
        "EInvoiceStatus",
        "GlobalTaxCalculation"
    ];
}