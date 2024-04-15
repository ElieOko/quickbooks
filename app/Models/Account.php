<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = "TAccounts";
    protected $primaryKey = "AccountId";

    public $timestamps = false;
    protected $fillable = [
        'AccountId',
        'AccountType',
        'AccountSubType',
        'Active',
        'Classification',
        'CurrencyFId',
        'CurrentBalance',
        'CurrentBalanceWithSubAccounts',
        'Domain',
        'FullyQualifiedName',
        'Name',
        'Sparse',
        'SubAccount',
        'SyncToken',
    ];
}