<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Compra;
use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user)
    {
        $user->create([
            'name' => 'root',
            'email' => 'root@admin.com',
            'password' => bcrypt('senha123'),
        ])->givePermissionTo('admin');

        $user->create([
            'name' => 'Luis',
            'email' => 'luis@gmail.com',
            'password' => bcrypt('12345678'),
        ])->givePermissionTo('user');

        Categoria::create([
            'nome' => 'Ação',
            'descricao' => 'tiro',
        ]);

        Categoria::create([
            'nome' => 'Aventura',
            'descricao' => 'exploração',
        ]);

        Fornecedor::create([
            'nome' => 'Rockstar Game',
            'telefone' => '9999999999',
            'cep' => '19500-000',
            'logradouro' => 'Casa',
            'cidade' => 'AAA',
            'estado' => 'bbbb',
            'razao_social' => 'aaaa',
        ]);

        Fornecedor::create([
            'nome' => 'Naughty Dog',
            'telefone' => '8888888888',
            'cep' => '19500-888',
            'logradouro' => 'Casa',
            'cidade' => 'LA',
            'estado' => 'LA',
            'razao_social' => 'aaaa',
        ]);

        Produto::create([
            'nome' => 'GTA 5',
            'descricao' => 'muito bom',
            'preco' => '199',
            'quantidade' => 300,
            'imagem' => 'images/gta5.png',
            'categoria_id' => 1,
            'fornecedor_id' => 1,
        ]);

        Produto::create([
            'nome' => 'THE LAST OF US 2',
            'descricao' => 'muito bom',
            'preco' => '300',
            'quantidade' => 300,
            'imagem' => 'images/The_Last_of_Us_2_capa.png',
            'categoria_id' => 2,
            'fornecedor_id' => 2,
        ]);

        Compra::create([
            'status' => 0,
            'user_id' => 2,
        ]);

        Compra::create([
            'status' => 1,
            'user_id' => 1,
        ]);
    }
}
