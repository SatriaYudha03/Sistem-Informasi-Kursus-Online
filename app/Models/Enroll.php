<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enroll extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'transaksi',
        'is_paid',
        'proof',
        'jenis_pembayaran',
        'user_id',
        'kelas_id',
        'tanggal_enroll'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
}
