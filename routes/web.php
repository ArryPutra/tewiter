<?php

use App\Http\Controllers\CrudPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFollowController;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Test;
use App\Models\User;
use App\Models\UserFollow;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// HOME PAGE
Route::get('/', function() {
    $posts = Post::latest()->simplePaginate(5);
    if(request('search')) {
        $posts = Post::where('body', 'like', '%' . request('search') . '%' )->latest()->simplePaginate(5);
    }
    return view('pages.home.home', [
        'title' => "Tewiter",
        'posts' => $posts,
        'post_categories' => PostCategory::all(),
        'users' => User::latest()->take(5)->get(),
        'firstPost' => Post::first()
    ]
    );
});

// SEARCH USERS PAGE
Route::get('/search-users', function() {
    $users = User::latest()->simplePaginate(10);
    if(request('search')) {
        $users = User::where('name', 'like', '%' . request('search') . '%')
                            ->orWhere('username', 'like', '%' . request('search') . '%')
                            ->latest()->simplePaginate(10);
    }
    return view('pages.search-users', [
        'title' => "Search Users",
        'users' => $users, 
        'userFollows' => User::all()
    ]);
});
// FOLLOW USER
Route::post('/follow-user/{user:id}', [UserFollowController::class, 'store'])->middleware('auth');


// CRUD POST
Route::resource('/post', CrudPostController::class)->middleware('auth');

// LIKE POST
Route::post('/like-post/{post:id}', [PostLikeController::class, 'store'])->middleware('auth');
// LIKED POST USER
Route::get('/user/{user:username}/liked-posts', [PostLikeController::class, 'index'])->middleware('auth');

// POST CATEGORIES
Route::get('/posts/{postCategory:slug}', [PostCategoryController::class, 'index']);
// DETAIL POST
Route::get('/post/{username}/{post:id}', [PostController::class, 'index']);
// PROFILE PAGE
Route::get('/user/{user:username}', [UserController::class, 'index']);

// UPDATE PROFILE
Route::post('/update-profile/{user:id}', [UserController::class, 'update']);

// LOGIN PAGE
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// AUTENTIKASI USER LOGIN
Route::post('/login', [LoginController::class, 'authenticate']);
// USER LOGOUT
Route::post('/logout', [LoginController::class, 'logout']);


// SIGNUP PAGE
Route::get('/signup', [SignUpController::class, 'index'])->middleware('guest');
// MENYIMPAN DATA SIGNUP KE DATABASE
Route::post('/signup', [SignUpController::class, 'store']);

// MENYIMPAN DATA KOMENTAR POST KE DATABASE
Route::post('/post-comment/{post:id}', [PostCommentController::class, 'store'])->middleware('auth');
// MENYIMPAN DATA KOMENTAR POST KE DATABASE
Route::post('/post-comment/delete/{postComment:id}', [PostCommentController::class, 'destroy'])->middleware('auth');
