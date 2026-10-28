@extends('layouts.app')

@section('title', 'Edit a Book')

@section('content')
    <h2>Edit a Book</h2>

    <form method="POST" action="{{ route('books.update', $book) }}" style="max-width: 28rem;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" class="form-control">
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" class="form-control">
            @error('author') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" id="year" name="year" value="{{ old('year', $book->year) }}" class="form-control">
            @error('year') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="is_available" class="form-label">Available?</label>
            <select id="is_available" name="is_available" class="form-select">
                <option value="1" @selected(old('is_available', $book->is_available ? '1' : '0') == '1')>Yes</option>
                <option value="0" @selected(old('is_available', $book->is_available ? '1' : '0') == '0')>No</option>
            </select>
            @error('is_available') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select id="genre_id" name="genre_id" class="form-select">
                <option value="">Choose a genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}"
                        @selected(old('genre_id', $book->genre_id) == $genre->id)
                    >{{ $genre->name }}</option>
                @endforeach
            </select>
            @error('genre_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection