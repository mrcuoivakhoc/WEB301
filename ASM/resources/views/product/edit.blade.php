@extends('layouts.admin')
@section('main')
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1>Edit Product</h1>
            </div>
        </div>
        <div class="container">
        <div class="row mb-3">
            <div class="col">
                @auth
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/products/create" class="btn btn-primary">Add Product</a>
                        <div>
                            <span class="me-3">Welcome, {{ Auth::user()->name }}</span>
                            <a href="/logout" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <form action="/products/{{ $product->id }}" method="post"enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" width="150" height="130">
                        @else
                            <p>No image available</p>
                        @endif
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $product->description }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="category" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <select class="form-select" name="brand" id="brand">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Tags</label>
                        @foreach($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}" {{ in_array($tag->id, $productTags) ? 'checked' : '' }}>
                                <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@stop();
