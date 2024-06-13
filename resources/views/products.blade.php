<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Product</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/lightbox.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> --}}
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
<style>
    .full-width-container {
    width: 100%;
    max-width: 100%;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.full-width-image {
    width: 100%;
    height: auto;
    max-width: 1000px; /* Optional: set a max-width if needed */
}

 svg{
    height: 50px;
}

</style>
    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{url('/')}}" class="logo">
                            <img src="/img/logo.png" width="100px" height="80px">
                        </a>

                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#men">Váy</a></li>
                            <li class="scroll-to-section"><a href="#women">Quần</a></li>
                            <li class="scroll-to-section"><a href="#kids">Áo</a></li>
                            <li class="scroll-to-section"><a href="{{url('products')}}">Products</a></li>

                            <li class="submenu">
                                <a href="javascript:;">Hỗ trợ</a>
                                <ul>
                                    <li><a href="{{url('about')}}">About Us</a></li>
                                    <li><a href="{{url('contact')}}">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="{{ route('cart.index') }}" id="cart-container">
                                Giỏ hàng
                                 @if(session('cart'))
                            <span class="badge badge-pill badge-danger ml-1">
                                {{ $cartCount }}
                            </span>
                        @endif
                            </a></li>
                            <li class="scroll-to-section">
                                @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/editor') }}">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}">Log in</a>
                                    </li>
                                    <li class="scroll-to-section">
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">Register</a>
                                        @endif
                                    @endauth
                            @endif
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
 
    <div class="container-fluid full-width-container">
        <div class="row">
            <div class="col-lg-12">
                <img src="assets/images/bannerrrr.jpg" alt="Banner" class="full-width-image">
            </div>
        </div>
    </div>


    <!-- ***** Products Area Starts ***** -->
    
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Products</h2>
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control" id="search-input" placeholder="Tìm kiếm...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="search-button">Tìm kiếm</button>
                            </div>
                        </div>
                
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sắp xếp
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item sort-by" data-sort="asc" href="#">Tăng dần</a>
                                <a class="dropdown-item sort-by" data-sort="desc" href="#">Giảm dần</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            </div>
        </div>
        
        <div id="paginate-data">
            @include('paginate')
        </div>
        <div id="sort">
            @include('sort')
        </div>
        <div id="search-results">
            @include('search')
        </div>
    </section>

        <script>
            $(document).ready(function() {
                $('#sort').hide();
                $('#search-results').hide();
                $('.dropdown-item.sort-by').on('click', function(e) {
                    e.preventDefault();
                    var sort = $(this).data('sort');
        
                    $.ajax({
                        url: '{{ route('products.sort') }}',
                        type: 'GET',
                        data: { sort: sort },
                        success: function(response) {
                            $('#paginate-data').hide();
                            $('#search-results').hide();
                            $('#sort').html(response).show();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            // Handle errors if any
                        }
                    });
                });
        
                $('#search-button').on('click', function(e) {
                    e.preventDefault();
                    var query = $('#search-input').val().trim();
        
                    $.ajax({
                        url: '{{ route('products.search') }}',
                        type: 'GET',
                        data: { query: query },
                        success: function(response) {
                            $('#paginate-data').hide();
                            $('#sort').hide();
                            $('#search-results').html(response).show();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            // Handle errors if any
                        }
                    });
                });
            });
        </script>
        
        

    <script>
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                getProductData(url);
            });
    
            function getProductData(url) {
                $.ajax({
                    url: url,
                    success: function(data) {
                        $('#product-data').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Ajax request failed:', status, error);
                    }
                });
            }
        });
    </script>
        
        <script>
            $(document).ready(function() {
                $('.sort-by').click(function(e) {
                    e.preventDefault();
                    var sortType = $(this).data('sort');
                    var sortText = $(this).text();
                    $('#dropdownMenuButton').text(sortText);
                    console.log('Selected sort type:', sortType);
                });
            });
        </script>
        
    
        
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="/img/logo.png" height="80px" width="100px">
                        </div>
                        <ul>
                            <li><a href="#">VN</a></li>
                            <li><a href="#">blackblow@company.com</a></li>
                            <li><a href="#">010-020-0340</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Cửa hàng</h4>
                    <ul>
                        <li><a href="#">Váy</a></li>
                        <li><a href="#">Quần</a></li>
                        <li><a href="#">Áo</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Hỗ trợ</h4>
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2024

                        <br>Design Nguyễn Gia Bảo</p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>

  </body>

</html>
