@extends('layouts.admin')
@section('main')
<body>
    
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                @auth
                    <div class="d-flex justify-content-between align-items-center">
                    <a href="/brands/create" class="btn btn-primary">Add brand</a>
                        
                    </div>
                @endauth
            </div>
        </div>
        <h2>Brand List</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->description }}</td>
                        <td>
                            <a href="/brands/{{$brand->id}}/edit" class="btn btn-warning">Edit</a>
                            <form action="/brands/{{ $brand->id }}" method="post" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
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