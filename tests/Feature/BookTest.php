<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * Test the BookController Index Page
     *
     * @return void
     */
    public function testBooksIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('welcome');
    }
    
    /**
     * Test POST to create new Book
     *
     * @return void
     */
    public function testStoreBook()
    {
        $response = $this->post('/books',[
            'title' => 'Old Man and the Sea',
            'author' => 'Ernest Hemingway',
            'published' => '1920-11-26'
        ]);
        
        $response->assertRedirect();
        $this->assertDatabaseHas('books', [
            'title' => 'Old Man and the Sea',
            'author' => 'Ernest Hemingway',
            'published' => '1920-11-26'
        ]);
    }
    
    /**
     * Test delete Book
     *
     * @return void
     */
    public function testDeleteBook()
    {
        $book = \App\Models\Book::firstWhere('title','Old Man and the Sea');
        $response = $this->delete("books/{$book->id}");
        
        $response->assertRedirect();
        $this->assertDeleted('books', [
            'title' => 'Old Man and the Sea',
            'author' => 'Ernest Hemingway',
            'published' => '1920-11-26'
        ]);
    }
}
