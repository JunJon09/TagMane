<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagRegistrationController;
use App\Http\Controllers\TagPublishController;
use App\Http\Controllers\TagViewTriggerController;
use App\Http\Controllers\TagRedirectController;
use App\Http\Controllers\TagJSErrorTrigerController;
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
    return view('TagRegistrationView');
});

// Route::get('/ta', function () {
//     return view('TagView');
// });

//タグのデータを登録する画面
Route::get('/TagRegistration', function () {
    return view('TagRegistrationView');
});

//タグデータをDBに登録
Route::post('/TagRegistration', [TagRegistrationController::class, 'index']);

#一人一人のタグのデータ
Route::get('/tag/{id}', [TagPublishController::class, 'index']);

#ページViewトリガーのカウント
Route::get('/tag/{id}/trigger', [TagViewTriggerController::class, 'TriggerCount']);

#ページViewトリガーのカウント画面
Route::get('/tag/{id}/trigger/view', [TagViewTriggerController::class, 'ViewCount']);

Route::get('/tag/{id}/redirect', [TagRedirectController::class, 'index']);

Route::get('/tag/{id}/js/error', [TagJSErrorTrigerController::class, 'errorJudge']);
Route::get('/tag/{id}/js/true', [TagJSErrorTrigerController::class, 'trueJudge']);




