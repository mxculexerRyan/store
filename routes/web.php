<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\TagController;
use  App\Http\Controllers\FeaturesController;
use  App\Http\Controllers\DashboardController;
use  App\Http\Controllers\Trade\BuyController;
use  App\Http\Controllers\Trade\SellController;
use  App\Http\Controllers\Hr\PartnerController;
use  App\Http\Controllers\Hr\EmployeeController;
use  App\Http\Controllers\Hr\CustomerController;
use  App\Http\Controllers\Hr\SupplierController;
use  App\Http\Controllers\Products\BrandController;
use  App\Http\Controllers\Accounting\SaleController;
use  App\Http\Controllers\Products\ProductController;
use  App\Http\Controllers\Accounting\AssetController;
use  App\Http\Controllers\Accounting\OrderController;
use  App\Http\Controllers\Accounting\BudjetController;
use  App\Http\Controllers\Accounting\TargetController;
use  App\Http\Controllers\Accounting\ExpensesController;
use  App\Http\Controllers\Accounting\PurchaseController;
use  App\Http\Controllers\Hr\Service_providersController;
use  App\Http\Controllers\Prices\Buying_pricesController;
use  App\Http\Controllers\Prices\Selling_priceController;



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
});
// 1 stands for user, 2 for owner 3 for admin 
Route::middleware(['auth', 'role:3'])->group(function (){
    
    Route::get('/debts', function () { return view('activities.loans.debts'); })->name('debts');
    Route::get('/credits', function () { return view('activities.loans.credit'); })->name('credit');

    Route::get('/purchases', function () { return view('roster.accounting.purchases'); })->name('purchases');
    Route::get('/stock', function () { return view('roster.accounting.stock'); })->name('stock');
    Route::get('/commisions', function () { return view('roster.accounting.commisions'); })->name('commisions');
    Route::get('/capital', function () { return view('roster.accounting.capital'); })->name('capital');

    Route::get('/menu_items', function () { return view('configurations.operations.menu_items'); })->name('menu_items');
    Route::get('/recycle_bin', function () { return view('configurations.operations.recycle_bin'); })->name('recycle_bin');
    Route::get('/system_bin', function () { return view('configurations.operations.system_bin'); })->name('system_bin');
    Route::get('/system_log', function () { return view('configurations.operations.system_log'); })->name('system_log');
    Route::get('/system_errors', function () { return view('configurations.operations.system_errors'); })->name('system_errors');

    Route::get('/admin/register', function () { return view('configurations.authentication.register'); })->name('admin.register');
    Route::get('/elevate', function () { return view('configurations.authentication.elevate'); })->name('elevate');
    Route::get('/access_control', function () { return view('configurations.authentication.acess_control'); })->name('access_control');
    Route::get('/suspend_account', function () { return view('configurations.authentication.suspend_account'); })->name('suspend_account');
    
    Route::get('/terms', function () { return view('documentation.terms'); })->name('terms');
    Route::get('/help', function () { return view('documentation.help'); })->name('help');
    
    Route::get('/features/profile', [FeaturesController::class, "index"])->name('features.profile');
    Route::post('/features/profile/update', [FeaturesController::class, "profile_update"])->name('features.profile.update');
    Route::get('/features/account', [FeaturesController::class, "account"])->name('features.account');
    Route::post('/features/account/update', [FeaturesController::class, "account_update"])->name('features.account.update');
    
    Route::get('/tags', [TagController::class, "index"])->name('tags');
    Route::post('/tags/add', [TagController::class, "add"])->name('tags.add');
    Route::post('/tags/edit', [TagController::class, "edit"])->name('tags.edit');
    // Route::post('/tags/delete', [TagController::class, "delete"])->name('tags.delete');

    Route::get('/brands', [BrandController::class, "index"])->name('brands');
    Route::post('/brands/add', [BrandController::class, "add"])->name('brands.add');
    Route::post('/brands/edit', [BrandController::class, "edit"])->name('brands.edit');
    // Route::post('/brands/delete', [BrandController::class, "delete"])->name('brands.delete');

    Route::get('/products', [ProductController::class, "index"])->name('products');
    Route::post('/products/add', [ProductController::class, "add"])->name('products.add');
    Route::post('/products/edit', [ProductController::class, "edit"])->name('products.edit');
    Route::get('/prodlist', [ProductController::class, "prodlist"])->name('prodlist');
    Route::get('/prodsupp', [ProductController::class, "prodsupp"])->name('prodsupp');
    Route::get('/prodprices', [ProductController::class, "prodprices"])->name('prodprices');

    Route::get('/employees', [EmployeeController::class, "index"])->name('employees');
    Route::post('/employees/add', [EmployeeController::class, "add"])->name('employees.add');
    Route::post('/employees/edit', [EmployeeController::class, "add"])->name('employees.edit');

    Route::get('/suppliers', [SupplierController::class, "index"])->name('suppliers');
    Route::post('/suppliers/add', [SupplierController::class, "add"])->name('suppliers.add');
    Route::post('/suppliers/edit', [SupplierController::class, "edit"])->name('suppliers.edit');

    Route::get('/customers', [CustomerController::class, "index"])->name('customers');
    Route::post('/customers/add', [CustomerController::class, "add"])->name('customers.add');
    Route::post('/customers/edit', [CustomerController::class, "edit"])->name('customers.edit');

    Route::get('/partners', [PartnerController::class, "index"])->name('partners');
    Route::post('/partners/add', [PartnerController::class, "add"])->name('partners.add');
    Route::post('/partners/edit', [PartnerController::class, "edit"])->name('partners.edit');


    Route::get('/expenses', [ExpensesController::class, "index"])->name('expenses');
    Route::post('/expenses/add', [ExpensesController::class, "add"])->name('expenses.add');
    Route::post('/expenses/edit', [ExpensesController::class, "edit"])->name('expenses.edit');

    Route::get('/service_providers', [Service_providersController::class, "index"])->name('service_providers');
    Route::post('/service_providers/add', [Service_providersController::class, "add"])->name('service_providers.add');
    Route::post('/service_providers/edit', [Service_providersController::class, "edit"])->name('service_providers.edit');

    Route::get('/orders', [OrderController::class, "index"])->name('orders');

    Route::get('/budjets', [BudjetController::class, "index"])->name('budjets');
    Route::post('/budjets/add', [BudjetController::class, "add"])->name('budjets.add');
    Route::post('/budjets/edit', [BudjetController::class, "edit"])->name('budjets.edit');


    Route::get('/sales', [SaleController::class, "index"])->name('sales');
    Route::get('/sales/edit', [SaleController::class, "edit"])->name('sales.edit');

    Route::get('/purchases', [PurchaseController::class, "index"])->name('purchases');
    Route::get('/purchases/edit', [PurchaseController::class, "edit"])->name('purchases.edit');


    Route::get('/bought', [Buying_pricesController::class, "index"])->name('bought');
    Route::post('/bought/add', [Buying_pricesController::class, "add"])->name('bought.add');
    Route::post('/bought/edit', [Buying_pricesController::class, "edit"])->name('bought.edit');

    Route::get('/sold', [Selling_priceController::class, "index"])->name('sold');
    Route::post('/sold/add', [Selling_priceController::class, "add"])->name('sold.add');
    Route::post('/sold/edit', [Selling_priceController::class, "edit"])->name('sold.edit');


    Route::get('/buy', [BuyController::class, "index"])->name('buy');
    Route::get('/buy/add', [BuyController::class, "add"])->name('buy.add');

    Route::get('/asset', [AssetController::class, "index"])->name('asset');
    Route::post('/asset/add', [AssetController::class, "add"])->name('asset.add');
    Route::post('/asset/edit', [AssetController::class, "edit"])->name('asset.edit');
    Route::get('/assetdata', [AssetController::class, "assetdata"])->name('assetdata');

    Route::get('/sell', [SellController::class, "index"])->name('sell');
    Route::get('/saletemp', [SellController::class, "saletemp"])->name('saletemp');
    Route::get('/saleprices', [SellController::class, "saleprices"])->name('saleprices');
    Route::get('/newprices', [SellController::class, "newprices"])->name('newprices');
    Route::post('/sell/add', [SellController::class, "add"])->name('sell.add');


    Route::get('/targets', [TargetController::class, "index"])->name('targets');
    Route::post('/targets/add', [TargetController::class, "add"])->name('targets.add');
    Route::post('/targets/edit', [TargetController::class, "edit"])->name('targets.edit');

    Route::get('/assiglist', [EmployeeController::class, "assiglist"])->name('assiglist');
});

// Route::middleware(['auth', 'role:1'])->group(function () {
//     Route::get('/tags', [TagController::class, "index"])->name('tags');
// });
Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('/user/logout', [DashboardController::class, "Logout"])->name('user.logout');
});