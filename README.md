# Pacote Admin - InfoAlto

## Comandos

<p>Gerar Views:
<code>php artisan vendor:publish --tag=views</code>
</p>
<p>Gerar CSS e JS do template: 
<code>php artisan vendor:publish --tag=public</code>
</p>
<p>Gerar Controllers: 
<code>php artisan vendor:publish --tag=controller</code>
</p>
<p>Gerar Seeds: 
<code>php artisan vendor:publish --tag=seeds</code>
<code>
    UsersTableSeeder::class,
    RolesTableSeeder::class,
    PermissionsTableSeeder::class
</code>
<code>composer dump-autoload</code>
</p>