@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>
                Books
                <span class="pull-right"><a class="btn btn-info" href="{{ route('book.create') }}" >Add book</a></span>
            </h1>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(Session::has('info'))
                <div class="row">
                    <div class="col-md-12">
                        <p class="alert alert-info">{{ Session::get('info') }}</p>
                    </div>
                </div>
            @endif
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Authors</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td> {{ $book->name }} </td>
                        <td> {{ $book->year }} </td>
                        <td>
                            @foreach($book->authors as $author)
                                {{ $author->first_name . ' ' . $author->last_name }} <br>
                            @endforeach
                        </td>
                        <td class="action"> <a class="btn btn-primary" href="{{ route('book.edit', ['id' => $book->id]) }}">Edit</a></td>
                        <td class="action"> <a class="btn btn-danger" href="{{ route('book.delete', ['id' => $book->id]) }}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection