@extends('layouts.master')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('book.create') }}" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required="">
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="number" max="{{ date('Y') }}" class="form-control" id="year" name="year" required="">
                </div>
                @foreach($authors as $author)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="authors[]" value="{{ $author->id }}"> {{ $author->first_name .' '. $author->last_name }}
                        </label>
                    </div>
                @endforeach
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection