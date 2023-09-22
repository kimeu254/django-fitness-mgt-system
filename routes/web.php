<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberRequestController;
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


//Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/request-membership', function () {
    return view('membership');
})->name('request.membership');

// Auth Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/sign-in', 'authenticate')->name('signin');
    Route::post('/sign-out', 'logout')->name('signout');
});

Route::controller(MemberRequestController::class)->group(function () {
    Route::get('/admin/member-requests', 'index')->name('member.requests');
    Route::post('/membership-request', 'store')->name('membership.create');
    Route::get('/admin/admit-member/{id}', 'admit')->name('admit.member');
    Route::get('/admin/decline-membership/{id}', 'decline')->name('decline.member');
    Route::delete('/member-request/{id}', 'destroy')->name('member.request.destroy');
});

Route::controller(MemberController::class)->group(function () {
    Route::get('/admin/members', 'index')->name('members');
    Route::get('/admin/new-member', 'create')->name('new.member');
    Route::post('/admin/add-member', 'store')->name('add.member');
});

