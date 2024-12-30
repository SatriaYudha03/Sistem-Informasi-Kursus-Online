<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Instruktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\StoreInstrukturRequest;
use Illuminate\Validation\ValidationException;

class InstrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instrukturs = Instruktur::orderByDesc('id', 'desc')->get();

        return view('admin.instrukturs.index', [
            'instrukturs' => $instrukturs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view ('admin.instrukturs.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstrukturRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Data tidak ditemukan'
            ]);
        }
        if ($user->hasRole('instruktur')) {
            return back()->withErrors([
                'email' => 'Email tersebut telah menjadi instruktur'
            ]);
        }

        DB::transaction(function () use ($user, $validated) {

            $validated['user_id'] = $user->id;
            $validated['is_active'] = true;

            // Instruktur::create($validated);

            // Menambahkan bidang_keahlian
            Instruktur::create([
                'user_id' => $validated['user_id'],
                'is_active' => $validated['is_active'],
                'bidang_keahlian' => $validated['bidang_keahlian'], // Menyimpan bidang keahlian
            ]);

            if ($user->hasRole('peserta')) {
                $user->removeRole('peserta');
            }
            $user->assignRole('instruktur');
        });

        return redirect()->route('admin.instrukturs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instruktur $instruktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instruktur $instruktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instruktur $instruktur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instruktur $instruktur)
    {
        try {
            $instruktur->delete();

            $user = \App\Models\User::find($instruktur->user_id);
            $user->removeRole('instruktur');
            $user->assignRole('peserta');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }
}
