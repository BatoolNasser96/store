<?php

Route::namespace('Site')->prefix('e-commerce/')->group(function() {
    Route::get('/', 'HomeController@index')->name('site.index');
    Route::get('/cart', 'HomeController@cart')->name('cart');

    Route::get('/checkout', 'CheckoutController@checkout')->name('checkout');

Route::get('/paypal/return', 'CheckoutController@paypalReturn')->name('paypal.return');
Route::get('/paypal/cancel', 'CheckoutController@payaplCancel')->name('paypal.cancel');

    Route::get('/{id}', 'HomeController@view')->name('site.view');
Route::get('like/{id}','HomeController@like')->name('like');
Route::post('comment/{id}','HomeController@comment')->name('comment');
Route::get('brand/{id}','HomeController@brand')->name('brand');
Route::get('department/{id}','HomeController@department')->name('department');
Route::get('part/{id}','HomeController@part')->name('part');


});

Route::get('/login','Auth\LoginController@showLoginForm');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/countries/{countryId}/cities','Admin\CountriesController@cities');

Route::get('/manfacturers/{manfacturerId}/brands','Admin\ManufacturersController@brands');

Route::get('/departments/{departmentId}/parts','Admin\DepartmentsController@parts');
Route::get('/parts/{partId}/colors','Admin\PartsController@colors');
Route::get('/parts/{partId}/sizes','Admin\PartsController@sizes');
Route::get('/companies/{companyId}/manfacturers','Admin\ChangeCompaniesController@manufacturers');

