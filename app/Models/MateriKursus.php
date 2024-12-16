<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MateriKursus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'kursus_id'
    ];

    public function kursus(){
        return $this->belongsTo(Kursus::class);
    }
}
