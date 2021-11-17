<section class="product">
  <div class="product-heading">
    <h2 class="heading heading-title">sản phẩm bán chạy</h2>
  </div>
  <div class="product-list">
    <div class="container">
      @foreach($selling_product as $product)
      <div class="product-item">
        <div class="product-image">
          <a href="{{ URL::to('/product_details/'.$product->id)}}" class="product-image__link">
            @foreach($product->images as $image) 
            <img src="{{ asset('Image/'.$image->image_name) }}" alt="" />
            @endforeach
          </a>
          <div class="product-control">
            <a href="#" class="product-btn">Mua ngay</a>
            <a href="#" class="product-btn">Thêm vào giỏ</a>
          </div>
        </div>
        <div class="product-infor">
          <div class="product-name">
            <h3>
              <a href="{{ URL::to('/product_details/'.$product->id)}}" title="">{{$product->product_name}}</a>
            </h3>
          </div>
          <div class="product-price">
            <p class="product-price__new">
              @if($product->discount > 0)
              {{$product->price - ($product->price * $product->discount)/100}}đ
              <span class="product-price__old">{{$product->price}}đ</span>
              @else
              {{$product->price}}đ
              @endif
            </p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

