@foreach($data->take(3) as $brand)
<section class="product">
  <div class="product-heading">
    <h2 class="heading heading-title"><a href="{{URL::to('/brand/'.$brand->id)}}">{{$brand->brand_name}}</a></h2>
    <a href="{{URL::to('/brand/'.$brand->id)}}" class="heading-view">Xem thêm</a>
  </div>
  @foreach($brand->types->take(8) as $type)
  <div class="product-list">
    <div class="container">
      @foreach($type -> products as $product)
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
              {{$product->price}}đ
              @if($product->discount > 0)
              <span class="product-price__old">{{$product->price - ($product->price * $product->discount)/100}}đ</span>
              @endif
            </p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endforeach
</section>
@endforeach
