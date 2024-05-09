<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test the /api/books endpoint.
     *
     * @return void
     */
    public function testBooksEndpoint()
    {
        $response = $this->get('/api/books');

        $response->assertStatus(200)
                 ->assertJson([]);
    }

    /**
     * Test creating a new book.
     *
     * @return void
     */
    public function testCreateBook()
    {
        // Simulate authenticated user
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        // Data for creating a new book
        $bookData = [
            'name' => 'New Book',
            'isbn' => '1234567890',
            'value' => 19.99,
        ];

        // Make request to create a new book
        $response = $this->postJson('/api/books', $bookData);

        // Assert that the book was created successfully
        $response->assertStatus(201)
                 ->assertJson([
                     'name' => 'New Book',
                     'isbn' => '1234567890',
                     'value' => 19.99,
                 ]);

        // Assert that the book exists in the database
        $this->assertDatabaseHas('books', [
            'name' => 'New Book',
            'isbn' => '1234567890',
            'value' => 19.99,
        ]);
    }
}
