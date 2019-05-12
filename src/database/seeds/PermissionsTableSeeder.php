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
        ]);
        $edit = Permission::create([
            'name' => 'edit_user',
        ]);
        $delete = Permission::create([
            'name' => 'delete_user',
        ]);
        $view = Permission::create([
            'name' => 'view_user',
        ]);
        $create->roles()->attach(1);
        $edit->roles()->attach(1);
        $delete->roles()->attach(1);
        $view->roles()->attach(1);

        //PERMISSOES ROLES
        $create = Permission::create([
            'name' => 'create_role',
        ]);
        $edit = Permission::create([
            'name' => 'edit_role',
        ]);
        $delete = Permission::create([
            'name' => 'delete_role',
        ]);
        $view = Permission::create([
            'name' => 'view_role',
        ]);
        $create->roles()->attach(1);
        $edit->roles()->attach(1);
        $delete->roles()->attach(1);
        $view->roles()->attach(1);
        $view->roles()->attach(2);
        
        //PERMISSOES PERMISSIONS
        $create = Permission::create([
            'name' => 'create_permission',
        ]);
        $edit = Permission::create([
            'name' => 'edit_permission',
        ]);
        $delete = Permission::create([
            'name' => 'delete_permission',
        ]);
        $view = Permission::create([
            'name' => 'view_permission',
        ]);
        $create->roles()->attach(1);
        $edit->roles()->attach(1);
        $delete->roles()->attach(1);
        $view->roles()->attach(1);
        $view->roles()->attach(2);
    }
}
