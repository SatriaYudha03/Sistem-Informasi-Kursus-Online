<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ownerRole = Role::create([
            'name' => 'owner'
        ]);

        $pesertaRole = Role::create([
            'name' => 'peserta'
        ]);

        $instrukturRole = Role::create([
            'name' => 'instruktur'
        ]);
        
        $userOwner = User::create([
            'name' => 'Admin',
            'pekerjaan' => 'Wirausaha',
            'avatar' => 'images/default-avatar.png',
            'email' => 'admin@gmail.com',
            'telepon' => '0812353235',
            'gender' => 'Pria',
            'password' => bcrypt('123123123')
        ]);

        $userInstruktur = User::create([
            'name' => 'Instruktur1',
            'pekerjaan' => 'Guru',
            'avatar' => 'images/default-avatar.png',
            'email' => 'instruktur1@gmail.com',
            'telepon' => '0812353235',
            'gender' => 'Pria',
            'password' => bcrypt('123123123')
        ]);

        $userOwner->assignRole($ownerRole);
        $userInstruktur->assignRole($instrukturRole);
    }
}
