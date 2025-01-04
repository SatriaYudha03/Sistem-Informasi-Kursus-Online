<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kursus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'deskripsi',
        'thumbnail',
        'durasi',
        'start_date',
        'end_date',
        'harga',
        'kategori_id',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
    public function instruktur(){
        return $this->belongsTo(Instruktur::class);
    }
    public function kelas(){
        return $this->hasMany(Kelas::class);
    }
    // public function video_kursuses(){
    //     return $this->hasMany(VideoKursus::class);
    // }
    public function materi_kursuses(){
        return $this->hasMany(MateriKursus::class);
    }
    // public function peserta(){
    //     return $this->belongsToMany(User::class, 'kursus_pesertas');
    // }
}
