<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function getIndex()
    {
        $authors = Author::orderBy('created_at', 'desc')->get();
        return view('author.index', ['authors' => $authors]);
    }

    public function getCreate()
    {
        return view('author.create');
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2'
        ]);

        $author= new Author([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name')
        ]);

        $author->save();

        return redirect()->route('author.index');
    }

    public function getEdit($id)
    {
        $author= Author::find($id);
        return view('author.edit', ['author' => $author, 'authorId' => $id]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2'
        ]);

        $author= Author::find($request->input('id'));

        $author->first_name = $request->input('first_name');
        $author->last_name = $request->input('last_name');

        $author->save();

        return redirect()->route('author.index');
    }

    public function getDelete($id)
    {
        $author= Author::find($id);

        $author->books()->detach();
        $author->delete();

        return redirect()->route('author.index');
    }
}
