<?php

use App\Models\libraly;

use Illuminate\Http\Request;
use App\Http\Controllers\library;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\homepageController;
use Illuminate\Database\Console\Migrations\RefreshCommand;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/home', homepageController::class);
Route::group([
  'middleware' => 'api',

], function ($router) {
   Route::post('/login', [UserController::class, 'login']);
  Route::post('/register', [UserController::class, 'register']);
  Route::post('/logout', [UserController::class, 'logout']);
  Route::post('/refresh', [UserController::class, 'refresh']);
  Route::get('/user-profile', [UserController::class, 'userProfile']);    
});
// Route::apiResource('/course', courseController::class);
// Route::controller(coursecontroller::class)->group(function($router){
//   route::get('index', 'index');
//   route::get('show{id}','show');
//   route::put('update{id}', 'update');
//   route::get('store', 'store');
//   route::get('destroy{id}', 'destroy');
//   });
// Route::resource('/course', 'CourseController');
// Route::group(['middleware' => 'auth:api'], function () {

// });
// Route::middleware('auth:sanctum')->get('/user/courses', [CourseController::class, 'getUserCourses']);
// Route::post('/courses/enroll', function(){
//   dd(12);
// });
Route::middleware('auth:api')->group(function () {
 
  Route::post('/courses/enroll', [CourseController::class, 'enroll']);
  Route::get('/courses', [CourseController::class, 'index']);
  Route::put('/courses/{id}/progress', [CourseController::class, 'updateProgress']);
  Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
});
Route::prefix('books')->group(function () {
  Route::get('/', [library::class, 'index']);
  Route::post('/', [library::class, 'store']);
  Route::get('/{id}', [library::class, 'show']);
  Route::put('/{id}', [library::class, 'update']);
  Route::delete('/{id}', [library::class, 'destroy']);
});