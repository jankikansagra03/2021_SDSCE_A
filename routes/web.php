<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('head', 'header');
Route::view('Mywebsite', 'home');
Route::view('Aboutus', 'about');
Route::view('contactus', 'contact');
Route::view('register', 'register');
Route::post('FetchRegister', [SampleController::class, 'fetch_data_register']);
Route::get('Fetch_Registration', [SampleController::class, 'fetch_registration_data']);
Route::view('Login', 'login');
Route::get('edit_registration/{email}', [SampleController::class, 'edit_registered_user']);
Route::post('EditFetchRegister', [SampleController::class, 'update_registration']);
Route::get('delete_registration/{email}', [SampleController::class, 'delete_user_registration']);
Route::get('deactivate_user/{email}', [SampleController::class, 'deactivate_user']);
Route::get('activate_user/{email}', [SampleController::class, 'activate_user']);
Route::get('reactivate_user/{email}', [SampleController::class, 'reactivate_user']);
Route::view('mail_sample', 'mail_form');
Route::post('send_email', [SampleController::class, 'send_email']);
