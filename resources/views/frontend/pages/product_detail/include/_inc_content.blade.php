@if (!empty($product->pro_description))
    <div class="reviews content_text" style="float: left; width: 100%;">
        <h4 class="reviews-title"><b class="product_details_title">Thông tin khuyến mại</b></h4>
        <div class="product_details_content">
            {!! $product->pro_description !!}
        </div>

    </div>
@endif
<br>

@if(!empty($product->pro_content))

    <div class="reviews content_text" style="float: left; width: 100%;">
    <style>
    .reviews {
    display: flex;
    flex-direction: column;
    width: 100%;
}

.product_details_content {
    display: flex;
    flex-wrap: wrap;
}

.product_details_content img {
    max-width: 100%;
    height: auto;
    display: block;
}

</style>
        <h4 class="reviews-title"><b class="product_details_title">Chi tiết sản phẩm</b></h4>
        <div class="product_details_content" >
            {!! $product->pro_content !!}   
        </div>

    </div>
@endif

@section('script')
    <script>
		var ROUTE_COMMENT = '{{ route('ajax_post.comment') }}';
		var CSS = "{{ asset('css/product_detail.min.css') }}";
		var URL_CAPTCHA = '{{ route('ajax_post.captcha.resume') }}';

    </script>
    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/product_detail.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            $('.muangay').click(function (event) {
                event.preventDefault();

                var link = $(this).attr('href');
                var size = $('#product-size').val();
                var color = $('#product-color').val();
                var gender = $('input[name=gender]:checked').val() !== undefined ? $('input[name=gender]:checked').val() : '';

                $.ajax({
                    url: link,
                    type: 'GET',
                    data : {
                        size : size,
                        gender : gender,
                        color : color,
                    }
                }).done(function (result) {
                    window.location = window.location.href;
                })
            })
            $('.btn-cart').ready(function(event) {
    // Hàm kiểm tra kích thước cửa sổ và ẩn/hiển thị div
    function checkWindowSize() {
        if ($(window).width() < 999) {
            $('.btn-cart').hide();  // Ẩn div khi màn hình nhỏ hơn 768px
            $('.comments').hide(); 
            $('.dashboards').hide(); 
            $('.product-five').hide(); 
            $('.reviews-title').hide(); 
            $('.reviews_list').hide(); 
            $('.pricesss').hide(); 
            $('.commonTop').hide();
            $('.mobile').hide(); 
            $('.breadcrumb').hide(); 
         
        } else {
            $('.btn-cart').show();  // Hiển thị div khi màn hình lớn hơn hoặc bằng 768px
            $('.comments').show();  
            $('.dashboards').show(); 
            $('.product-five').show(); 
            $('.reviews-title').show(); 
            $('.reviews_list').show();
            $('.pricesss').show();
            $('.commonTop').show(); 
            $('.mobile').show();
            $('.breadcrumb').show();  

        }
    }

    // Gọi hàm kiểm tra khi tải trang
    checkWindowSize();

    // Gọi hàm kiểm tra khi thay đổi kích thước cửa sổ
    $(window).resize(function() {
        checkWindowSize();
    });
});

        });
        
    </script>
@stop

