<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front.index');
    }
    public function details(Kursus $kursus){
        return view('front.details');
    }
    public function login(){
        return view('front.login');
    }
}
