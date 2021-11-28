<section class="product">
  <div class="product-heading">
    <h2 class="heading heading-title">Sản Phẩm Bán Chạy</h2>
  </div>
  <div class="product-list">
    <div class="container">
      @foreach($top_product as $product)
      <div class="product-item">
        <div class="product-image">
          <div class="product-noti">
            <?php
            $product_size = $product->find($product->id)->product_size;
            $size_amount = 0;
            if(!empty($product_size)) {
              $product_sizes = $product_size->first();
              if(!empty($product_sizes)) {
                $size_amount = $product_sizes->amount;
              }
            }
            ?>
            @if($size_amount == 0)
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
          <div class="product-control">
            <form>
              @csrf
              <input 
              type="button" 
              name="quick-view" 
              class="product-btn product-quickview" 
              data-id_product="{{$product -> id}}" 
              id="product-quickview" 
              value="Xem nhanh"
              >
            </form>
            @if(empty($product_sizes))
            <a href="#" class="product-btn add-to-cart">Thêm vào giỏ</a>
            @elseif(isset($product_sizes))
            <a href="#" class="product-btn add-to-cart">Thêm vào giỏ</a>
            <div class="add_to_cart_fields">
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <input type="hidden" name="product_size" value="{{ $product_sizes->size_id }}">
            </div>
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
              <span class="product-price_discount">
                {{number_format($product->price - ($product->price * $product->discount)/100)}}đ
              </span>
              <span class="product-price__old">{{number_format($product->price)}}đ</span>
              @else
              {{number_format($product->price)}}đ
              @endif
            </p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
