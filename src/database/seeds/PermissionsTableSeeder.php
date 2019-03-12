<?php

use Illuminate\Database\Seeder;
use Infoalto\Admin\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //PERMISSOES USUARIOS
        $create = Permission::create([
            'name' => 'create_user',
            'description' => 'Criar novo usuário.'
        ]);
        $edit = Permission::create([
            'name' => 'edit_user',
            'description' => 'Editar usuário.'
        ]);
        $delete = Permission::create([
            'name' => 'delete_user',
            'description' => 'Deletar usuário.'
        ]);
        $view = Permission::create([
            'name' => 'view_user',
            'description' => 'Visualizar informações do usuário.'
        ]);
        $create->roles()->attach(1);
        $edit->roles()->attach(1);
        $delete->roles()->attach(1);
        $view->roles()->attach(1);

        //PERMISSOES ROLES
        $create = Permission::create([
            'name' => 'create_role',
            'description' => 'Criar novo cargo.'
        ]);
        $edit = Permission::create([
            'name' => 'edit_role',
            'description' => 'Editar cargo.'
        ]);
        $delete = Permission::create([
            'name' => 'delete_role',
            'description' => 'Deletar cargo.'
        ]);
        $view = Permission::create([
            'name' => 'view_role',
            'description' => 'Viasualizar informações do cargo.'
        ]);
        $create->roles()->attach(1);
        $edit->roles()->attach(1);
        $delete->roles()->attach(1);
        $view->roles()->attach(1);
        $view->roles()->attach(2);
        
        //PERMISSOES PERMISSIONS
        $create = Permission::create([
            'name' => 'create_permission',
            'description' => 'Criar nova permissão.'
        ]);
        $edit = Permission::create([
            'name' => 'edit_permission',
            'description' => 'Editar permissão.'
        ]);
        $delete = Permission::create([
            'name' => 'delete_permission',
            'description' => 'Deletar permissão.'
        ]);
        $view = Permission::create([
            'name' => 'view_permission',
            'description' => 'Viasualizar informações da permissão.'
        ]);
        $create->roles()->attach(1);
        $edit->roles()->attach(1);
        $delete->roles()->attach(1);
        $view->roles()->attach(1);
        $view->roles()->attach(2);
    }
}
