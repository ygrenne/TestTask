@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Authors</h1>
            <div class="pull-right"><a class="btn btn-info" href="{{ route('author.create') }}" >Add author</a></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $author)
                    <tr>
                        <td> {{ $author->first_name }} </td>
                        <td> {{ $author->last_name }} </td>
                        <td> <a href="{{ route('author.edit', ['id' => $author->id]) }}">Edit</a></td>
                        <td> <a href="{{ route('author.delete', ['id' => $author->id]) }}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection