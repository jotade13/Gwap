<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombre' => 'Admin',
            'usuario' => 'admin',
            'password' => bcrypt('admin'),
            'edad' => 0,
            'sexo' => 'admin',
            'puntajeAcum' => 0,
            'veces_con_mas_puntos' => 0,
            'coincidenciasx2' => 0,
            'coincidenciasx3' => 0,
            'puntaje_maximo_juego' => 0
        ])->assignRole('admin');
    }
}
