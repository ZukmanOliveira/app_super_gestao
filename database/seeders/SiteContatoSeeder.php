<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Factory as FactoriesFactory;
use Illuminate\Database\Seeder;


class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**$contato = new SiteContato();
        $contato->nome = 'WordOnDialogue';
        $contato->telefone = '(99)9999-9999';
        $contato->email = 'WordOnDigalogue@gmail.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'seja bem vido ao sistema super gestão';
        $contato->save();
        
        SiteContato::create([
        'nome' => 'WordOndialogue',
        'telefone' => '(99) 9999-8999',
        'email' => 'WordOnDigalogue@gmail.com',
        'motivo_contato' => 1,
        'mensagem' =>'Seja bem-vido ao sistema super gestão',
        ]);*/   
        SiteContato::factory()->count(100)->create();
        

    }
}
