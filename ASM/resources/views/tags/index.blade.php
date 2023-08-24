@extends('layouts.admin')
@section('title', 'Tag List')
@section('main')
    <div class="container mt-4">
        <h2>Tag List</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <div class="d-flex justify-content-between align-items-center">
                    <a href="/tags/create" class="btn btn-primary">Add Tag</a>
                </div>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>
                            <a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a>
                        </td>
                        <td>{{ $tag->description }}</td>
                        <td>
                            <a href="/tags/{{$tag->id}}/edit" class="btn btn-warning">Edit</a>
                            <form action="/tags/{{ $tag->id }}" method="post" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $tags->links() }}
        </div>
    </div>
    <!-- Add Bootstrap JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
