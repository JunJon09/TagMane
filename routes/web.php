<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TagRegistrationController;
use App\Http\Controllers\TagPublishController;
use App\Http\Controllers\TagViewTriggerController;
use App\Http\Controllers\TagRedirectController;
use App\Http\Controllers\TagJSErrorTrigerController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\MyTagViewController;
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

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);
Route::get('/', function () {
    return view('TopView');
});

//タグのデータを登録する画面
// Route::get('/dashboard', function () {
//     return view('MypageView');
// })->middleware(['auth']);
Route::get('/dashboard', [MypageController::class, 'index'])->middleware(['auth']);
Route::get('/TagRegistration', function () {
    return view('TagRegistrationView');
})->middleware(['auth']);
//タグデータをDBに登録
Route::post('/TagRegistration', [TagRegistrationController::class, 'index'])->middleware(['auth']);

#一人一人のタグのデータ
Route::get('/tag/{id}', [TagPublishController::class, 'index']);

#ページViewトリガーのカウント
Route::get('/tag/{id}/trigger', [TagViewTriggerController::class, 'TriggerCount'])->middleware(['auth']);

#ページViewトリガーのカウント画面
Route::get('/count_view', [MyTagViewController::class, 'index'])->middleware(['auth']);
Route::get('/tag/{id}/trigger/view', [TagViewTriggerController::class, 'ViewCount'])->middleware(['auth']);

Route::get('/tag/{id}/redirect', [TagRedirectController::class, 'index']);

#ここ実装していない。
Route::get('/tag/{id}/js/error', [TagJSErrorTrigerController::class, 'errorJudge']);
Route::get('/tag/{id}/js/true', [TagJSErrorTrigerController::class, 'trueJudge']);
require __DIR__.'/auth.php';
