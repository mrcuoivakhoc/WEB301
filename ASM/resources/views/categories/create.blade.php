@extends('layouts.admin')
@section('main')
<body>
    <div class="container mt-4">
        <h2>Create Category</h2>
        @auth
                    <div class="d-flex justify-content-between align-items-center">
                        
                    </div>
                @endauth
        <form action="/categories" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter category description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <!-- Add Bootstrap JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@stop();