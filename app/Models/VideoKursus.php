<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoKursus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'path_video',
        'kursus_id',
    ];

    public function kursus(){
        return $this->belongsTo(Kursus::class);
    }
}
