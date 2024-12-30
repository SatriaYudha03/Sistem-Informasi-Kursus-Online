<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instruktur extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'is_active',
        'bidang_keahlian'
    ];

    public function user(){
        // return $this->belongsTo(User::class, 'KursusPeserta');
        return $this->belongsTo(User::class);
    }

    public function kursuses(){
        return $this->hasMany(Kursus::class);
    }
}
