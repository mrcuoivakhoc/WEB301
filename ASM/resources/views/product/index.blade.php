    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product List</title>
        <!-- Add Bootstrap CSS Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Add Bootstrap JS Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
