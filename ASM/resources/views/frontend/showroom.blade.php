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
            background-image: url('{{ asset('storage/images/showroom.png') }}');
            background-size: cover;
            background-position: center;
            height: 500px; /* Adjust the height as needed */
        }
        .card-img, .card-img-bottom, .card-img-top {
            align-self: center;
            width: 253px;
            height: 190px;
        }
        @media (min-width: 768px) {
            .col-md-4 mb-4 {
                
                width: 33.33333333%;
            }
        }
        .footer {
            background-image: url(http://127.0.0.1:8000/storage/images/banner123.png);
    background-size: cover;
    background-position: center;
    height: 360px;
            background-color: #343a40;
            color: #f7e7b8;
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
            color: #f7e7b8;
        }
        .header {
    background-image: url(http://127.0.0.1:8000/storage/images/banner123.png);
    background-size: cover;
    background-position: center;
    height: 360px;
}

.banner img {
    width: 100%;
    height: auto;
}

.banner-text {
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #f7e7b8;
}

.banner-text h1 {
    font-size: 70px;
    margin-bottom: 10px;
}

.banner-text p {
    font-size: 18px;
}




.vision {
    margin: 20px auto;
    max-width: 800px;
    text-align: center;
}

.vision-title {
    font-family: "stay_classy_duo_serifregular", sans-serif;
    font-size: 60px;
    letter-spacing: 0.35rem;
    font-weight: 500;
}

.vision-description {
    font-size: 18px;
    line-height: 1.6;
}

img {
    height: 325px;
    width: 415px;
    padding-left: 10%;
}
img.VR {
    width: 100%;
    height: 100%;
    padding-left: 0px;
}
.footertext {
    margin-left: auto;
}
.container-3 {
    padding-top: inherit;
    padding-left: 39%;
}

    </style>
</head>
<body>
    
    <div class="header">
                
            </div>
    <nav class="navbar-custom">
        <a href="/frontend">Home</a>
        <a href="/theshowroom">The ShowRoom</a>
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
    <div class="banner-text">
            <h1>VikingLuxBath</h1>
            <p>Enhancing Elegance, Elevating Cleanliness</p>
        </div>
    </div>
    <main>
    <div class="vision">
        <h2 class="vision-title">YOUR VISION REALISED</h2>
        <p class="vision-description">
        Welcome to VikingLuxBath - Your Ultimate Destination for Luxury Bathroom Fixtures!
         We are delighted to present to you a world of sophistication and elegance,
          where each bathing experience is elevated to perfection.
        </p>
    </div>
    <div class="image-gallery">
        <div class="row">
            <div class="col-md-4 mb-4">
                <a href="{{ asset('storage/images/showroom4.jpeg') }}" target="_blank">
                    <img src="{{ asset('storage/images/showroom4.jpeg') }}" alt="Image 1">
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="{{ asset('storage/images/showroom3.jpg') }}" target="_blank">
                    <img src="{{ asset('storage/images/showroom3.jpg') }}" alt="Image 2">
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="{{ asset('storage/images/showroom6.jpg') }}" target="_blank">
                    <img src="{{ asset('storage/images/showroom6.jpg') }}" alt="Image 3">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <a href="{{ asset('storage/images/showroom5.jpg') }}" target="_blank">
                    <img src="{{ asset('storage/images/showroom5.jpg') }}" alt="Image 4">
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="{{ asset('storage/images/showroom6.png') }}" target="_blank">
                    <img src="{{ asset('storage/images/showroom6.png') }}" alt="Image 5">
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="{{ asset('storage/images/showroom7.png') }}" target="_blank">
                    <img src="{{ asset('storage/images/showroom7.png') }}" alt="Image 6">
                </a>
            </div>
        </div>
    </div>
    <div>
     <img src="{{ asset('storage/images/VA.png') }}" alt="VR" class="VR">
     </div>
</main>
<footer class="footer">
    <div class="container-3">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <h5>SHOWROOM</h5>
                <p>192-194 Fenwick Road, Giffnock, G46 6UE</p>
                <p>T: 0123 456 9999</p>
            </div>
            <div class="col-sm-6 col-md-3">
                <h5>BATHROOM INSPIRATION</h5>
                <ul>
                    <li>Home Spa Experience</li>
                    <li>Decadent Showers & Baths</li>
                    <li>Luxury Sanitary Ware</li>
                    <li>Stylish Furniture</li>
                    <li>Designer Radiators</li>
                    <li>The VR Experience</li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3">
                <h5>ABOUT US</h5>
                <ul>
                    <li>The Showroom</li>
                    <li>Exclusive Brands</li>
                    <li>Our Story</li>
                    <li>Client Experience</li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
    
    <!-- Link to Bootstrap JS (Optional if you're not using any Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
