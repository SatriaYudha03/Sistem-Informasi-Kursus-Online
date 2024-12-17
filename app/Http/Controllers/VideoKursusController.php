<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\VideoKursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreVideoKursusRequest;

class VideoKursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Kursus $kursus)
    {
        return view('admin.video_kursuses.create', compact('kursus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoKursusRequest $request, Kursus $kursus)
    {
        DB::transaction(function () use ($request, $kursus) {

        $validated = $request->validated();

        $validated['kursus_id'] = $kursus->id;
        
        $videoKursus = VideoKursus::create($validated);

        });
        
        return redirect()->route('admin.kursuses.show', $kursus->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoKursus $videoKursus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoKursus $videoKursus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoKursus $videoKursus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoKursus $videoKursus)
    {
        //
    }
}
