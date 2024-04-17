<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\VisiMisi;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = VisiMisi::all();

        return view('pages.backend.kandidat.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.kandidat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedDataKandidat = $request->validate([
            'nomer' => 'required',
            'calon_ketua' => 'required',
            'calon_wakil' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3000',
        ]);
        $validatedDataVisiMisi = $request->validate([
            'visi' => 'required',
            'misi_1' => 'required',
        ]);

        $imageName = time() . '.' . $request->poster->extension();
        $request->poster->move(public_path('assets/kandidat'), $imageName);

        $kandidat = Kandidat::create([...$validatedDataKandidat, "poster" => $imageName]);
        $idKandidatByNomer = Kandidat::where('nomer', $request->nomer)->first();

        $misiKandidat = [
            $request->misi_1,
            $request->misi_2,
            $request->misi_3,
            $request->misi_4,
            $request->misi_5,
            $request->misi_6,
            $request->misi_7,
            $request->misi_8,
            $request->misi_9,
            $request->misi_10,
        ];
        $visiMisi = VisiMisi::create([
            "visi" => $request->visi,
            "idKandidat" => $idKandidatByNomer->id,
            "misi" => $misiKandidat,
        ]);


        return redirect()->route('kandidat.index')->with('success_message', 'Data Berhasil Ditambahkan.');
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
    public function edit(Kandidat $kandidat, $id)
    {
        $kandidat = Kandidat::find($id);
        return view('pages.backend.kandidat.edit', compact('kandidat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kandidat $kandidat, $id)
    {
        $validatedDataKandidat = $request->validate([
            'nomer' => 'required',
            'calon_ketua' => 'required',
            'calon_wakil' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3000',
        ]);
        $validatedDataVisiMisi = $request->validate([
            'visi' => 'required',
            'misi_1' => 'required',
        ]);

        $imageName = time() . '.' . $request->poster->extension();
        $request->poster->move(public_path('assets/kandidat'), $imageName);

        $kandidatData = Kandidat::find($id);
        $kandidatData->update([
            "nomer" => $request->nomer,
            "calon_ketua" => $request->calon_ketua,
            "calon_wakil" => $request->calon_wakil,
            "poster" => $imageName,
        ]);


        $visiMisiData = VisiMisi::where('idKandidat', $id)->first();
        $misiKandidat = [
            $request->misi_1,
            $request->misi_2,
            $request->misi_3,
            $request->misi_4,
            $request->misi_5,
            $request->misi_6,
            $request->misi_7,
            $request->misi_8,
            $request->misi_9,
            $request->misi_10,
        ];
        $visiMisiData->update([
            "visi" => $request->visi,
            "misi" => $misiKandidat,
        ]);

        return redirect()->route('kandidat.index')->with('success_message', 'Data Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kandidat $kandidat, $id)
    {
        $kandidat = Kandidat::find($id);
        $kandidat->delete();
        return redirect()->route('kandidat.index')->with('success_message', 'Data Berhasil Dihapus.');
    }
}
