@foreach($type as $product_type)
<section class="product">
  <div class="product-heading">
    <h2 class="heading heading-title"><a href="#">{{$product_type->type_name}}</a></h2>
    <a href="#" class="heading-view">Xem thêm</a>
  </div>
  <div class="product-list">
    <div class="container">
      @foreach($product_type -> products_type as $product)
      <div class="product-item">
        <div class="product-image">
          <a href="#" class="product-image__link">
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
              <a href="#" title="">{{$product->product_name}}</a>
            </h3>
          </div>
          <div class="product-price">
            <p class="product-price__new">
              {{$product->price}}
              @if($product->discount > 0)
              <span class="product-price__old">{{$product->price - ($product->price * $product->discount)/100}}</span>
              @endif
            </p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
</section>
@endforeach
