<?php

use Illuminate\Database\Seeder;
use Infoalto\Admin\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CRIANDO ADMIN
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret')
        ]);
        //CRIANDO GERENTE
        User::create([
            'name' => 'Gerente',
            'email' => 'gerente@gerente.com',
            'password' => bcrypt('secret')
        ]);
    }
}
