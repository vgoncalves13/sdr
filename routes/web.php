<?php

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

Route::prefix('admin')->group(function (){
    Route::resource('users',\App\Http\Controllers\UserController::class);
    Route::resource('sectors',\App\Http\Controllers\SectorController::class);
    Route::resource('companies',\App\Http\Controllers\CompanyController::class);
    Route::resource('opportunities',\App\Http\Controllers\OpportunityController::class);
    Route::get('verify/oportunities',[\App\Http\Controllers\OpportunityController::class, 'verify'])
        ->name('opportunities.verify');

    //

    Route::post('store_complement/oportunities',[\App\Http\Controllers\OpportunityController::class, 'storeAndComplement'])
        ->name('opportunities.store_complement');
    Route::post('oportunities/{company?}',[\App\Http\Controllers\OpportunityController::class, 'store'])
        ->name('opportunities.store');

});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',function (){
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
