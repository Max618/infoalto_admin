<?php

use Illuminate\Database\Seeder;
use Infoalto\Admin\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CRIANDO ADMIN - ID = 1
        $role = Role::create([
            'name' => 'administrador',
            'description' => 'Administrador do sistema, possuindo todas as permissões.'
        ]);
        $role->users()->attach(1);
        //CRIANDO GERENTE - ID = 2
        $role = Role::create([
            'name' => 'gerente',
            'description' => 'Gerente do sistema, possuindo algumas as permissões.'
        ]);
        $role->users()->attach(2);
    }
}
