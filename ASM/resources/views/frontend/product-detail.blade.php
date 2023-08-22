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
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-primary btn-lg">Add to Cart</button>
                        <div class="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $product->rating)
                                    <span class="fa fa-star checked"></span>
                                @else
                                    <span class="fa fa-star"></span>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')

@endsection
