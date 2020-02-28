@extends('master')

@section('content')
    <div class="row d-flex justify-content-center my-5">
        <div class="col-md-6 border border-secondary rounded">
            <div class="m-3">
                <h3 class="text-center">Add a Suggestion</h3>
                <form action="{{ route('suggestions.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Author:</label>
                        <input type="text" name="author" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Content:</label>
                        <input type="text" name="content" id="" class="form-control">
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-success mr-2">Add</button>
                        <a href="{{ route('suggestions.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection