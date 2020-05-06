<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
//
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        $response = $this->get('/');

        /*
         * browser testing: https://laravel.com/docs/7.x/dusk
        $this->visit('/');
        $this->click("Click me");
        $this->see("You've been clicked, punk.");
        $this->seePageIs("/feedback");
        */

        $response->assertStatus(200);

    }
}

