<?php

namespace Tests\Feature;

use App\Models\Produtos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetProductsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetProducts()
    {
        $produtos = Produtos::factory(3)->create();
     
        $response = $this->getJson(route('product.index'));
        $response->dump();
        $response->assertOk();
        $response->assertJsonCount(3);
        
        $response->assertJson($produtos->toArray());
        
    }
}
