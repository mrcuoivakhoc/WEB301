@extends('layouts.admin')
@section('title', 'Tag List')
@section('main')
    <div class="container mt-4">
        <h2>Edit Tag</h2>
        <form action="/tags/{{ $tag->id }}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ $tag->name }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $tag->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
    <!-- Add Bootstrap JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
