<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ControbuteController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// lay tu co so du lieu
Route::get('/content', [ContentController::class,'getCatagory']);
// lưu bài
Route::post('/postContent', [ContentController::class,'store']);
// đọc báo
Route::get('/getDetail', [ContentController::class,'getObjectById']);
//lấy tất cả bài viết
Route::get('/getAll', [ContentController::class,'getAll']);
// cập nhật thay đổi khi sửa
Route::put('/update/{id}', [ContentController::class, 'update']);
//lưu vào csdl của phần đogns góp
Route::post('/posts', [ControbuteController::class,'store']);



//Route::get('/message', function () {
//    return 'hello from api';
//});

