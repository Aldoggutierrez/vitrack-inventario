<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Ubicacion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@argon.com',
            'password' => bcrypt('secret')
        ]);
        $ubicacion = Ubicacion::create([
            "nombre" => "bodega",
        ]);
        Equipo::create([
            "nombre" => "camara",
            "marca" => "sony",
            "numero_serie" => "1234",
            "ubicacion_id" => $ubicacion->id,
            "fecha_garantia" => now(),
        ]);
    }
}
