<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**Instanciando o objeto*/
        $fornecedor = new Fornecedor;
        $fornecedor->nome = 'Agência';
        $fornecedor->site = 'www.Agência.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'WordOndialogue@gmail.com';
        $fornecedor->save();

        /**Utilizando o método create */
        Fornecedor::create([
            'nome' =>'Dominio',
            'site' =>'www.Dominio.com.br',
            'uf' => 'PA',
            'email' =>'WordOndialogue.com.br'
        ]);
        /**Utilizando a classe DB e o método insert */
        DB::table('fornecedores')->insert([
            'nome' => 'Madacascar',
            'site' => 'www.Madacascar.com.br',
            'uf' => 'BA',
            'email' =>'Wordondialogue.com.br'
        ]);

    }

}
