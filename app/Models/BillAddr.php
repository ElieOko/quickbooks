<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBillAddr extends Model
{
    use HasFactory;
    protected $table = "TBillAddrs";
    protected $primaryKey = "BillAddrId";

    public $timestamps = false;
    protected $fillable = [
        'BillAddrId',
        'CustomerFId',
        'EmployeeFId',
        'VendorFId',
        'CompanyFId',
        'City',
        'Lines',
        'PostalCode',
        'Latitude',
        'Longitude',
        'CountrySubDivisionCode'
    ];
}