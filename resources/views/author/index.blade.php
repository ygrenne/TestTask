@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>
                Authors
                <span class="pull-right"><a class="btn btn-info" href="{{ route('author.create') }}" >Add author</a></span>
            </h1>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
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
                        <td class="action"> <a class="btn btn-primary" href="{{ route('author.edit', ['id' => $author->id]) }}">Edit</a></td>
                        <td class="action"> <a class="btn btn-danger" href="{{ route('author.delete', ['id' => $author->id]) }}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection