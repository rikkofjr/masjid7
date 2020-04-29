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

//Client 
Route::get('/cobain', 'PostController@cobain');
Route::get('/', 'ClientController@index')->name('clientIndex');
Route::get('/zakat', 'ClientController@zakat')->name('clientZakat');
Route::get('/qurban', 'ClientController@qurban')->name('clientQurban');
Route::get('/blogcontent/{slug}', 'ClientController@blogContent')->name('blogContent');

Auth::routes([
    //disable register
    'register' => false
]);


//Route::get('/post', 'PostController@index')->name('home');
Route::group(['prefix' => 'dashboard'], function () {
    //dhome`
    Route::get('/', 'DashboardController@index');
    //Route For User
    Route::resource('users', 'UserController');
    //update user password
    Route::patch('updatepassword/{id}/update','UserController@updatepassword')->name('updatepassword');
    //profile user (individual)
    Route::get('profile','ProfileUserController@profile');

    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('posts', 'PostController');
    //kas Route
    Route::resource('kas-penerimaan', 'KasPenerimaanController');
    Route::resource('kas-pengeluaran', 'KasPengeluaranController');

    //Zis Route
    Route::resource('zis', 'ZisController');
    Route::get('arsip/zis','ZisController@zisArchive')->name('zisArchive');
    Route::get('softdelete/zis/{id}','ZisController@softDelete')->name('softDeleteZis');
    //Qurban Route
    Route::resource('qurban', 'QurbanController');
    Route::get('arsip/qurban','QurbanController@qurbanArchive')->name('qurbanArchive');
    //Jamaah Route

    //Jamaah Addres
    Route::resource('alamat-jamaah','AlamatJamaahController');
    Route::resource('data-jamaah','DataJamaahController');
    Route::get('softdelete/keluarga/{id}', 'AlamatJamaahController@SoftDelete')->name('softDeleteKeluarga');
    Route::get('softdelete/data-jamaah/{id}', 'DataJamaahController@SoftDelete')->name('softDeleteJamaah');

    //Blog ROute
    Route::resource('blog','BlogController');

    Route::resource('pengumuman','PengumumanController');
});

//Api for Auth
Route::group(['prefix' => 'json'],function() {
    Route::get('/abc3431fitrah123/datafitrah', 'ZisController@getFitrahDataByYear')->name('jsonFitrahDataThisYear');
    Route::get('/abc3431fitrah123/datamall', 'ZisController@getMallDataByYear')->name('jsonMallDataThisYear');
    Route::get('/abc3431fitrah123/datafidyah', 'ZisController@getFidyahDataByYear')->name('jsonFidyahDataThisYear');
    //Jamaah
    Route::get('/abc3431fitrah123/alamatjamaah', 'AlamatJamaahController@getAddresJamaah')->name('jsonAddresJamaah');
});
//Print
Route::group(['prefix' => 'print'],function(){
    //Print Zakat {Fitrah, Mall, Fidyah}
    Route::get('/zakat/{zis_id}', 'ZisController@PrintZakat')->name('printZakatFull');
    //Print Keluarga atau jamaah
    Route::get('/keluarga/{id}', 'AlamatJamaahController@PrintKeluarga')->name('printKeluarga');
});

//Free API JSON
Route::group(['prefix' => 'json'],function(){
    Route::get('/datazakatfitrah', 'FreeJsonController@dataFitrah')->name('freeJsonDataFitrah');
    Route::get('/datazakatmall', 'FreeJsonController@dataMall')->name('freeJsonDataMall');
    Route::get('/datazakatfidyah', 'FreeJsonController@dataFidyah')->name('freeJsonDataFidyah');
    Route::get('/datakaspenerimaantahunan', 'FreeJsonController@kasPenerimaanTahunan')->name('freeJsonDataKasPenerimaanTahunan');
    Route::get('/datakaspengeluarantahunan', 'FreeJsonController@kasPengeluaranTahunan')->name('freeJsonDataKasPengeluaranTahunan');
});
