@extends('master')

@section('content')
    <div class="text-center py-3">
        <h3>Suggestion Box</h3>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Votes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suggestions as $suggestion)
                    <tr>
                        <td>{{ $suggestion->id }}</td>
                        <td>{{ $suggestion->author }}</td>
                        <td>{{ $suggestion->content }}</td>
                        <td>
                            {{-- {{ $suggestion->votes }} --}}
                            {{-- {{ $suggestions->count() }} --}}
                            <span class="my-auto">{{ $suggestion->votes()->count() }}</span>
                            <div class="d-inline-flex">
                                <a href="{{ route('upvote', ['suggestion_id' => $suggestion->id]) }}" class="btn btn-success mr-1">Upvote</a>
                                <form action="{{ route('downvote', ['suggestion_id' => $suggestion->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="{{ $suggestion->votes()->count() < 1 ? 'button' : 'submit' }}" 
                                    class="btn btn-info {{ $suggestion->votes()->count() < 1 ? 'disabled' : '' }}" value="Downvote">
                                </form>
                            </div>
                        </td>
                        <td>
                            <div class="d-inline-flex">
                                <a href="{{ route('suggestions.edit', ['id' => $suggestion->id]) }}" class="btn btn-warning mr-1">Edit</a>
                                {{-- <a href="{{ route('suggestions.delete', ['id' => $suggestion->id]) }}" class="btn btn-danger">Delete</a> --}}
                                <form action="{{ route('suggestions.delete', ['id' => $suggestion->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('suggestions.add') }}" class="btn btn-outline-primary">Add a suggestion</a>
    </div>
@endsection