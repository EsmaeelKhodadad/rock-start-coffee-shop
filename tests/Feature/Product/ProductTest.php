<?php

namespace Tests\Feature\Product;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function a_user_can_see_the_list_of_the_products(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]
        )->getJson(route('api.v1.product.index'));

        $response->assertStatus(Response::HTTP_OK)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonStructure(
                ['message', 'payload',]
            );
    }
}
