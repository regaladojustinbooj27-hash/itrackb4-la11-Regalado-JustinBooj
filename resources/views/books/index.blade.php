@extends('layouts.app')

@section('title', 'All Books')

@section('content')

    <a href="{{ route('books.create') }}" class="btn btn-success btn-sm">+ Add a Book</a>
    <br><br>

    <p>
        Showing —
        Genre: <strong>{{ $selected->name ?? 'All' }}</strong>
    </p>

    <p>
        <strong>Genre:</strong>
        @foreach ($genres as $genre)
            <a href="{{ route('books.index', ['genre_id' => $genre->id]) }}">{{ $genre->name }}</a>
            &nbsp;
        @endforeach
    </p>

    <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">Clear filters</a>
    <br><br>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('books.show', $book['id']) }}">{{ $book['title'] }}</a>
                    </td>
                    <td>{{ $book['author'] }}</td>
                    <td>
                        {{ $book['year'] }}
                        @if ($book['year'] < 1900)
                            <span class="badge bg-secondary">Classic</span>
                        @endif
                    </td>
                    <td>{{ $book->genre->name }}</td>
                    <td>
    <a href="{{ route('books.edit', $book) }}" class="btn btn-primary btn-sm">Edit</a>
    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
          onsubmit="return confirm('Delete this record?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">There are no books to show right now — check back later.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection