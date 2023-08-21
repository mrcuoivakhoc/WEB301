@extends('layouts.admin')
@section('main')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap 3 Jumbotron</title>
  <!-- Include Bootstrap 3 CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h1>Hello, world!</h1>
    <p>This is a simple Bootstrap 3 jumbotron example.</p>
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
  </div>
</div>

<!-- Include Bootstrap 3 JS (Optional) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

@stop();