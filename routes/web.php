<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PropertyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('connexion');
Route::post('/login', [LoginController::class, 'store']);

Route::middleware('auth.user')->group(function() {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign.index');

    Route::get('/property', [PropertyController::class, 'index'])->name('property.index');
    Route::put('/property/brevo_key', [PropertyController::class, 'update_brevo_key'])->name('property.update_brevo_key');
});
