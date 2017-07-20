@extends('layouts.master')

@section('content')
    <div class="row">
        @include('partials.errors')
        <div class="col-md-12">
            <form action="{{ route('author.create') }}" method="post">
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" min="2" class="form-control" id="first-name" name="first_name" required="">
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" min="2" class="form-control" id="last-name" name="last_name" required="">
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection