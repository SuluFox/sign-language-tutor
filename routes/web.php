<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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
// Shows content images from the storage directory based on filename
Route::get('/storage/app/public/images/content/{filename}', function ($filename) {
    $path = storage_path('app/public/images/content/' . $filename);

 
    if (!File::exists($path)) {
        return abort(404); 
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response; // Returns the file with appropriate headers
})->name('storage.content.show'); // Named route to show content images

// Welcome route displaying the welcome view
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    // Admin access middleware for admin-specific routes
    Route::middleware(['admin.access'])->group(function () {
        // Level routes
        Route::get('/levels', [LevelController::class, 'index'])->name('levels');
        Route::post('/level/add', [LevelController::class, 'store'])->name('level.add');
        Route::get('/level-delete{level}', [LevelController::class, 'destroy'])->name('level.delete');
        Route::put('/level-update', [LevelController::class, 'update'])->name('level.update');


        // Category routes
        Route::get('/categories/{level}', [CategoryController::class, 'index'])->name('level.category');
        Route::post('/category/add', [CategoryController::class, 'store'])->name('category.add');
        Route::put('/category-update', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/category-delete{category}', [CategoryController::class, 'destroy'])->name('category.delete');

        // Content routes
        Route::get('/contents/{category}', [ContentController::class, 'index'])->name('contents');
        Route::post('/content/add', [ContentController::class, 'store'])->name('content.add');
        Route::put('/content/update', [ContentController::class, 'update'])->name('content.update');
        Route::get('/content-delete{content}', [ContentController::class, 'destroy'])->name('content.delete');

        // Admin user listing route
        Route::get('/users', [HomeController::class, 'users'])->name('admin.users');
    });

    // General authenticated user routes
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/update-profile', [ProfileController::class, 'updateName'])->name('update-profile');
    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');
    Route::get('/user/levels/page', [LevelController::class, 'index'])->name('user.levels');
    Route::get('/user/categories/{level}', [CategoryController::class, 'index'])->name('user.category');
    Route::get('/user/contents/{category}', [ContentController::class, 'index'])->name('user.contents');
});

// Default Laravel authentication routes
Auth::routes();