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
            'name' => 'user_create',
        ]);
        $edit = Permission::create([
            'name' => 'user_edit',
        ]);
        $delete = Permission::create([
            'name' => 'user_delete',
        ]);
        $view = Permission::create([
            'name' => 'user_view',
        ]);
        $create->roles()->attach(1);
        $edit->roles()->attach(1);
        $delete->roles()->attach(1);
        $view->roles()->attach(1);

        //PERMISSOES ROLES
        $create = Permission::create([
            'name' => 'role_create',
        ]);
        $edit = Permission::create([
            'name' => 'role_edit',
        ]);
        $delete = Permission::create([
            'name' => 'role_delete',
        ]);
        $view = Permission::create([
            'name' => 'role_view',
        ]);
        $create->roles()->attach(1);
        $edit->roles()->attach(1);
        $delete->roles()->attach(1);
        $view->roles()->attach(1);
        $view->roles()->attach(2);
        
        //PERMISSOES PERMISSIONS
        $create = Permission::create([
            'name' => 'permission_create',
        ]);
        $edit = Permission::create([
            'name' => 'permission_edit',
        ]);
        $delete = Permission::create([
            'name' => 'permission_delete',
        ]);
        $view = Permission::create([
            'name' => 'permission_view',
        ]);
        $create->roles()->attach(1);
        $edit->roles()->attach(1);
        $delete->roles()->attach(1);
        $view->roles()->attach(1);
        $view->roles()->attach(2);
    }
}
