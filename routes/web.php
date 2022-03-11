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

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::resource('users',\App\Http\Controllers\UserController::class);
    Route::resource('sectors',\App\Http\Controllers\SectorController::class);
    Route::resource('companies',\App\Http\Controllers\CompanyController::class);
    Route::resource('opportunities',\App\Http\Controllers\OpportunityController::class);
    Route::resource('carriers',\App\Http\Controllers\CarrierController::class);
    Route::resource('services',\App\Http\Controllers\ServiceController::class);

    //Leads
    Route::get('leads',[\App\Http\Controllers\LeadController::class,'index'])
        ->name('leads.index');
    Route::get('leads/create',[\App\Http\Controllers\LeadController::class,'create'])
        ->name('leads.create');
    Route::post('leads/process',[\App\Http\Controllers\LeadController::class,'debug'])
        ->name('leads.process');
    Route::get('leads/{lead}',[\App\Http\Controllers\LeadController::class,'show'])
        ->name('leads.show');
    Route::get('leads/export/leads', function(\App\DataTables\CompaniesDataTable $dataTable) {
        return $dataTable->render('exports.index');
    })->name('leads.export');


    //Opportunities
    Route::get('verify/oportunities',[\App\Http\Controllers\OpportunityController::class, 'verify'])
        ->name('opportunities.verify');
    Route::post('store_complement/oportunities',[\App\Http\Controllers\OpportunityController::class, 'storeAndComplement'])
        ->name('opportunities.store_complement');
    Route::post('oportunities/{company?}',[\App\Http\Controllers\OpportunityController::class, 'store'])
        ->name('opportunities.store');
    Route::get('opportunities/dispatch_opportunity/{company}/{type?}',[\App\Http\Controllers\OpportunityController::class, 'dispatch_opportunity'])
        ->name('opportunities.dispatch_opportunity');
    Route::get('opportunities/add_service/{opportunity}',[\App\Http\Controllers\OpportunityController::class, 'add_service'])
        ->name('opportunities.add_service');
    Route::post('oportunities/store_add_service/{opportunity}',[\App\Http\Controllers\OpportunityController::class, 'store_add_service'])
        ->name('opportunities.store_add_service');

    //Carriers
    Route::get('carriers/sources/create/{carrier}',[\App\Http\Controllers\CarrierController::class, 'create_source'])
        ->name('carriers.create_source');
    Route::get('carriers/sources/edit/{source}',[\App\Http\Controllers\CarrierController::class, 'edit_source'])
        ->name('carriers.edit_source');
    Route::post('carriers/sources/{carrier}/store',[\App\Http\Controllers\CarrierController::class, 'store_source'])
        ->name('carriers.store_source');
    Route::put('carriers/sources/{source}/update',[\App\Http\Controllers\CarrierController::class, 'update_source'])
        ->name('carriers.update_source');

    Route::get('/teste/debug',[\App\Http\Controllers\LeadController::class,'debug']);

});

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');
Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


require __DIR__.'/auth.php';