Route::namespace('Admin')->middleware(['auth:admin'])->group(function() {
    Route::resource('/settings', 'SettingController');
    Route::get('/settings/{id}/delete', ['as' => 'settings.delete', 'uses' => 'SettingController@destroy']);

});
Route::get('/lang/{lang}', function($lang) {
	session()->put('lang', $lang);
	App::setLocale($lang);
	return redirect()->back();
})->name('lang');


   Route::namespace('Admin')->prefix('admin/')->group(function() {
        Route::namespace('Auth')->group(function(){
        Route::get('login','LoginController@showLoginForm');
        Route::get('logout','LoginController@logout')->name('admin.logout');
        Route::post('login','LoginController@dologin')->name('admin.login');
    });
       
       Route::get('/part/{id}', 'PartsController@show')->name('admin.part');
       Route::get('/product/{id}', 'ProductsController@show')->name('admin.product.product');
      
       
    Route::middleware(['admin:admin'])->group(function(){
        Route::prefix('Admin')->name('admin.admins')->group(function() {
            Route::get('/', 'AdminsController@index')->name('');
            Route::get('/search', 'AdminsController@search')->name('.search');
            Route::get('/trashed', 'AdminsController@trashed')->name('.trashed');
            Route::put('/trashed/{id}/restore', 'AdminsController@restore')->name('.restore');
            Route::delete('/trashed/{id}/delete', 'AdminsController@forceDelete')->name('.forceDelete');
            Route::get('/create', 'AdminsController@create')->name('.create');
            Route::post('/', 'AdminsController@store')->name('.store');
            Route::get('/{id}', 'AdminsController@edit')->name('.edit');
            Route::put('/{id}', 'AdminsController@update')->name('.update');
            Route::delete('/{id}', 'AdminsController@delete')->name('.delete');
        });

    });
       
    Route::prefix('User')->name('admin.users')->group(function() {
        Route::get('/', 'UsersController@index')->name('');
        Route::get('/trashed', 'UsersController@trashed')->name('.trashed');
        Route::put('/trashed/{id}/restore', 'UsersController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'UsersController@forceDelete')->name('.forceDelete');
        Route::get('/create', 'UsersController@create')->name('.create');
        Route::post('/', 'UsersController@store')->name('.store');
        Route::get('/{id}', 'UsersController@edit')->name('.edit');
        Route::put('/{id}', 'UsersController@update')->name('.update');
        Route::delete('/{id}', 'UsersController@delete')->name('.delete');
    });
    Route::prefix('changecompany')->name('admin.changecompany')->group(function() {
        Route::get('/', 'ChangeCompaniesController@index')->name('.index');
        Route::get('/search', 'ChangeCompaniesController@search')->name('.search');
        Route::get('/a', 'ChangeCompaniesController@create')->name('.create');
        //Route::get('/', 'ChangeCompaniesController@index')->name('');
        Route::get('/trashed', 'ChangeCompaniesController@trashed')->name('.trash');
        Route::put('/trashed/{id}/restore', 'ChangeCompaniesController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'ChangeCompaniesController@forceDelete')->name('.forceDelete');
        Route::post('/', 'ChangeCompaniesController@store')->name('.store');
        Route::get('/{id}', 'ChangeCompaniesController@edit')->name('.edit');
        Route::put('/{id}', 'ChangeCompaniesController@update')->name('.update');
        Route::delete('/{id}', 'ChangeCompaniesController@delete')->name('.delete');
    });


    Route::prefix('company')->name('admin.company')->group(function() {
        Route::get('/company/{id}', 'CompaniesController@index')->name('.index');
        Route::get('/a', 'CompaniesController@create')->name('.create');
        //Route::get('/', 'CompaniesController@index')->name('');
        Route::get('/trashed', 'CompaniesController@trashed')->name('.trash');
        Route::put('/trashed/{id}/restore', 'CompaniesController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'CompaniesController@forceDelete')->name('.forceDelete');
        Route::post('/', 'CompaniesController@store')->name('.store');
        Route::get('/{id}', 'CompaniesController@edit')->name('.edit');
        Route::put('/{id}', 'CompaniesController@update')->name('.update');
        Route::delete('/{id}', 'CompaniesController@delete')->name('.delete');
    });

    Route::prefix('Product')->name('admin.products')->group(function() {
        Route::get('/', 'ProductsController@index')->name('');
        Route::get('/search', 'ProductsController@search')->name('.search');
        Route::get('/trashed', 'ProductsController@trashed')->name('.trashed');
        Route::put('/trashed/{id}/restore', 'ProductsController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'ProductsController@forceDelete')->name('.forceDelete');
        Route::get('/create', 'ProductsController@create')->name('.create');
        Route::post('/', 'ProductsController@store')->name('.store');
        Route::get('/{id}', 'ProductsController@edit')->name('.edit');
        Route::put('/{id}', 'ProductsController@update')->name('.update');
        Route::delete('/{id}', 'ProductsController@delete')->name('.delete');
    });
    Route::prefix('Supplier')->name('admin.supplier')->group(function() {
        Route::get('/', 'SuppliersController@index')->name('');
        Route::get('/search', 'SuppliersController@search')->name('.search');
        Route::get('/trashed', 'SuppliersController@trashed')->name('.trashed');
        Route::put('/trashed/{id}/restore', 'SuppliersController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'SuppliersController@forceDelete')->name('.forceDelete');
        Route::get('/create', 'SuppliersController@create')->name('.create');
        Route::post('/', 'SuppliersController@store')->name('.store');
        Route::get('/{id}', 'SuppliersController@edit')->name('.edit');
        Route::put('/{id}', 'SuppliersController@update')->name('.update');
        Route::delete('/{id}', 'SuppliersController@delete')->name('.delete');
    }); 
    Route::prefix('department')->name('admin.department')->group(function() {
        Route::get('/{id}', 'DepartmentsController@index')->name('.index');
        Route::get('/trashed', 'DepartmentsController@trashed')->name('.trashed');
        Route::put('/trashed/{id}/restore', 'DepartmentsController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'DepartmentsController@forceDelete')->name('.forceDelete');
        Route::get('/create', 'DepartmentsController@create')->name('.create');
        Route::post('/', 'DepartmentsController@store')->name('.store');
        Route::get('/{id}', 'DepartmentsController@edit')->name('.edit');
        Route::put('/{id}', 'DepartmentsController@update')->name('.update');
        Route::delete('/{id}', 'DepartmentsController@delete')->name('.delete');
    });
    Route::prefix('part')->name('admin.part')->group(function() {
        // Route::get('/{id}', 'PartsController@index')->name('.index');
        // Route::get('/trashed', 'PartsController@trashed')->name('.trashed');
        // Route::put('/trashed/{id}/restore', 'PartsController@restore')->name('.restore');
        // Route::delete('/trashed/{id}/delete', 'PartsController@forceDelete')->name('.forceDelete');
        Route::get('/create', 'PartsController@create')->name('.create');
        Route::post('/', 'PartsController@store')->name('.store');
        Route::get('/{id}', 'PartsController@edit')->name('.edit');
        Route::put('/{id}', 'PartsController@update')->name('.update');
        Route::delete('/{id}', 'PartsController@delete')->name('.delete');
    });

    Route::prefix('Country')->name('admin.countries')->group(function() {
        Route::get('/', 'CountriesController@index')->name('');
        Route::get('/search', 'CountriesController@search')->name('.search');
        Route::get('/trashed', 'CountriesController@trashed')->name('.trashed');
        Route::put('/trashed/{id}/restore', 'CountriesController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'CountriesController@forceDelete')->name('.forceDelete');
        Route::get('/create', 'CountriesController@create')->name('.create');
        Route::post('/', 'CountriesController@store')->name('.store');
        Route::get('/{id}', 'CountriesController@edit')->name('.edit');
        Route::put('/{id}', 'CountriesController@update')->name('.update');
        Route::delete('/{id}', 'CountriesController@delete')->name('.delete');
    });
    Route::prefix('City')->name('admin.cities')->group(function() {
        Route::get('/', 'CitiesController@index')->name('');
        Route::get('/search', 'CitiesController@search')->name('.search');
        Route::get('/trashed', 'CitiesController@trashed')->name('.trashed');
        Route::put('/trashed/{id}/restore', 'CitiesController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'CitiesController@forceDelete')->name('.forceDelete');
        Route::get('/create', 'CitiesController@create')->name('.create');
        Route::post('/', 'CitiesController@store')->name('.store');
        Route::get('/{id}', 'CitiesController@edit')->name('.edit');
        Route::put('/{id}', 'CitiesController@update')->name('.update');
        Route::delete('/{id}', 'CitiesController@delete')->name('.delete');
    });
    Route::prefix('Size')->name('admin.sizes')->group(function() {
        Route::get('/', 'SizesController@index')->name('');
        Route::get('/search', 'SizesController@search')->name('.search');
        Route::get('/trashed', 'SizesController@trashed')->name('.trashed');
        Route::put('/trashed/{id}/restore', 'SizesController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'SizesController@forceDelete')->name('.forceDelete');
        Route::get('/create', 'SizesController@create')->name('.create');
        Route::post('/', 'SizesController@store')->name('.store');
        Route::get('/{id}', 'SizesController@edit')->name('.edit');
        Route::put('/{id}', 'SizesController@update')->name('.update');
        Route::delete('/{id}', 'SizesController@delete')->name('.delete');
    });

    Route::prefix('Color')->name('admin.colors')->group(function() {
        Route::get('/', 'ColorsController@index')->name('');
        Route::get('/search', 'ColorsController@search')->name('.search');
        Route::get('/trashed', 'ColorsController@trashed')->name('.trashed');
        Route::put('/trashed/{id}/restore', 'ColorsController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'ColorsController@forceDelete')->name('.forceDelete');
        Route::get('/create', 'ColorsController@create')->name('.create');
        Route::post('/', 'ColorsController@store')->name('.store');
        Route::get('/{id}', 'ColorsController@edit')->name('.edit');
        Route::put('/{id}', 'ColorsController@update')->name('.update');
        Route::delete('/{id}', 'ColorsController@delete')->name('.delete');
    });

    Route::prefix('Logo')->name('admin.logos')->group(function() {
        Route::get('/', 'LogosController@index')->name('');
        Route::get('/trashed', 'LogosController@trashed')->name('.trashed');
        Route::put('/trashed/{id}/restore', 'LogosController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'LogosController@forceDelete')->name('.forceDelete');
        Route::get('/create', 'LogosController@create')->name('.create');
        Route::post('/', 'LogosController@store')->name('.store');
        Route::get('/{id}', 'LogosController@edit')->name('.edit');
        Route::put('/{id}', 'LogosController@update')->name('.update');
        Route::delete('/{id}', 'LogosController@delete')->name('.delete');
    });
    Route::prefix('Manufacturer')->name('admin.manufacturers')->group(function() {
        Route::get('/', 'ManufacturersController@index')->name('.index');
        Route::get('/search', 'ManufacturersController@search')->name('.search');
        Route::get('/trashed', 'ManufacturersController@trashed')->name('.trashed');
        Route::put('/trashed/{id}/restore', 'ManufacturersController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'ManufacturersController@forceDelete')->name('.forceDelete');
        Route::get('/create', 'ManufacturersController@create')->name('.create');
        Route::post('/', 'ManufacturersController@store')->name('.store');
        Route::get('/{id}', 'ManufacturersController@edit')->name('.edit');
        Route::put('/{id}', 'ManufacturersController@update')->name('.update');
        Route::delete('/{id}', 'ManufacturersController@delete')->name('.delete');
    });
    Route::prefix('Brand')->name('admin.brands')->group(function() {
        Route::get('/', 'BrandsController@index')->name('.index');
        Route::get('/search', 'BrandsController@search')->name('.search');
        Route::get('/trashed', 'BrandsController@trashed')->name('.trashed');
        Route::put('/trashed/{id}/restore', 'BrandsController@restore')->name('.restore');
        Route::delete('/trashed/{id}/delete', 'BrandsController@forceDelete')->name('.forceDelete');
        Route::get('/create', 'BrandsController@create')->name('.create');
        Route::post('/', 'BrandsController@store')->name('.store');
        Route::get('/{id}', 'BrandsController@edit')->name('.edit');
        Route::put('/{id}', 'BrandsController@update')->name('.update');
        Route::delete('/{id}', 'BrandsController@delete')->name('.delete');
    });
});


Auth::routes([
    'verify'=> true,
]);

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Company')->prefix('company/')->group(function() {
    Route::namespace('Auth')->group(function(){
    Route::get('login','LoginController@showLoginForm');
    Route::get('logout','LoginController@logout')->name('company.logout');
    Route::post('login','LoginController@dologin')->name('company.login');

    Route::post('register','RegisterController@create')->name('company.register');
    });
    
    

    Route::middleware(['auth:company'])->group(function(){
        
        Route::get('/', 'DashborderController@index')->name('company.index');
    });
});

