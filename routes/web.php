<?php

Route::group(['middleware' => 'checkuser'], 
	function(){
			Route::get('/logout', 'LoginController@logout');


			Route::get('/admin', 'AdminController@outlet');
			Route::get('/admin/outlet', 'AdminController@outlet');
			Route::delete('/admin/deleteOutlet', 'AdminController@deleteOutlet');

			Route::get('/admin/member', 'AdminController@member');
			Route::delete('/admin/deleteMember', 'AdminController@deleteMember');

			Route::get('/outlet' , 'OutletController@menu');
			Route::get('/outlet/outletMenu' , 'OutletController@menu');
			Route::post('/outlet/addMenu' , 'OutletController@addmenu');
			Route::put('/outlet/updateMenu' , 'OutletController@updatemenu');
			Route::delete('/outlet/deleteMenu' , 'OutletController@deletemenu');



		});


Route::get('/login', 'LoginController@login');
Route::post('/loginCheck', 'LoginController@loginCheck');
Route::post('/register', 'LoginController@register');


Route::get('/', 'HomeController@home');
Route::get('/product_detail/{id}', 'HomeController@product_detail');
Route::post('/rating', 'HomeController@rating');
Route::post('/checkout', 'HomeController@pesan_menu');
Route::get('/bayar/{id}/{jumlah}', 'HomeController@bayar');
Route::get('/saldo', 'HomeController@saldo');
Route::post('/isiSaldo', 'HomeController@isiSaldo');
Route::post('/pembayaran', 'HomeController@pembayaran');

Route::get('/contactus', function () {
    return view('content/contact_us');
});
