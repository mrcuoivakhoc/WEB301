<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your CSS styles and other assets here -->
    <style>
        .header {
            background-color: #343a40;
            color: #ffcc00;
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            width: 20%; /* Adjust the width of your logo */
            height: auto;
            margin-left: 10px;
        }
        .phone {
            margin-right: 10px;
        }
        .navbar-custom {
            background-color: #fff;
            color: #000;
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: center;
        }
        .navbar-custom a {
            color: #000;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
        .header-banner {
            background-image: url('{{ asset('storage/images/banner.png') }}');
            background-size: cover;
            background-position: center;
            height: 300px; /* Adjust the height as needed */
        }
        .card-img, .card-img-bottom, .card-img-top {
            align-self: center;
            width: 253px;
            height: 190px;
        }
        @media (min-width: 768px) {
            .col-md-4 {
                
                width: 33.33333333%;
            }
        }
        .footer {
            background-color: #343a40;
            color: #ffcc00;
            padding: 20px;
            text-align: left;
            display: flex;
            align-items: center;
        }
        .slogan {
            font-family: "Leyton";
            src: url("path/to/fonts/leyton-regular.ttf") format("truetype");
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .logo-footer {
            width: 20%; /* Adjust the width of your logo */
            height: auto;
            margin-right: 10px;
        }
        .logo {
    width: 183%;
    height: 200px;
    margin-left: 83%;
}
    </style>
</head>
<body>
    <header class="header">
    <div class="header">
                <div>
                    <span class="phone-number">  Phone Number: +9382222112</span>
                </div>
                <div>
                    <img src="{{ asset('storage/images/00000.png') }}" alt="Logo" class="logo">
                </div>
                <div>
                    <!-- Navigation links or other elements can be added here -->
                </div>
            </div>
    </header>
    <nav class="navbar-custom">
        <a href="/frontend">Home</a>
        <a href="#">The ShowRoom</a>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
            <div class="dropdown-menu">
                @foreach ($categories as $category)
                    <a class="dropdown-item" href="{{ route('frontend.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Brands</a>
            <div class="dropdown-menu">
                @foreach ($brands as $brand)
                    <a class="dropdown-item" href="{{ route('frontend.index', ['brand' => $brand->id]) }}">{{ $brand->name }}</a>
                @endforeach
            </div>
        </div>
        <a href="#">Contact</a>
    </nav>
    <div class="header-banner">
        <!-- Your banner image -->
    </div>
    <main>
        @yield('content')
    </main>
    <footer class="footer">
        <img src="{{ asset('storage/images/00000.png') }}" alt="" class="logo-footer">
        <div>
            <p class="slogan">Enhancing Elegance, Elevating Cleanliness.</p>
            <p>&copy; 2023 Online Store. All rights reserved.</p>
        </div>
    </footer>
    
    <!-- Link to Bootstrap JS (Optional if you're not using any Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
