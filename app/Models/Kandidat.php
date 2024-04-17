<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $table = "kandidat";
    protected $fillable = [
        'nomer',
        'calon_ketua',
        'calon_wakil',
        'poster',
        'count',
    ];

    public function VisiMisi()
    {
        return $this->hasOne(VisiMisi::class, 'id');
    }
}
