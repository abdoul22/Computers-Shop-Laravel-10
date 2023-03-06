<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\ComputerController;

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
//Computers

Route::resource('computers', ComputerController::class);

//Statics
Route::get('/',[StaticController::class, 'index']);
Route::get('/relations/parterners',[StaticController::class, 'relation'])->name('home.relation');
Route::get('/about/about',[StaticController::class, 'about'])->name('home.about');
Route::get('/contact/contact',[StaticController::class, 'contact'])->name('home.contact');

Route::get('/about/{nahne?}/{ntoume?}', function ($nahne = null, $ntoume = null) {
    if(isset($nahne)){
        if(isset($ntoume)){
        return '<h1>Le produit ' . $ntoume .' ce trouve à '. $nahne. '</h1>';
    }
    else{
        return $nahne;
    }
}
    return view('about');
});

Route::get('/contact', function () {
    $filter = request('style');
    if(isset($filter)){
        return '<h1>this is '. strip_tags($filter).'</h1>';
    }
    return view('contact');
});

