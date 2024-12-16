<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::orderByDesc('id')->get();
        return view('admin.kategoris.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategoris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {

        DB::transaction(function () use ($request) {

            $validated = $request->validated();

            if($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }
            else {
                $iconPath = 'images/icon-default.png';
            }

        $validated['slug'] = Str::slug($validated['name']);
        //web design -> web-design
        
        $kategori = Kategori::create($validated);
        });

        return redirect()->route('admin.kategoris.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('admin.kategoris.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        DB::transaction(function () use ($request, $kategori) {

            $validated = $request->validated();

            if($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

        $validated['slug'] = Str::slug($validated['name']);
        //web design -> web-design
        
        $kategori->update($validated);
        });

        return redirect()->route('admin.kategoris.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        DB::beginTransaction();

        try{
            $kategori->delete();
            DB::commit();   

            return redirect()->route('admin.kategoris.index'); 
        }   catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.kategoris.index')->with('error', 'terjadi sebuah error'); 
        }
    }
}
