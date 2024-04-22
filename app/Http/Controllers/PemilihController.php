<?php

namespace App\Http\Controllers;

use App\Imports\PemilihImportClass;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PemilihController extends Controller
{
    public function index()
    {
        return view('pages.backend.pemilih.index');
    }

    public function import(Request $request)
    {

        $request->validate([
            'pemilih' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('pemilih');
        Excel::import(new PemilihImportClass, $file);

        return redirect()->back()->with('success_message', 'Excel file imported successfully!');
    }
}
