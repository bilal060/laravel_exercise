<?php

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
        Route::get('add-to-log', 'HomeController@myTestAddToLog');

        Route::get('logActivity',[  'uses' => 'HomeController@logActivity',
            'as' => 'logs'
        ]);


		Route::get('/',[  'uses' => 'FrontEndController@index',
		          'as' => 'index'
		 ]);
        Route::get('/login',[  'uses' => 'FrontEndController@index',
            'as' => 'index'
        ]);
		Route::get('/results', function(){

            $products = \App\Products::where('title', 'like', '%' . request('query') .'%')->get();

            return view('results')->with('products', $products)
                                  ->with('title', 'Search results:' .request('query'))
                                  ->with('clients', \App\Client::take(7)->get())
                                  ->with('query', request('query'));

		});



Auth::routes();

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {

		Route::get('/dashboard',[
		 'uses' => 'HomeController@index',
		  'as' => 'home'
		]);


		Route::get('/product/create',['uses' => 'ProductsController@create',
		        'as' => 'product.create'
		]);

		Route::post('/product/store',['uses' => 'ProductsController@store',
		        'as' => 'product.store'
		]);
		Route::get('/products',['uses' => 'ProductsController@index',
		        'as' => 'products'
		]);
        Route::get('/client/view/{id}', [
            'uses' => 'ClientController@view',
            'as'   => 'client.view'
        ]);
		Route::get('/products/delete/{id}',['uses' => 'ProductsController@destroy',
		        'as' => 'products.delete'
		]);
		Route::get('/products/trashed',['uses' => 'ProductsController@trashed',
				        'as' => 'products.trashed'
		]);
		Route::get('/products/kill/{id}',['uses' => 'ProductsController@kill',
				        'as' => 'products.kill'
		]);
		Route::get('/products/restore/{id}',['uses' => 'ProductsController@restore',
				        'as' => 'products.restore'
		]);
		Route::get('/products/edit/{id}',['uses' => 'ProductsController@edit',
				        'as' => 'products.edit'
		]);
		Route::post('/products/update/{id}',['uses' => 'ProductsController@update',
				        'as' => 'products.update'
		]);

		Route::get('/client/create',['uses' => 'ClientController@create',
		        'as' => 'client.create'
		]);

		Route::post('/client/store',['uses' => 'ClientController@store',
		        'as' => 'client.store'
		]);

		Route::get('/clients',['uses' => 'ClientController@index',
				        'as' => 'clients'
		]);
		Route::get('/client/edit/{id}',['uses' => 'ClientController@edit',
				        'as' => 'client.edit'
		]);
		Route::get('/client/delete/{id}',['uses' => 'ClientController@destroy',
				        'as' => 'client.delete'
		]);
		Route::post('/client/update/{id}',['uses' => 'ClientController@update',
				        'as' => 'client.update'
		]);

		Route::get('/users', [
                  'uses' => 'UsersController@index',
                  'as'   => 'users'
		]);
		Route::get('/user/create', [
		    'uses' => 'UsersController@create',
            'as'   => 'user.create'
		]);
		Route::post('/user/store', [
		    'uses' => 'UsersController@store',
            'as'   => 'user.store'
		]);
		Route::get('/user/admin/{id}', [
		    'uses' => 'UsersController@admin',
            'as'   => 'user.admin'
		]);

		Route::get('/user/not-admin/{id}', [
		    'uses' => 'UsersController@not_admin',
            'as'   => 'user.not_admin'
		]);
       Route::get('/user/profile', [
           'uses' => 'ProfilesController@index',
           'as'   => 'user.profile'
		]);
		 Route::post('/user/profile/update', [
		     'uses' => 'ProfilesController@update',
             'as'   => 'user.profile.update'
		]);
		 Route::get('/user/delete/{id}', [
		     'uses' => 'UsersController@destroy',
             'as'   => 'user.delete'
		]);




});

