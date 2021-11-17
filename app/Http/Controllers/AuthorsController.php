<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorsResource;
use App\Http\Requests\AuthorsRequest;

class AuthorsController extends Controller
{
    public function index()
    {
        return AuthorsResource::collection(Author::all());
    }


    public function create()
    {
        //
    }


    public function store(AuthorsRequest $request)
    {
//        $faker = \Faker\Factory::create(1);

        // name => passato da Postman
        $author = Author::create([
            'name' => $request->name
        ]);

        return new AuthorsResource($author);
    }


    public function show(Author $author)
    {
        return new AuthorsResource($author);
    }


    public function edit(Author $author)
    {
        //
    }


    public function update(AuthorsRequest $request, Author $author)
    {
        $author->update([
            'name' => $request->input('name')
        ]);

        return new AuthorsResource($author);
    }


    public function destroy(Author $author)
    {
        $author->delete();

        return response(null, 204);
    }
}
