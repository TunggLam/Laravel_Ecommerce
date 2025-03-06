<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::orderBy("id", 'ASC')->get();

        if(isset($request->keyword) && $request->keyword != ''){
            $books = Book::where('name', 'like', '%' . $request->keyword .'%')->get();
        }

        return view("admin.book.index", ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'quantity' => 'required',
            'price' => 'required',
            'author' => 'required|max:255',
            'description' => 'required',
        ]);

        $book = new Book;
        $book->fill($request->all());

        $book->save();

        return redirect('admin/book');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.book.edit', compact(['book']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'quantity' => 'required',
            'price' => 'required',
            'author' => 'required|max:255',
            'description' => 'required',
        ]);


        $book = Book::findOrFail($id);

        $book->fill($request->all());

        $book->save();

        return redirect('admin/book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $book = Book::findOrFail($request->id);
        $book->delete();

        return redirect('admin/book');
    }


    public function search(Request $request)
    {
        return view('admin.book.search_results');
    }


}
