<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;
    protected $table = "visi_misi";
    protected $fillable = [
        'visi',
        'idKandidat',
        'misi',
    ];
    protected $casts = [
        'misi' => 'array',
    ];

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'id');
    }
}
