<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

Route::get('/proxy-image', function () {
    $imageUrl = request('url');
    $response = Http::get($imageUrl);

    return response($response->body(), $response->status())
        ->header('Content-Type', $response->header('Content-Type'));
});
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

Route::middleware(['admin'])->prefix('admins')->group(function () {
    Route::get('/dashboard',[AdminController::class, 'index'])->name('adminDashboard');
    Route::get('/appiontments',[AdminController::class, 'getAppointments'])->name('getAdminAppointments');
    Route::resource('/speciality',SpecialityController::class);
    Route::get('/doctors',[AdminController::class, 'getDoctors'])->name('getDoctors');
    Route::get('/patients',[AdminController::class, 'getPatients'])->name('getPatients');
    Route::get('/reviews',[AdminController::class, 'getReviews'])->name('getReviews');
    Route::get('/settings',[AdminController::class, 'getSettings'])->name('getSettings');
    Route::get('/invoices',[AdminController::class, 'getInvoices'])->name('getInvoices');
    Route::get('/profile',[AdminController::class, 'getProfile'])->name('getProfile');

});

Route::middleware(['doctor'])->prefix('doctor')->group(function () {
     Route::get('/',[DoctorController::class, 'index'])->name('doctorDashboard');
     Route::get('/appiontments',[DoctorController::class, 'getAppointments'])->name('getAppointments');
     Route::get('/my-patients',[DoctorController::class, 'getMyPatient'])->name('getMyPatient');
     Route::get('/chat',[DoctorController::class, 'getDoctorChat'])->name('getDoctorChat');
     Route::post('/chat',[DoctorController::class, 'postDoctorChat'])->name('postDoctorChat');
     Route::get('/doctorProfile',[DoctorController::class, 'getCompleteDoctorProfile'])->name('getCompleteDoctorProfile');
     Route::post('/doctorProfile',[DoctorController::class, 'postCompleteDoctorProfile'])->name('postCompleteDoctorProfile');
     Route::get('/socialMedia',[DoctorController::class, 'getSocialmedia'])->name('getSocialMedia');
     Route::post('/socialMedia',[DoctorController::class, 'postSocialmedia'])->name('postSocialMedia');
     Route::get('/scheduleTime',[DoctorController::class, 'getScheduleTime'])->name('getScheduleTime');
     Route::post('/scheduleTime',[DoctorController::class, 'postScheduleTime'])->name('postScheduleTime');
     Route::get('/review',[DoctorController::class, 'getReview'])->name('getReview');
     Route::resource('/blog',BlogController::class);
});

Route::middleware(['patient'])->prefix('patient')->group(function () {
    Route::get('/',[PatientController::class, 'index'])->name('patientDashboard');
    Route::get('/favourites',[PatientController::class, 'favourites'])->name('favourites');
    Route::get('/message',[PatientController::class, 'getMessage'])->name('getMessage');
    Route::get('/patientProfile',[PatientController::class, 'getPatientProfile'])->name('getPatientProfile');
    Route::post('/patientProfile',[PatientController::class, 'postPatientProfile'])->name('postPatientProfile');
    Route::post('/reviews/{id}',[PatientController::class, 'postReviews'])->name('postReviews');
});


Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/search',[HomeController::class, 'getSearch'])->name('getSearch');
Route::post('/search',[HomeController::class, 'postSearch'])->name('postSearch');
Route::get('/blogs',[HomeController::class, 'blogs'])->name('blogs');
Route::get('/about',[HomeController::class, 'about'])->name('about');


Route::get('/doctor/{id}/profile',[DoctorController::class, 'doctorProfile'])->name('doctorProfile');
Route::get('/patient/{id}/profile',[PatientController::class, 'patientProfile'])->name('patientProfile');



Route::get('/admin/login',[AuthController::class, 'getAdminLogin'])->name('getAdminLogin');
Route::get('/doctor/login',[AuthController::class, 'getDoctorLogin'])->name('getDoctorLogin');
Route::get('/patient/login',[AuthController::class, 'getPatientLogin'])->name('getPatientLogin');
Route::post('/login',[AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');


Route::get('/doctor/signup',[AuthController::class, 'getDoctorSignup'])->name('getDoctorSignup');
Route::post('/doctorSignup',[AuthController::class, 'postDoctorSignup'])->name('postDoctorSignup');
Route::get('/patient/signup',[AuthController::class, 'getPatientSignup'])->name('getPatientSignup');
Route::post('/patientSignup',[AuthController::class, 'postPatientSignup'])->name('postPatientSignup');

Route::get('/forgot-password',[AuthController::class, 'getForgotPassword'])->name('getForgotPassword');
Route::post('/forgot-password',[AuthController::class, 'postForgotPassword'])->name('postForgotPassword');
Route::get('/enter-code',[AuthController::class, 'getEnterCode'])->name('getEnterCode');
Route::post('/enter-code',[AuthController::class, 'postEnterCode'])->name('postEnterCode');
Route::get('/reset-password',[AuthController::class, 'getResetPassword'])->name('getResetPassword');
Route::post('/reset-password',[AuthController::class, 'postResetPassword'])->name('postResetPassword');
Route::get('/changePassword',[AuthController::class, 'getChangePassword'])->name('getChangePassword');
Route::post('/changePassword',[AuthController::class, 'postChangePassword'])->name('postChangePassword');

/* 
route::get('/image',Function(){
    $url = 'http://ac7a1ae098-001-site1.etempurl.com/Uploads/SpecialtyImage2d5a2e7d-531a-4f75-9a1c-e450f0e30e17_Neurology.png'; // Replace with the URL of the image you want to download
    $imageName = 'SpecialtyImage2d5a2e7d-531a-4f75-9a1c-e450f0e30e17_Neurology.png'; // Set a name for the downloaded image

    $client = new Client();
    $response = $client->get($url);

    Storage::put($imageName, $response->getBody());
}); */







