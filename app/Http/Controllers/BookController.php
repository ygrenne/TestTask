<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function getIndex()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('book.index', ['books' => $books]);
    }

    public function getCreate()
    {
        return view('book.create');
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

        return redirect()->route('book.index')->with('info', 'Book '.$request->input('name').' created');
    }

    public function getEdit($id)
    {
        $book = Book::find($id);
        return view('book.edit', ['book' => $book, 'bookId' => $id]);
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

        return redirect()->route('book.index')->with('info', 'Book '.$request->input('name').' edited' );
    }

    public function getDelete($id)
    {
        $book = Book::find($id);

        $book->delete();

        return redirect()->route('book.index')->with('info', 'Book deleted!');
    }

}
