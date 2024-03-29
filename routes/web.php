<?php

use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\deviceController;
use App\Http\Controllers\Admin\infoController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\EmailMessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\publicController;
use App\Models\Category;
use App\Models\Device;
use App\Models\EmailMessage;
use App\Models\User;
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

Route::get('/',[publicController::class,'index'])->name('index');
Route::get('/about',[publicController::class,'about'])->name('about');
Route::get('/contact',[publicController::class,'contact'])->name('contact');
Route::post('/sendEmail',[publicController::class,'sendEmail'])->name('sendEmail');


Route::get('/device/{id}',[publicController::class,'deviceDetail'])->name('deviceDetail');
Route::get('/devices/{id}',[publicController::class,'devices'])->name('devices');



Route::get('/dashboard', function () {
    $userCount = User::count();
    $categoryCount = Category::count();
    $deviceCount = Device::count();
    $messageCount = EmailMessage::count();
    return view('dashboard',compact(['userCount','categoryCount','deviceCount','messageCount']));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('admin/user', userController::class)->except('show')->middleware('can:superAdmin');
    Route::resource('admin/category', categoryController::class)->except('show');
    Route::resource('admin/device', deviceController::class)->except('show');
    Route::resource('admin/info', infoController::class)->only(['index','edit','update']);
    Route::resource('admin/emailMessage', EmailMessageController::class)->only(['index','destroy','show']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile', [ProfileController::class, 'updateImage'])->name('profile.updateImage');

});

require __DIR__.'/auth.php';
