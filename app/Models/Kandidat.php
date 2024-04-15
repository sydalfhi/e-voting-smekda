<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $table = "kandidat";
    protected $fillable = [
        'Nomer',
        'calon_ketua',
        'calon_wakil',
        'poster',
        'count',
    ];
}
