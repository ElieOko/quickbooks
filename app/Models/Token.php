<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    protected $table = "TTokens";
    protected $primaryKey = "TTokenId";
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