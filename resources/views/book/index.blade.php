@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Books</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Year</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td> {{ $book->name }} </td>
                        <td> {{ $book->year }} </td>
                        <td> <a href="{{ route('book.edit', ['id' => $book->id]) }}">Edit</a></td>
                        <td> <a href="{{ route('book.delete', ['id' => $book->id]) }}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection