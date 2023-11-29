
@if(Session::has("Cart") != null)
<div class="dropdown-cart-products">
        @foreach (Session::get("Cart")->products as $item)
            <div class="product">
                <div class="product-details">
                    <h4 class="product-title">
                        <a href="{{route('product-detail.index')}}">{{$item['productInfo']->name}}</a>
                    </h4>

                    <span class="cart-product-info">
                        <span class="cart-product-qty">{{$item['quanty']}}</span> × {{$item['productInfo']->price}}
                    </span>
                </div>
                <!-- End .product-details -->

                <figure class="product-image-container">
                    <a href="{{route('product-detail.index')}}" class="product-image">
                        <img src="{{asset($item['productInfo']->image)}}" alt="product" width="80" height="80">
                    </a>

                    <a href="#" class="btn-remove" title="Remove Product"><span data-idcart="{{$item['productInfo']->id}}" >×</span></a>
                </figure>
            </div>
        @endforeach
        <input hidden type="number" id="total_item_cart" value="{{Session::get("Cart")->totalQuanty}}">
        <h5>tổng giá: $ {{Session::get("Cart")->totalPrice}}</h5>
<!-- End .product -->
</div>
@endif
<!-- End .dropdown-cart-total -->

