<?php

use App\Http\Controllers\Home\HeroController;
use App\Http\Controllers\Portfolio\PortfolioController;
use App\Http\Controllers\Service\ServicesController;
use App\Http\Controllers\Testmonials\TestmonialsController;
use App\Http\Controllers\WhyJoinMe\WhyJoinMeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('heros', HeroController::class);
Route::resource('whyjoinme', WhyJoinMeController::class);
Route::resource('ourservices', ServicesController::class);
Route::resource('portfolios', PortfolioController::class);
Route::resource('testimonials', TestmonialsController::class);
