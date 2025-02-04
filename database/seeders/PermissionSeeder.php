<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'Crear cursos',
            'guard_name' => 'web',

        ]);
        Permission::create([
            'name' => 'Leer cursos',
            'guard_name' => 'web',

        ]);
        Permission::create([
            'name' => 'Actualizar cursos',
            'guard_name' => 'web',

        ]);
        Permission::create([
            'name' => 'Eliminar cursos',
            'guard_name' => 'web',

        ]);

        Permission::create([
            'name' => 'Ver dashboard',
            'guard_name' => 'web',

        ]);

        Permission::create([
            'name' => 'Crear role',
            'guard_name' => 'web',

        ]);
        Permission::create([
            'name' => 'Listar role',
            'guard_name' => 'web',

        ]);
        Permission::create([
            'name' => 'Editar role',
            'guard_name' => 'web',

        ]);
        Permission::create([
            'name' => 'Eliminar role',
            'guard_name' => 'web',

        ]);
        Permission::create([
            'name' => 'Leer usuarios',
            'guard_name' => 'web',

        ]);
        Permission::create([
            'name' => 'Editar usuarios',
            'guard_name' => 'web',

        ]);
    }
}
