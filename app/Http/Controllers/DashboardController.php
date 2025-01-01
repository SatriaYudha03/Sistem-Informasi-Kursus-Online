<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Kursus;
use App\Models\Kategori;
use App\Models\Instruktur;
use Illuminate\Http\Request;
use App\Models\KursusPeserta;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $queryKursuses = Kursus::query();
        

        if($user->hasRole('instruktur')){
            $queryKursuses->whereHas('instruktur', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
            $pesertas = Enroll::whereIn('user_id', $queryKursuses->select('id'))
            ->distinct('user_id')
            ->count('user_id');
        } else {
            $pesertas = Enroll::distinct('user_id')
            ->count('user_id');
        }

        $kursuses = $queryKursuses->count();

        $kategories = Kategori::count();
        $transactions = Enroll::count();
        $instrukturs = Instruktur::count();

        return view(
            'dashboard',
            compact(
                'kategories', 'kursuses', 'transactions', 'pesertas', 'instrukturs'
            )
        );
    }
}
