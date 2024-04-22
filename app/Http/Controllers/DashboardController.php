<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count = [
            'user' => PemilihController::countPemilih(),
            'statusTrue' => PemilihController::countStatusTrue(),
            'statusFalse' => PemilihController::countStatusFalse(),
            'kandidat' => Kandidat::get(),
        ];

        return view('pages.backend.dashboard', compact('count'));
    }
}
