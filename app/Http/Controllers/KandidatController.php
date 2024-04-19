<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\User;
use App\Models\VisiMisi;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class KandidatController extends Controller
{
    public function index()
    {
        $data = VisiMisi::all();
        return view('pages.backend.kandidat.index')->with('data', $data);
    }
    public function create()
    {
        return view('pages.backend.kandidat.create');
    }


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
        $pemilih = User::find(Auth::user()->id);
        $pemilih->update([
            "status" => "Y",
        ]);
        return redirect()->route('kandidat.vote.selesai');
    }

    public function show(Kandidat $kandidat)
    {
        //
    }
    public function edit(Kandidat $kandidat, $id)
    {
        $kandidat = Kandidat::find($id);
        return view('pages.backend.kandidat.edit', compact('kandidat'));
    }
    public function update(Request $request, Kandidat $kandidat, $id)
    {
        $validatedDataKandidat = $request->validate([
            'nomer' => 'required',
            'calon_ketua' => 'required',
            'calon_wakil' => 'required',
            'poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3000',
        ]);
        $validatedDataVisiMisi = $request->validate([
            'visi' => 'required',
            'misi_1' => 'required',
        ]);
        $kandidatData = Kandidat::find($id);
        $imageName = $kandidatData->poster; //request poster
        $destination =  public_path('/assets/kandidat/' . $kandidatData->poster);

        //jika request poster baru
        if ($request->poster) {
            //jika poster lama ada
            if (File::exists($destination)) {
                File::delete($destination);
            }
            //upload new poster
            $imageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('assets/kandidat'), $imageName);
        } else {
            //jika poster baru tidak di upload
            $imageName = $kandidatData->poster;
        }

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
    public function destroy(Kandidat $kandidat, $id)
    {
        $kandidat = Kandidat::find($id);

        $destination =  public_path('/assets/kandidat/' . $kandidat->poster);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $kandidat->delete();
        return redirect()->route('kandidat.index')->with('success_message', 'Data Berhasil Dihapus.');
    }
}
