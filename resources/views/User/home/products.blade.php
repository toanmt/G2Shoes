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
          <div class="product-noti">
            <?php 
            $size_amount = $product_size->where('product_id',$product->id)->first();
            if(!empty($size_amount)) {
              $size_amount = $size_amount->amount;
            }
            ?>
            @if(empty($size_amount) || $size_amount == 0)
              <span class="product-noti__show product-noti__sold-out">Hết</span>
            @else
              @if($product->discount > 0)
                <span class="product-noti__show product-noti__sale">-{{$product->discount}}%</span>
              @endif
            @endif
          </div>
          <a href="{{ URL::to('/product_details/'.$product->id)}}" class="product-image__link">
            @foreach($product->images as $image) 
            <img src="{{ asset('Image/'.$image->image_name) }}" alt="" />
            @endforeach
          </a>
          <div>
            <form class="product-control">
              @csrf
              <input 
              type="button" 
              name="quick-view" 
              class="product-btn product-quickview" 
              data-id_product="{{$product -> id}}" 
              id="product-quickview" 
              value="Xem nhanh"
              >
              <input 
              type="button" 
              name="add-to-cart" 
              class="product-btn" 
              data-id_product="{{$product -> id}}" 
              value="Thêm vào giỏ"
              >
            </form>
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
@endforeach
