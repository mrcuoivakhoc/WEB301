@extends('layouts.admin')
@section('title', 'Tag List')
@section('main')
    <div class="container mt-4">
        <div class="mb-3">
            <label for="tagId" class="form-label">ID: {{ $tag->id }}</label>
        </div>
        <div class="mb-3">
            <label for="tagName" class="form-label">Name: {{  $tag->name }}</label>
        </div>
        <div class="mb-3">
            <label for="tagDescription" class="form-label">Description: {{  $tag->description }}</label>
        </div>
        <h3>Products</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through products associated with the tag -->
                @foreach($tag->products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Add Bootstrap JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
