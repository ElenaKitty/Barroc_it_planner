<?php
session_start();
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

//haal SSL error(60) weg
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

//amo login
Route::get('/login', function(){
    return redirect('/amoclient/redirect');
})->name('login');
Route::get('/amoclient/ready', function(){
	return redirect('/docent');
});
Route::get('/amoclient/logout', function(){
    $_SESSION['user'] = null;
    return redirect('home');
});

//panels voor docenten en studenten
Route::get('/docent', function(){
    $_SESSION['user'] = "docent";
    return view('/docent/docent');
});
Route::get('/student', function(){
    return view('/student/student');
});

Route::get('/createMeeting', function(){
    return view('/docent/meeting');
});
Route::get('/groupStudents', function(){
    return view('/docent/groups');
});

//login voor studenten
Route::get('/loginStudent', function(){
    return view('/student/loginStudent');
});

//de home pagina
Route::get('/', function() {
    return view('home');
})->name('home');
Route::get('/home', function(){
    return view('home');
})->name('home');

//Roep de login method aan
Route::post('/loggingIn', 'loginController@login');
Route::post('/mailing', function(){
    return view("mailing");
});

Route::post('/changeDate', 'planningController@setDate');
Route::post('/scheduling', 'scheduleController@scheduleMeeting');
Route::post('/addMeeting', 'meetingController@addMeeting');
Route::post('/truncate', 'dataController@truncate');

Route::get('/logout', function(){
    $_SESSION['user'] = null;
    return view('home');
});