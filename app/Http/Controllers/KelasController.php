<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Models\Kelas;
use App\Models\Kursus;
use App\Models\Instruktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $kelases = Kelas::all();
        return view ('admin.kelases.index', compact('kelases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kursuses = Kursus::all();
        $instrukturs = Instruktur::all();
        return view ('admin.kelases.create', compact('kursuses','instrukturs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelasRequest $request)
    {
         // Cek apakah pengguna memiliki peran "owner"
    if (!Auth::user()->hasRole('owner')) {
        return redirect()->route('admin.kelases.index')->withErrors('Anda tidak memiliki izin untuk menambahkan kursus.');
    }

    DB::transaction(function () use ($request) {
        $validated = $request->validated();

        // Buat kelas
        Kelas::create($validated);
    });

    return redirect()->route('admin.kelases.index')->with('success', 'Kelas added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelase)
    {
        // dd($kelas);
        $kursuses = Kursus::all();
        $instrukturs = Instruktur::all();
        return view('admin.kelases.edit', compact('kelase', 'kursuses', 'instrukturs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelasRequest $request, Kelas $kelase)
    {
        // dd($request);
        DB::transaction(function () use ($request, $kelase) {
            $validated = $request->validated();
            $kelase->update($validated);
        });
    
        return redirect()->route('admin.kelases.index')->with('success', 'Kelas updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelase)
    {
        DB::beginTransaction();

        try{
            $kelase->delete();
            DB::commit();   

            return redirect()->route('admin.kelases.index'); 
        }   catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.kelases.index')->with('error', 'terjadi sebuah error'); 
        }
    }
}
