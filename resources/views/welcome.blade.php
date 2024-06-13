<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>blackblow</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-hexashop.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->

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
                            <li class="scroll-to-section"><a href="{{ route('cart.index') }}">
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
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>BLACKBLOW SHOP</h4>
                                <span>Thời trang nữ hàng đầu</span>
                                <div class="main-border-button">
                                    <a href="#">Mua ngay</a>
                                </div>
                            </div>
                            <img src="assets/images/left-banner-image.jpg" alt="" height="600px">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Thời trang nữ</h4>
                                            <span>Best Clothes For Women</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Thời trang nữ</h4>
                                                <p>Khách hàng phải thật hạnh phúc thì khách hàng mới là khách hàng của khách hàng.</p>
                                                <div class="main-border-button">
                                                    <a href="#">More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-01.jpg" height="285px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Váy</h4>
                                            <span>Best seller</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Váy</h4>
                                                <p>Khách hàng phải thật hạnh phúc thì khách hàng mới là khách hàng của khách hàng</p>
                                                <div class="main-border-button">
                                                    <a href="#">More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/head-1.png" height="285px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Áo</h4>
                                            <span>Best Trend</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Áo</h4>
                                                <p>Khách hàng phải thật hạnh phúc thì khách hàng mới là khách hàng của khách hàng</p>
                                                <div class="main-border-button">
                                                    <a href="#">More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/head-2.png" height="285px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Quần</h4>
                                            <span>Best Trend</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Quần</h4>
                                                <p>Khách hàng phải thật hạnh phúc thì khách hàng mới là khách hàng của khách hàng</p>
                                                <div class="main-border-button">
                                                    <a href="#">More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/head-3.png" height="285px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Váy mới</h2>
                        {{-- <span>Details to details is what makes Hexashop different from the other themes.</span> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            @foreach($productsCategory1 as $productsCategory_1)
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            @if(Auth::user())
                                                <li><a href="#" class="product-detail-link" data-product-id="{{ $productsCategory_1->id }}"><i class="fa fa-eye"></i></a></li>
                                            @else
                                            <li><a href="{{route('login')}}"><i class="fa fa-eye"></i></a></li>
                                            @endif
                                            <form action="{{ route('cart.add', $productsCategory_1->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" style="background:none; border:none; padding:0;">
                                                    <li><a href="javascript:void(0);"><i class="fa fa-shopping-cart"></i></a></li>
                                                </button>
                                            </form>
                                        </ul>
                                    </div>
                                    <div>
                                        <img src="{{ asset($productsCategory_1->img) }}" alt="{{ $productsCategory_1->name }}" height="350px" width="300px">
                                    </div>
                                </div>
                                <div class="down-content">
                                    @if (strlen($productsCategory_1->name) > 10)
                                        <h4>{{ substr($productsCategory_1->name, 0, 13) }}...</h4>
                                     @else
                                        <h4>{{ $productsCategory_1->name }}</h4>
                                    @endif
                                    {{-- <h4>{{ $productsCategory_1->name }}</h4> --}}
                                    <span class="text-danger">{{ number_format($productsCategory_1->price,0,',','.') }} đ</span>
                                    <ul class="stars">
                                        @for ($i = 0; $i < 5; $i++)
                                            <li class="text-warning"><i class="fa fa-star"></i></li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </section>
    <!-- ***** Men Area Ends ***** -->

    <!-- ***** Women Area Starts ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Quần mới</h2>
                        {{-- <span>Details to details is what makes Hexashop different from the other themes.</span> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                            @foreach($productsCategory2 as $productsCategory_2)
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            @if(Auth::user())
                                                <li><a href="#" class="product-detail-link" data-product-id="{{ $productsCategory_2->id }}"><i class="fa fa-eye"></i></a></li>
                                            @else
                                            <li><a href="{{route('login')}}"><i class="fa fa-eye"></i></a></li>
                                            @endif
                                            <form action="{{ route('cart.add', $productsCategory_2->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" style="background:none; border:none; padding:0;">
                                                    <li><a href="javascript:void(0);"><i class="fa fa-shopping-cart"></i></a></li>
                                                </button>
                                            </form>
                                        </ul>
                                    </div>
                                    <div>
                                        <img src="{{ asset($productsCategory_2->img) }}" alt="{{ $productsCategory_2->name }}" height="350px" width="300px">
                                    </div>
                                </div>
                                <div class="down-content">
                                    @if (strlen($productsCategory_2->name) > 10)
                                        <h4>{{ substr($productsCategory_2->name, 0, 15) }}...</h4>
                                     @else
                                        <h4>{{ $productsCategory_2->name }}</h4>
                                    @endif
                                    <span class="text-danger">{{ number_format($productsCategory_2->price,0,',','.') }} đ</span>
                                    <ul class="stars">
                                        @for ($i = 0; $i < 5; $i++)
                                            <li class="text-warning"><i class="fa fa-star"></i></li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Women Area Ends ***** -->

    <!-- ***** Kids Area Starts ***** -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Áo mới</h2>
                        {{-- <span>Details to details is what makes Hexashop different from the other themes.</span> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                            @foreach($productsCategory3 as $productsCategory_3)
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                        @if(Auth::user())
                                            <li><a href="#" class="product-detail-link" data-product-id="{{ $productsCategory_3->id }}"><i class="fa fa-eye"></i></a></li>
                                        @else
                                            <li><a href="{{route('login')}}"><i class="fa fa-eye"></i></a></li>
                                        @endif
                                            <form action="{{ route('cart.add', $productsCategory_3->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" style="background:none; border:none; padding:0;">
                                                    <li><a href="javascript:void(0);"><i class="fa fa-shopping-cart"></i></a></li>
                                                </button>
                                            </form>
                                        </ul>
                                    </div>
                                    <div>
                                        <img src="{{ asset($productsCategory_3->img) }}" alt="{{ $productsCategory_3->name }}" height="350px" width="300px">
                                    </div>
                                </div>
                                <div class="down-content">
                                    @if (strlen($productsCategory_3->name) > 8)
                                        <h4>{{ substr($productsCategory_3->name, 0, 15) }}...</h4>
                                     @else
                                        <h4>{{ $productsCategory_3->name }}</h4>
                                    @endif
                                    <span class="text-danger">{{ number_format($productsCategory_3->price,0,',','.') }} đ</span>
                                    <ul class="stars">
                                        @for ($i = 0; $i < 5; $i++)
                                            <li class="text-warning"><i class="fa fa-star"></i></li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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


<script>
    $(document).ready(function(){
    $('.product-detail-link').click(function(e){
        e.preventDefault();
        var productId = $(this).data('product-id');

        $.ajax({
            url: '/product/' + productId + '/detail',
            type: 'GET',
            dataType: 'json',
            success: function(response){
                $('#product-detail-modal .modal-title').text('Chi tiết sản phẩm');
                $('#product-detail-modal .modal-body').html(
                    '<div class="row">' +
                        '<div class="col-md-8">' +
                            '<p>Tên sản phẩm: ' + response.name + '</p>' +
                            '<img src="' + response.img + '" class="img-fluid mb-2" alt="' + response.name + '">' +
                        '</div>' +
                        '<div class="col-md-4">' +
                            '<label for="size">Chọn size:</label>' +
                            '<select id="size" class="form-control mb-2">' +
                                '<option value="S">S</option>' +
                                '<option value="M">M</option>' +
                                '<option value="L">L</option>' +
                            '</select>' +
                        '</div>' +
                    '</div>' +
                    '<div class="row">' +
                        '<div class="col-md-12">' +
                            '<p>Mô tả: ' + response.description + '</p>' +
                            '<p style="color:red">Giá: ' + new Intl.NumberFormat('vi-VN').format(response.price)  + 'đ</p>' + // Định dạng số
                        '</div>' +
                    '</div>' +
                    '<div class="row">' + // Thêm lớp justify-content-end vào đây
                        '<div class="col-md-6">'+'</div>'+
                        '<div class="col-md-6">' +
                            '<button class="btn btn-primary add-to-cart-btn" data-dismiss="modal" data-product-id="' + productId + '">Add to Cart</button>' +
                            '<button class="btn btn-danger mr-2" data-dismiss="modal" style="margin-left:10px">Close</button>' +
                        '</div>' +
                    '</div>'
                );
                $('#product-detail-modal').modal('show');
            },
            error: function(xhr, status, error){
                console.error('Yêu cầu AJAX thất bại:', status, error);
            }
        });
    });

    $(document).on('click', '.add-to-cart-btn', function(e){
        e.preventDefault();
        var productId = $(this).data('product-id');
        var size = $('#size').val(); // Lấy giá trị size từ phần tử select

        if (size === '') {
            alert('Vui lòng chọn kích cỡ trước khi thêm vào giỏ hàng.');
            return;
        }

        $.ajax({
            url: '/cart/add/' + productId,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                size: size // Gửi size đi cùng với yêu cầu
            },
            success: function(response){
                console.log('Sản phẩm đã được thêm vào giỏ hàng.');
                // $('#product-detail-modal').modal('hide')
            },
            error: function(xhr, status, error){
                console.error('Yêu cầu AJAX thất bại:', status, error);
            }
        });
    });
});


</script>


    <div class="modal fade" id="product-detail-modal" tabindex="-1" role="dialog" aria-labelledby="productDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="productDetailModalLabel">Product Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <!-- Chi tiết sản phẩm-->
            
            </div>
            <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
            </div>
        </div>
        </div>
    </div>
  
  </body>
</html>
