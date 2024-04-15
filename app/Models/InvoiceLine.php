<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    use HasFactory;
    protected $table = "TInvoiceLines";
    public $timestamps = false;
    protected $primaryKey = "AllLineId";
    protected $fillable = [
        "InvoiceLineId",
        "InvoiceFId",
        "Amount",
        "LineNum",
        "DetailType",
    ];
}