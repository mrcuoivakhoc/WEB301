@extends('layouts.admin')
@section('main')
<body>
    <div class="container mt-4">
    @auth
                    <div class="d-flex justify-content-between align-items-center">
                    <a href="/categories/create" class="btn btn-primary">Add categories</a>
                        
                    </div>
                @endauth
        <h2>Category List</h2>
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
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="/categories/{{$category->id}}/edit" class="btn btn-warning">Edit</a>
                            <form action="/categories/{{ $category->id }}" method="post" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
                {{ $categories->links() }}
            </div>
    </div>
    <!-- Add Bootstrap JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@stop();