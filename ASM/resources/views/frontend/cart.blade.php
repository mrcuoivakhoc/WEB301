@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Shopping Cart</h2>
        <table class="table">
            <!-- ... -->
            <tbody>
                @foreach ($cart as $product_id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            <input type="number" class="quantity" data-id="{{ $product_id }}" value="{{ $item['quantity'] }}" min="1">
                        </td>
                        <div class="d-flex align-items-center">
                        <img src="{{ asset($item['product']->image) }}" alt="{{ $item['name'] }}" class="img-thumbnail" style="max-width: 400px;">
                                <div class="ms-3">
                                    <h6>{{ $item['name'] }}</h6>
                                    <p>Brand: {{ $item['product']->brand->name }}</p>
                                    <p>Category: {{ $item['product']->category->name }}</p>
                                    <p>{{ $item['product']->description }}</p>
                                    <h5>Tags:</h5>
                                @foreach ($item['product']->tags as $tag)
                                    <span class="badge bg-primary">{{ $tag->name }}</span>
                                @endforeach
                                </div>
                        <td>${{ $item['price'] }}</td>
                        <td class="total">${{ $item['total'] }}</td> <!-- Hiển thị tổng tiền cho từng sản phẩm -->
                        <td>
                            <a href="{{ route('removeFromCart', $product_id) }}" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total</strong></td>
                    <td class="total"><strong>${{ array_sum(array_column($cart, 'total')) }}</strong></td> <!-- Tính tổng tiền của tất cả sản phẩm trong giỏ hàng -->
                    <td></td>
                </tr>
            </tfoot>
        </table>
        @if (session('checkout_message'))
        <div class="alert alert-info">{{ session('checkout_message') }}</div>
    @endif
        <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const quantityInputs = document.querySelectorAll(".quantity");
            quantityInputs.forEach(input => {
                input.addEventListener("change", updateCartItem);
            });

            function updateCartItem(event) {
                const product_id = event.target.getAttribute("data-id");
                const quantity = event.target.value;
                const totalTd = document.querySelector(`.total[data-id="${product_id}"]`);
                const price = parseFloat(totalTd.dataset.price);
                const total = price * quantity;
                totalTd.textContent = "$" + total.toFixed(2);
            }
        });
    </script>
@endsection
