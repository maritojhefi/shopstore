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

Route::get('/', 'LandingPageController@index');

Auth::routes();

Route::get('/home', 'LandingPageController@index')->name('home');
Route::get('/indexPersonalizado/{categoria}', 'LandingPageController@indexPersonalizado')->name('indexPersonalizado');
Route::resource('dashboard/producto', 'dashboard\ProductController');
Route::resource('dashboard/cat', 'dashboard\CategoriaController');
Route::get('dashboard/main', 'MainController@index')->name('main.index');
Route::resource('dashboard/user', 'dashboard\UserController');
Route::post('dashboard/producto/estado/{estado}','dashboard\ProductController@estadoProducto')->name('producto.estado');

//imagenes rutas
Route::post('dashboard/producto{producto}/image', 'dashboard\ProductController@image')->name('producto.image');
Route::get('dashboard/producto/image-download/{image}', 'dashboard\ProductController@imageDownload')->name('producto.imageDownload');
Route::delete('dashboard/producto/image-delete/{image}', 'dashboard\ProductController@imagedelete')->name('producto.imagedelete');
Route::get('dashboard/comment/','dashboard\CommentController@guardar')->name('comment');

Route::resource('dashboard2/usuario','dashboard\UserController');
Route::resource('dashboard2/producto','dashboard\ProductController');
Route::resource('dashboard2/categoria','dashboard\CategoryController');

Route::get('principal',function () {
    return view('dashboard2/vista_general/accesorios');
});
Route::get('principal/filtro', 'dashboard\ProductController@index2')->name('producto.index2');
Route::post('verificar','AjaxControler@verificarCorreo')->name('verificar');

Route::post('verificar','AjaxControler@verificarCorreo')->name('agregarsubcategoria');