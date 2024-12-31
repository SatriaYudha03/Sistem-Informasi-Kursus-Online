<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Kategori;
use App\Models\Instruktur;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKursusRequest;
use App\Http\Requests\UpdateKursusRequest;
use App\Models\MateriKursus;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $query = Kursus::with('kategori')->orderByDesc('id');

        // if($user->hasRole('owner')){
        //     $query->whereHas('instruktur', function ($query) use ($user) {
        //         $query->where('user_id', $user->id);
        //     });
        // }

        $kursuses = $query->paginate(10);
        return view ('admin.kursuses.index', compact('kursuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view ('admin.kursuses.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKursusRequest $request)
{
    // Cek apakah pengguna memiliki peran "owner"
    if (!Auth::user()->hasRole('owner')) {
        return redirect()->route('admin.kursuses.index')->withErrors('Anda tidak memiliki izin untuk menambahkan kursus.');
    }

    DB::transaction(function () use ($request) {
        $validated = $request->validated();
        
        // Upload thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $thumbnailPath;
        }

        // Generate slug
        $validated['slug'] = Str::slug($validated['name']);

        // Buat kursus
        Kursus::create($validated);
    });

    return redirect()->route('admin.kursuses.index')->with('success', 'Course added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Kursus $kursus, MateriKursus $materikursus)
    {
        return view ('admin.kursuses.show', compact('kursus', 'materikursus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kursus $kursus)
    {
        $kategoris = Kategori::all();
        return view ('admin.kursuses.edit', compact('kursus', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKursusRequest $request, Kursus $kursus)
    {
        DB::transaction(function () use ($request, $kursus) {

            $validated = $request->validated();
            // dd($validated);
            if($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

        $validated['slug'] = Str::slug($validated['name']);
        
        $kursus->update($validated);

        if(!empty($validated['materi_kursuses'])){
            $kursus->materi_kursuses()->delete();
            foreach($validated['materi_kursuses'] as $keypointText){
                $kursus->materi_kursuses()->create([
                    'name' => $keypointText,
                ]);
            }
        }
        });
        return redirect()->route('admin.kursuses.index', $kursus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kursus $kursus)
    {
        DB::beginTransaction();

        try{
            $kursus->delete();
            DB::commit();   

            return redirect()->route('admin.kursuses.index'); 
        }   catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.kursuses.index')->with('error', 'terjadi sebuah error'); 
        }
    }
}
