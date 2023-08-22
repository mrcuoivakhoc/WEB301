@extends('layouts.admin')
@section('main')
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Product List</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div id="search" class="">
                        <form class="" action="{{ route('search') }}" method="get">
                            <input class="" name="search" placeholder="Keyword">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

   
<div class="container">
    <div class="row mb-3">
        <div class="col">
            @auth
                <div class="d-flex justify-content-between align-items-center">
                    <a href="/products/create" class="btn btn-primary">Add Product</a>
                </div>
            @endauth
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                        @isset($products) <!-- Check if $products is set -->
                        @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" width="150" height="130">
                            </div>
                        </td>
                        <td>{{ $product->description }}</td>
                        <td>${{ $product->price }}</td>
                        <td><a href="/categories/{{ $product->category->id }}">{{ $product->category->name }}</a></td>
                        <td><a href="/brands/{{ $product->brand->id }}">{{ $product->brand->name }}</a></td>
                        <td>
                            <a href="/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/products/{{ $product->id }}" method="post" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
                        </tr>
                            
                        @endforeach
                        
                    @else
                        <tr>
                            <td colspan="8">No products found.</td>
                        </tr>
                    @endisset
                    
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@stop();
