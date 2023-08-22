@extends('layouts.admin')
@section('main')
<body>
    <div class="container mt-4">
        <h2>Category Details</h2>
        <div class="mb-3">
            <label for="categoryId" class="form-label">ID: {{ $category->id }}</label>
        </div>
        <div class="mb-3">
            <label for="categoryName" class="form-label">Name: {{ $category->name }}</label>
        </div>
        <div class="mb-3">
            <label for="categoryDescription" class="form-label">Description: {{ $category->description }}</label>
        </div>
        <h3>Products</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through products associated with the category -->
                @foreach($category->products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Add Bootstrap JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@stop();