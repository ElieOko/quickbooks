<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItemLineDetailInvoice extends Model
{
    use HasFactory;
    protected $table = "TSalesItemLineDetailInvoices";
    protected $primaryKey = "SalesItemLineDetailInvoiceId";
    public $timestamps = false;
    protected $fillable = [
        'InvoiceFId',
        'LineFId',
        'Quantity',
        'UnitPrice',
        "ItemFId"
    ];
}