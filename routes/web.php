<?php

//use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\mood\CheerfulMoodController;
use App\Http\Controllers\mood\HumorMoodController;
use App\Http\Controllers\mood\MelancholicMoodController;
use App\Http\Controllers\mood\ReflectiveMoodController;
use App\Http\Controllers\mood\RomanticMoodController;
use App\Http\Controllers\mood\SleepyMoodController;
use App\Http\Controllers\Movie\MovieController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);
Route::get('dashboard', [LoginController::class, 'dashboard']);
Route::get('login', [LoginController::class, 'login']);
Route::get('registration', [RegisterController::class, 'register']);
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::post('custom-registration', [RegisterController::class, 'customRegistration'])->name('register.custom');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.update');
Route::get('/profile/movies', [ProfileController::class, 'likedMovies'])->name('profile.movies');
//Route::get('signout', [AuthController::class, 'signOut']);
Route::get('/movies/', [ShowController::class, 'show'])->name('show');
Route::post('/search', [SearchController::class, 'search']);
Route::get('/movies/detail/{id}', [\App\Http\Controllers\Movie\ShowController::class, 'show']);
Route::get('/movies/humor', [HumorMoodController::class, 'humor'])->name('demo');
Route::get('/movies/cheerful', [CheerfulMoodController::class, 'cheerful'])->name('cheerful');
Route::get('/movies/melancholic', [MelancholicMoodController::class, 'melancholic'])->name('melancholic');
Route::get('/movies/reflective', [ReflectiveMoodController::class, 'reflective'])->name('reflective');
Route::get('/movies/romantic', [RomanticMoodController::class, 'romantic'])->name('romantic');
Route::get('/movies/sleepy', [SleepyMoodController::class, 'sleepy'])->name('sleepy');
Route::post('/movies/save', [MovieController::class, 'save'])->name('movies.save');
//Route::get('/demo', [SearchController::class, 'search'])->name('search');
//
Auth::routes();

