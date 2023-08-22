@extends('layouts.admin')
@section('main')
<body>
    <div class="container mt-4">
        <h2>Edit Brand</h2>
        @auth
                    <div class="d-flex justify-content-between align-items-center">
                    <a href="/brands/create" class="btn btn-primary">Add brand</a>
                       
                    </div>
                @endauth
        <form action="/brands/{{ $brand->id }}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{$brand->name}}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $brand->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
    <!-- Add Bootstrap JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@stop();