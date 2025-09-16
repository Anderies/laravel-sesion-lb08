<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dosen');
});

Route::get('/test-submit', function (){
    return view('test-submit');
});

Route::post('/submit', function(){
    return "form has been submitted";
});

Route::put('/update', function(){
    return "send update data";
});

Route::delete('/remove', function(){
    return "send remove data";
});

// Route Group
// 3 halaman admin / nambahin dosen / namabahin mahasiswa
// nambahin karyawan
Route::prefix('/admin')->group(function (){
    route::get('/dosen', function(){
        return view('admin.dosen');
    });
    route::get('/mahasiswa', function(){
        return view('admin.mahasiswa');
    });
});

route::get('/admin/karyawan', function (){
    return view('admin.karyawan');
})->name('karyawan');

Route::match(['get', 'post'], '/feedback', function (Request $request) {
    if ($request->isMethod('post')) {
        return 'Form submitted';
    }
    return view('feedback');
});

Route::get('/contact', function (){
    return view('contact');
}); 

Route::post('/submit-contact', function (Request $request){
    $name = $request->input('name');
    return "Received name $name";
}); 

// 2.5 Data Routes ke View
Route::get('/about', function(){
    return view('about', [
        'name' => null,
        'umur' => 22
    ]);
});

Route::get('/profile/{username}', function($username){
    return view('profile', ['username' 
    => $username]);
});

Route::fallback(function () {
    return response()->view('fallback', [], 404);
});
