<?php

namespace Tests\Feature;

<<<<<<< HEAD
// use Illuminate\Foundation\Testing\RefreshDatabase;
=======
use Illuminate\Foundation\Testing\RefreshDatabase;
>>>>>>> fed64e2b3b3e9936ac944cb53eb739296d7b2318
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
<<<<<<< HEAD
     */
    public function test_the_application_returns_a_successful_response(): void
=======
     *
     * @return void
     */
    public function test_example()
>>>>>>> fed64e2b3b3e9936ac944cb53eb739296d7b2318
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
