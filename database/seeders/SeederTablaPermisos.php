<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos=[
            // les damos permisos a los usuarios a todos sin excepcion
            // 'ver-post',
            // 'crear-post',
            // 'editar-post',
            // 'borrar-post',
            // 'ver-categoria',
            // 'crear-categoria',
            // 'editar-categoria',
            // 'borrar-categoria',
            // 'ver-usuario',
            // 'crear-usuario',
            // 'editar-usuario',
            // 'borrar-usuario',
            // 'ver-rol',
            // 'crear-rol',
            // 'editar-rol',
            // 'borrar-rol',
            // 'ver-permiso',
            // 'crear-permiso',
            // 'editar-permiso',
            // 'borrar-permiso',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
