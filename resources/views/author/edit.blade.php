@extends('layouts.master')

@section('content')
    <div class="row">
        @include('partials.errors')
        <div class="col-md-12">
            <form action="{{ route('author.update') }}" method="post">
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" class="form-control" id="first-name" name="first_name" value="{{ $author->first_name }}">
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" class="form-control" id="last-name" name="last_name" value="{{ $author->last_name }}">
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $authorId }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection