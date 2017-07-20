<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class BookController extends Controller
{
    public function getIndex()
    {
        $books = Book::orderBy('created_at', 'desc')->get();

        return view('book.index', ['books' => $books]);
    }

    public function getCreate()
    {
        $authors = Author::all();

        return view('book.create', ['authors' => $authors]);
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'year' => 'required|digits_between:1,4'
        ]);

        $book = new Book([
            'name' => $request->input('name'),
            'year' => $request->input('year')
        ]);

        $book->save();
        $book->authors()->attach($request->input('authors') === null ? [] : $request->input('authors'));

        return redirect()->route('book.index')->with('info', 'Book '.$request->input('name').' created');
    }

    public function getEdit($id)
    {
        $book = Book::find($id);
        $authors = Author::all();

        return view('book.edit', ['book' => $book, 'bookId' => $id, 'authors' => $authors]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'year' => 'required|digits_between:1,4'
        ]);

        $book = Book::find($request->input('id'));

        $book->name = $request->input('name');
        $book->year = $request->input('year');

        $book->save();
        $book->authors()->sync($request->input('authors') === null ? [] : $request->input('authors'));

        return redirect()->route('book.index')->with('info', 'Book '.$request->input('name').' edited' );
    }

    public function getDelete($id)
    {
        $book = Book::find($id);

        $book->authors()->detach();
        $book->delete();

        return redirect()->route('book.index')->with('info', 'Book deleted!');
    }

}
