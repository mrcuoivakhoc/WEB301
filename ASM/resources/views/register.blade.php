<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Add Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-image: url(http://127.0.0.1:8000/storage/images/login.png);
            background-size: cover;
            background-position: inherit;
        }
        h2.mb-3 {
            color: white;
        }
        label.form-label {
            color: white;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Adjust the opacity here */
            backdrop-filter: blur(5px); /* Apply the blur effect */
        }

        .container {
            z-index: 1; /* Place the container above the overlay */
        }
        .col-md-6 {
            flex: 0 0 auto;
            width: 50%;
            filter: opacity(0.7);
        }
        h1 {
            color: #fceeb3;
            padding-left: 26%;
            font-size: 60px;
        }
        p {
            color: #fceeb3;
            padding-left: 28%;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-3">Register</h2>
                <form action="/register" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a href="{{ route('login') }}" class="btn btn-secondary">login</a>

                </form>
                <div class="banner-text">
            <h1>VikingLuxBath</h1>
            <p>Enhancing Elegance, Elevating Cleanliness</p>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
