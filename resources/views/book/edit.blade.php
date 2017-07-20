@extends('layouts.master')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('book.update') }}" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}" required="">
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="number" max="{{ date('Y') }}" id="year" name="year" value="{{ $book->year }}" required="">
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $bookId }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection