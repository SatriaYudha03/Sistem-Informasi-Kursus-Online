<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Enroll::with(['user'])->orderByDesc('id')->get();
        return view('admin.enrolls.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
