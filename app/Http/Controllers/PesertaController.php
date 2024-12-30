<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\ProfileUpdateRequest;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesertas = User::orderByDesc('id', 'desc')->get();

        return view('admin.pesertas.index', [
            'pesertas' => $pesertas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pesertas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'], 
            'pekerjaan' => ['required', 'string', 'max:255'], 
            'telepon' => ['required', 'string', 'max:255'], 
            'gender' => ['required', 'string', 'max:255'], 
            'avatar' => ['required', 'image', 'mimes:png,jpg,jpeg'], 
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
    //proses upload foto
    if($request->hasFile('avatar')){
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
    }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'pekerjaan' => $request->pekerjaan,
            'telepon' => $request->telepon,
            'gender' => $request->gender,
            'avatar' => $avatarPath,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('admin.pesertas.index', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $peserta)
    {
        return view('admin.pesertas.edit', compact('peserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $peserta)
{
    DB::transaction(function () use ($request, $peserta) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'], 
            'pekerjaan' => ['required', 'string', 'max:255'], 
            'avatar' => ['nullable', 'image', 'mimes:png,jpg,jpeg'], 
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'telepon' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $avatarPath;
        }

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $peserta->update($validated);
    });

    return redirect(route('admin.pesertas.index'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $peserta)
    {
        DB::beginTransaction();

        try{
            $peserta->delete();
            DB::commit();   

            return redirect()->route('admin.pesertas.index'); 
        }   catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.pesertas.index')->with('error', 'terjadi sebuah error'); 
        }
    }
}
