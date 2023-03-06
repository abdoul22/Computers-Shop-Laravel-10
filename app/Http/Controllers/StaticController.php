<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index(){
        return view('welcome');
}
    public function relation(){
        return view('relations');
    }
     public function contact(){
        return view('contact');
    }
     public function about(){
        return view('about');
    }




}


