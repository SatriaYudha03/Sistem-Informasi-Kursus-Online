<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){

        $kursuses = Kursus::with(['kategori', 'instruktur', 'peserta'])->orderByDesc('id')->get();

        return view('front.index', compact('kursuses'));
    }
    public function details(Kursus $kursus){
        return view('front.details');
    }
}
