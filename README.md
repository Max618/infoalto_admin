# Pacote Admin - InfoAlto

## Instalar
<p>Adicionar <code>"Infoalto\\Admin\\": "packages/infoalto/admin/src"</code> em autoload->psr-4 em composer.json</p>
<p>Adicionar <code>Infoalto\Admin\MainServiceProvider::class,</code> em providers em config/app.php</p>

## Comandos

<p>Gerar Arquivos base:
<code>php artisan vendor:publish --tag=admin</code>
</p>
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
<p>Mudar rotas de redirectTo para <code>/painel</code> e inserir <code> 
Route::get('/painel', '\Infoalto\Admin\Controllers\PainelController@index')->name('painel');
</code> em routes/web.php</p>