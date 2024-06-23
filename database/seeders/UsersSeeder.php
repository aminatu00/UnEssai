<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Aby',
            'email' => 'aby@gmail.com',
            'password' => bcrypt('password123'),
            'user_type' => 'mentor',
                    'interests' => json_encode(['informatique']), // Exemple d'expertise  choisis
                                'niveau' => 'master1',

        ]);
        
        User::create([
            'name' => 'jean',
            'email' => 'jean@gmail.com',
            'password' => bcrypt('password123'),
            'user_type' => 'mentor',
                    'interests' => json_encode(['reseau']), // Exemple d'expertise  choisis
                                'niveau' => 'licence3',

        ]);
        User::create([
            'name' => 'fallou',
            'email' => 'fallou@gmail.com',
            'password' => bcrypt('password123'),
            'user_type' => 'mentor',
                    'interests' => json_encode(['informaique','reseau']), // Exemple d'expertise  choisis
                                'niveau' => 'master2',

        ]);
    }
}
