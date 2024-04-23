<?php

namespace App\Http\Controllers;

use App\Imports\PemilihImportClass;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PemilihController extends Controller
{
    public function index()
    {
        return view('pages.backend.pemilih.index');
    }

    public function destroy()
    {
        User::where('role', 'user')->delete();
        return redirect()->back()->with('success_message', 'Delete successfully!');
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

    public static function countPemilih()
    {
        return User::get()->where('role', 'user')->count();
    }

    public static function countStatusTrue()
    {
        return User::get()->where('role', 'user')->where('status', 'Y')->count();
    }

    public static function countStatusFalse()
    {
        return User::get()->where('role', 'user')->where('status', 'N')->count();
    }
}
