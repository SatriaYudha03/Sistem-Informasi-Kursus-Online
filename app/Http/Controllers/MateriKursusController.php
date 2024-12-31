<?php

namespace App\Http\Controllers;

use App\Models\MateriKursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMateriKursusRequest;
use App\Models\Kursus;

class MateriKursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create(MateriKursus $materikursus, Kursus $kursus)
    {
        return view('admin.materi_kursuses.create', compact('kursus','materikursus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMateriKursusRequest $request, Kursus $kursus)
    {
        DB::transaction(function () use ($request, $kursus) {

            $validated = $request->validated();

            $validated['kursus_id'] = $kursus->id;

            $materikursus = MateriKursus::create($validated);
        });

        return redirect()->route('admin.kursuses.show', $kursus->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(MateriKursus $materiKursus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MateriKursus $materi_kursus, Kursus $kursus)
    {
        return view ('admin.materi_kursuses.edit', compact('materi_kursus', 'kursus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMateriKursusRequest $request, MateriKursus $materi_kursus)
    {
        DB::transaction(function () use ($request, $materi_kursus) {

        $validated = $request->validated(); 
        
        $materi_kursus->update($validated);
        });

        return redirect()->route('admin.kursuses.show', $materi_kursus->kursus_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MateriKursus $materi_kursus)
    {
        DB::beginTransaction();

        try{
            $materi_kursus->delete();
            DB::commit();   

            return redirect()->route('admin.kursuses.show', $materi_kursus->kursus_id); 
        }   catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.kursuses.show', $materi_kursus->kursus_id)->with('error', 'terjadi sebuah error'); 
        }
    }
}
