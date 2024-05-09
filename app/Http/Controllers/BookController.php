<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'isbn' => 'required|numeric',
            'value' => 'required|numeric',
        ]);

        return Book::create($request->all());
    }
    public function attachStore(Book $book, Store $store)
    {
        //var_dump($book);
        $book->stores()->attach($store->id);

        return response()->json(['message' => 'Store attached to book'], 200);
    }
    public function detachStore(Book $book, Store $store)
    {
        $book->stores()->detach($store->id);

        return response()->json(['message' => 'Store detached from book'], 200);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return $book;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'isbn' => 'required|numeric',
            'value' => 'required|numeric',
        ]);

        $book->update($request->all());

        return $book;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json(null, 204);
    }
    public function getStores(Book $book)
    {
        return $book->stores;
    }
}
