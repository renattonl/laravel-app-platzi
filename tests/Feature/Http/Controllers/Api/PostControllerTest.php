<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
  use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
        // $this->withoutExceptionHandling();
        $response = $this->json('POST', "/api/posts", [
          "title" => "El titulo",
          "body" => "El contenido",
          "iframe" => "",
          "image" => ""
        ]);

        $response->assertJsonStructure([
          "id","user_id","title","body","iframe","image","created_at","updated_at"
        ])
        ->assertJson(["title" => "El titulo"])
        ->assertStatus(201);

        $this->assertDatabaseHas("posts",["title" => "El titulo"]);
    }
}
