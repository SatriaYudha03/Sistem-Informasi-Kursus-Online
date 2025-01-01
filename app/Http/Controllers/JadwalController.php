<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Models\Kelas;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $jadwals = Jadwal::all();
        $kelases = Kelas::all();
        return view ('admin.jadwals.index', compact('jadwals', 'kelases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelases = Kelas::all();
        return view ('admin.jadwals.create', compact('kelases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJadwalRequest $request)
    {
        // Cek apakah pengguna memiliki peran "owner"
        if (!Auth::user()->hasRole('owner')) {
            return redirect()->route('admin.jadwals.index')->withErrors('Anda tidak memiliki izin untuk menambahkan jadwal.');
        }

        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            // Buat kelas
            Jadwal::create($validated);
        });

        return redirect()->route('admin.jadwals.index')->with('success', 'Jadwal added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        // dd($kelas);
        $kelases = Kelas::all();
        return view('admin.jadwals.edit', compact('jadwal', 'kelases'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        // dd($request);
        DB::transaction(function () use ($request, $jadwal) {
            $validated = $request->validated();
            $jadwal->update($validated);
        });
    
        return redirect()->route('admin.jadwals.index')->with('success', 'Jadwal updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        DB::beginTransaction();

        try{
            $jadwal->delete();
            DB::commit();   

            return redirect()->route('admin.jadwals.index'); 
        }   catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.jadwals.index')->with('error', 'terjadi sebuah error'); 
        }
    }
}
