@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
                <form class="d-flex align-items-center" action="{{ route('frontend.index') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Keyword" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </nav>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                    <a href="{{ route('frontend.product-detail', ['id' => $product->id]) }}">
                    <img src="{{ asset($product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}" style="width: 100%;">
                </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">${{ $product->price }}</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $products->links() }} <!-- Pagination links -->
        </div>
    </div>
</div>
@endsection
