<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'telepon',
        'gender',
        'password',
        'pekerjaan',
        'avatar',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function kursuses(){
        return $this->belongsToMany(Kursus::class, 'KursusPeserta');
    }

    public function enrolls(){
        return $this->hasMany(Enroll::class);
    }

    public function hasActiveEnroll() {
        $latestEnroll = $this->enrolls()
        ->where('is_paid', true)
        ->latest('updated_at')
        ->first();

        if(!$latestEnroll){
            return false;
        }

        $enrollEndDate = Carbon::parse($latestEnroll->enroll_start_date)->addMonths(1);
        return Carbon::now()->lessThanOrEqualTo($enrollEndDate); //return berlangganan
    }
}
