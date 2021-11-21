@foreach($data->take(3) as $brand)
<section class="product">
  <div class="product-heading">
    <h2 class="heading heading-title"><a href="{{URL::to('/brand/'.$brand->id)}}">{{$brand->brand_name}}</a></h2>
    <a href="{{URL::to('/brand/'.$brand->id)}}" class="heading-view">Xem thêm</a>
  </div>
  <div class="product-list">
    <div class="container">
      @foreach($brand->products->take(4) as $product)
      <div class="product-item">
        <div class="product-image">
          <a href="{{ URL::to('/product_details/'.$product->id)}}" class="product-image__link">
            @foreach($product->images as $image) 
            <img src="{{ asset('Image/'.$image->image_name) }}" alt="" />
            @endforeach
          </a>
          <div class="product-control">
            <?php
              $product_size = $product->find($product->id)->product_size;
              if(isset($product_size)) {
                $product_size = $product_size->first();
              }
            ?>
            @if(empty($product_size))
            <a href="#" data-url="" class="product-btn">Xem nhanh</a>
            <a href="#" data-url="" class="product-btn add_to_cart">Thêm vào giỏ</a>
            @endif
            @if(isset($product_size))
            <a href="#" data-url="" class="product-btn buy_now">Xem nhanh</a>
            <a href="#" data-url="{{ route('addToCart', ['id' => $product->id, 'size' => $product_size->size_id ]) }}" class="product-btn add_to_cart">Thêm vào giỏ</a>
            @endif
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

@foreach ($top_product as $item)
{{ $item }}
@endforeach
@endforeach
