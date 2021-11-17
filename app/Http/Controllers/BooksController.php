<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BooksResource;

class BooksController extends Controller
{

    public function index()
    {
        return BooksResource::collection(Book::all());
    }


    public function store(Request $request)
    {
        $faker = \Faker\Factory::create(1);

        $book = Book::create([
            'name' => $faker->name,
            'description' => $faker->sentence,
            'publication_year' => $faker->year
        ]);

        return new BooksResource($book);
    }


    public function show(Book $book)
    {
//        return $book->author;
        return new BooksResource($book);
    }


    public function update(Request $request, Book $book)
    {
        $book->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'publication_year' => $request->input('publication_year')
        ]);

        return new BooksResource($book);
    }


    public function destroy(Book $book)
    {
        $book->delete();

        return response(null, 204);
    }
}
