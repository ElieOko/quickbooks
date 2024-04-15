<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenBackup extends Model
{
    use HasFactory;
    protected $table = "TTokenBackups";
    protected $primaryKey = "TokenId";
    public $timestamps = false;
    protected $fillable = [
        'TokenId',
        'token_type',
        'access_token',
        'refresh_token',
        'x_refresh_token_expires_in',
        'expires_in'
    ];
}