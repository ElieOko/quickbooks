<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TokenBackupController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|processCode/refresh_token/getInvoiceQueryAll//
*/

Route::get('/user/oauth', [UserController::class, 'oauth_quickbooks']);
Route::get('/callback', [UserController::class, 'processCode']);
Route::get('/redirect', [UserController::class, 'redirect_to']);//
Route::get('/backup/token', [TokenBackupController::class, 'index']);
Route::post('/create/department', [DepartmentController::class, 'store']);
Route::post('/create/employee', [EmployeeController::class, 'store']);
Route::post('/create/vendor', [VendorController::class, 'store']);
Route::get('/refresh_token/quickbook/{token}', [UserController::class, 'refresh_token']);//
Route::get('/refresh_token/{last_token}', [UserController::class, 'token_fresh']);
Route::get('/qb/invoice/all', [UserController::class, 'getInvoiceQueryAll']);
Route::post('/create/account', [AccountController::class, 'store']);
Route::post('/create/customer', [CustomerController::class, 'store']);
Route::post('/create/invoice', [InvoiceController::class, 'store']);
Route::post('/create/item', [ItemController::class, 'store']);
Route::post('/create/department', [DepartmentController::class, 'store']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
