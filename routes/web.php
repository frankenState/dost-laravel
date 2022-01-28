<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\API\APIPostController;
use App\Http\Controllers\API\APIUserController;
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

// Route::get('/', function () {
//    $name = 'Jane Doe';

//    return view('welcome', [
//       'name' => $name,
//       'names' => [],
//    ]);
// });



Route::prefix('test')->group(function(){
   // test/greeting
   Route::get('/greeting', function() {
      return "Hello, World!";
   })->name('greeting');
   
   // /user/N
   // Route::get('/user/{id?}', function ($id = 'default'){
   //    return "Open the user with an id of {$id}";
   // })->name('userWithId');
   
   Route::get('/post/{comment}/{user}', function ($comment, $user){
      return "USERID = {$user}<br/>COMMENTID = {$comment}";
   })->name('postcommentuser');

});

Route::prefix('pages')->group(function(){
   Route::get('/test', [PagesController::class, 'test'])->name('pages.test');
   Route::get('/contact-us', [PagesController::class, 'contacts'])->name('pages.contacts');
   Route::get('/',  [PagesController::class, 'welcome'])->name('pages.welcome');
   
});

Route::prefix('posts')->group(function(){
   Route::get('/', [PostController::class, 'index'])->name('posts.index');
   Route::get('/create', [PostController::class, 'create'])->name('posts.create');
   Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
   Route::get('/view/{id}', [PostController::class, 'show'])->name('posts.show');
   Route::get('/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');
   Route::get('/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
   Route::get('/search', [PostController::class, 'search'])->name('posts.search');
   Route::get('/vue-post-app', [PostController::class, 'vuepostapp'])->name('posts.vueapp');


   Route::post('/save', [PostController::class, 'store'])->name('posts.save');
   Route::post('/update/{id}', [PostController::class, 'update'])->name('posts.update');

   Route::prefix('/api')->group(function(){
      Route::get('/', [APIPostController::class, 'index']);
      Route::get('/show/{id}', [APIPostController::class, 'show']);
      Route::get('/search/{key}', [APIPostController::class, 'search']);
      Route::delete('/delete/{id}', [APIPostController::class, 'delete']);
      Route::put('/update', [APIPostController::class, 'update']);
      Route::post('/create', [APIPostController::class, 'create']);
   });

});




Auth::routes();



Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
Route::get('/users/api/auth', [APIUserController::class, 'auth']);