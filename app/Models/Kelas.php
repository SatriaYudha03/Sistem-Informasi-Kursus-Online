<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'ruangan',
        'kursus_id',
        'instruktur_id',
    ];

    public function kursus(){
        return $this->belongsTo(Kursus::class,  'kursus_id');
    }
    public function instruktur(){
        return $this->belongsTo(Instruktur::class, 'instruktur_id');
    }
    public function jadwal(){
        // return $this->hasMany(Jadwal::class,  'jadwal_id');
        return $this->hasMany(Jadwal::class,  'kelas_id');
    }
}
