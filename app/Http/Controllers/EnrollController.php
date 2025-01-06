<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Enroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEnrollRequest;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $enrolls = Enroll::with(['user'])->orderByDesc('id')->get();
        return view('admin.enrolls.index', compact('enrolls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $kelases = Kelas::with('kursus')->get();

        return view ('admin.enrolls.create', compact('users','kelases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollRequest $request)
    {
        if (!Auth::user()->hasRole('owner')) {
            return redirect()->route('admin.enrolls.index')->withErrors('Anda tidak memiliki izin untuk menambahkan jadwal.');
        }

        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Data tidak ditemukan'
            ]);
        }

         // Cek apakah file proof diupload
        if ($request->hasFile('proof')) {
        // Simpan file ke folder proofs di storage/public
        $path = $request->file('proof')->store('proofs', 'public');
        $validated['proof'] = $path; // Simpan path ke dalam array $validated
        }

        DB::transaction(function () use ($user, $validated) {

            $validated['user_id'] = $user->id;

            Enroll::create($validated);
        });

        return redirect()->route('admin.enrolls.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enroll $enroll)
    {
        return view('admin.enrolls.show', compact('enroll'));
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enroll $enroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enroll $enroll)
    {
        DB::transaction(function () use ($enroll) {

            $enroll->update([
                'is_paid' => true,
                'enroll_start_date' => Carbon::now()
            ]);
        });

        return redirect()->route('admin.enrolls.show', $enroll);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enroll $enroll)
    {
        //
    }
}
