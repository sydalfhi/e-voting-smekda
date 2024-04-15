<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class KandidatController extends Controller
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

    public function vote(Request $request)
    {
        $data = Kandidat::where('nomer', $request->kandidat)->first();
        $data->update([
            "count" => $data->count + 1,
        ]);
        return redirect()->route('welcome')->with('success_message', 'Terima Kasih Telah Memilih');
    }



    /**
     * Display the specified resource.
     */
    public function show(Kandidat $kandidat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kandidat $kandidat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kandidat $kandidat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kandidat $kandidat)
    {
        //
    }
}
