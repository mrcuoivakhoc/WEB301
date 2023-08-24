@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="width: 544px;
        height: 650px" >
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title font-weight-bold text-uppercase">{{ $product->name }}</h2>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text font-weight-bold">Price: ${{ $product->price }}</p>
                    
                    <!-- Display Category -->
                    <p class="card-text font-weight-bold">Category: {{ $product->category->name }}</p>
                    
                    <!-- Display Brand -->
                    <p class="card-text font-weight-bold">Brand: {{ $product->brand->name }}</p>
                    <h5>Tags:</h5>
                    <div class="mb-2">
                        @foreach ($product->tags as $tag)
                            <span class="badge bg-primary">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    <button class="btn btn-primary btn-lg">
                    <a href="{{ route('add-to-cart', ['product_id' => $product->id]) }}"class="btn btn-success">Add to cart</a>
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

