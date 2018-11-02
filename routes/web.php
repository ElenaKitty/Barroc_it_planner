<?php

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
    return redirect('home');
});

//panels voor docenten en studenten
Route::get('/docent', function(){
    return view('/docent/docent');
});
Route::get('/student', function(){
    return view('/student/student');
});


//login en register voor studenten
Route::get('/loginStudent', function(){
    return view('/student/loginStudent');
});
Route::get('/register', function(){
    return view('/student/register');
});

//de home pagina
Route::get('/', function() {
    return view('home');
});
Route::get('/home', function() {
    return view('home');
});

//Roep de register  of login method aan
Route::post('/registering', 'registerController@register');
Route::post('/loggingIn', 'loginController@login');
Route::get('/logout', function(){
    return view('home');
});