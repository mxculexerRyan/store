<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\DashboardController;

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

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
    Route::get('/', function () { return view('welcome'); });

        Route::get('/sell', function () { return view('activities.trade.sell'); })->name('sell');
        Route::get('/buy', function () { return view('activities.trade.buy'); })->name('buy');

        Route::get('/tags', function () { return view('activities.products.tags'); })->name('tags');
        Route::get('/brands', function () { return view('activities.products.brands'); })->name('brands');
        Route::get('/products', function () { return view('activities.products.product'); })->name('products');

        Route::get('/bought', function () { return view('activities.prices.buying_price'); })->name('bought');
        Route::get('/sold', function () { return view('activities.prices.selling_price'); })->name('sold');
        
        Route::get('/debts', function () { return view('activities.loans.debts'); })->name('debts');
        Route::get('/credits', function () { return view('activities.loans.credit'); })->name('credit');

        Route::get('/sales', function () { return view('roster.accounting.sales'); })->name('sales');
        Route::get('/purchases', function () { return view('roster.accounting.purchases'); })->name('purchases');
        Route::get('/stock', function () { return view('roster.accounting.stock'); })->name('stock');
        Route::get('/expenses', function () { return view('roster.accounting.expenses'); })->name('expenses');
        Route::get('/commisions', function () { return view('roster.accounting.commisions'); })->name('commisions');
        Route::get('/targerts', function () { return view('roster.accounting.targerts'); })->name('targerts');
        Route::get('/asset', function () { return view('roster.accounting.assets'); })->name('asset');
        Route::get('/capital', function () { return view('roster.accounting.capital'); })->name('capital');

        Route::get('/employees', function () { return view('roster.human_resource.employees'); })->name('employees');
        Route::get('/suppliers', function () { return view('roster.human_resource.suppliers'); })->name('suppliers');
        Route::get('/customers', function () { return view('roster.human_resource.customers'); })->name('customers');
        Route::get('/partners', function () { return view('roster.human_resource.partners'); })->name('partners');

        Route::get('/menu_items', function () { return view('configurations.operations.menu_items'); })->name('menu_items');
        Route::get('/recycle_bin', function () { return view('configurations.operations.recycle_bin'); })->name('recycle_bin');
        Route::get('/system_bin', function () { return view('configurations.operations.system_bin'); })->name('system_bin');
        Route::get('/system_log', function () { return view('configurations.operations.system_log'); })->name('system_log');
        Route::get('/system_errors', function () { return view('configurations.operations.system_errors'); })->name('system_errors');

        Route::get('/admin/register', function () { return view('configurations.authentication.register'); })->name('admin.register');
        Route::get('/elevate', function () { return view('configurations.authentication.elevate'); })->name('elevate');
        Route::get('/access_control', function () { return view('configurations.authentication.acess_control'); })->name('access_control');
        Route::get('/suspend_account', function () { return view('configurations.authentication.suspend_account'); })->name('suspend_account');

        Route::get('/help', function () { return view('documentation.help'); })->name('help');
        Route::get('/terms', function () { return view('documentation.terms'); })->name('terms');
});

Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('/user/logout', [DashboardController::class, "Logout"])->name('user.logout');
});