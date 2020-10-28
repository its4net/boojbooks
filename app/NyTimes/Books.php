<?php

namespace App\NyTimes;

use Illuminate\Support\Facades\Http;

class Books
{
    /**
     * Retrieve NY Times current best sellers list
     * 
     * @return array
     */
    public static function getBestSellers()
    {
        $response = Http::get('https://api.nytimes.com/svc/books/v3/lists/current/hardcover-fiction.json',[
            'api-key' => config('app.nytimes_api_key')
        ]);
        
        if ($response->successful()) {
            $books = json_decode($response->getBody());
            return $books->results->books;
        }
        
        return false;
    }
}
