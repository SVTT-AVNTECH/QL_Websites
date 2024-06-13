
<div class="container mt-5">
    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-4 mb-4">
                <div class="item">
                    <div class="thumb">
                        <div class="hover-content">
                            <ul>
                                <li><a href="#" class="product-detail-link3" data-product-id="{{ $product->id }}"><i class="fa fa-eye"></i></a></li>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" style="background:none; border:none; padding:0;">
                                        <li><a href="javascript:void(0);"><i class="fa fa-shopping-cart"></i></a></li>
                                    </button>
                                </form>
                            </ul>
                        </div>
                        <img src="{{ asset($product->img) }}" alt="{{ $product->name }}" class="" height="350px" width="300px">
                    </div>
                    <div class="down-content">
                        @if (strlen($product->name) > 10)
                            <h4>{{ substr($product->name, 0, 15) }}...</h4>
                        @else
                            <h4>{{ $product->name }}</h4>
                        @endif
                        <span>{{ number_format($product->price,0,',','.') }}đ</span>
                        <ul class="stars">
                            @for ($i = 0; $i < 5; $i++)
                                <li class="text-warning"><i class="fa fa-star"></i></li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function(){
    $('.product-detail-link3').click(function(e){
        e.preventDefault();
        var productId = $(this).data('product-id');

        $.ajax({
            url: '/product/' + productId + '/detail',
            type: 'GET',
            dataType: 'json',
            success: function(response){
                $('#product-detail-modal3 .modal-title').text('Chi tiết sản phẩm');
                $('#product-detail-modal3 .modal-body').html(
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
                $('#product-detail-modal3').modal('show');
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
                // $('#product-detail-modal3').modal('hide')
            },
            error: function(xhr, status, error){
                console.error('Yêu cầu AJAX thất bại:', status, error);
            }
        });
    });
});


</script>


    <div class="modal fade" id="product-detail-modal3" tabindex="-1" role="dialog" aria-labelledby="productDetailModalLabel" aria-hidden="true">
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
  