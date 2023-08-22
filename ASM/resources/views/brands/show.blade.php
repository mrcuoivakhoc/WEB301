@extends('layouts.admin')
@section('main')
<body>
    <div class="container mt-4">
        <div class="mb-3">
            <label for="brandId" class="form-label">ID: {{$brand->id }}</label>
        </div>
        <div class="mb-3">
            <label for="brandName" class="form-label">Name: {{  $brand->name }}</label>
        </div>
        <div class="mb-3">
            <label for="brandDescription" class="form-label">Description: {{  $brand->description }}</label>
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
                <!-- Loop through products associated with the brand -->
                @foreach($brand->products as $product)
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
</body>
</html>
@stop();