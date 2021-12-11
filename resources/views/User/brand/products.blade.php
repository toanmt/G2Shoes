<div class="brand-products">
  <section class="product">
    <div class="brand-products__heading">
      <h1 class="brand-products__title">{{$brand->brand_name}}</h1>
      <div class="brand-products__sort">
        <div class="dropdown">
          <div class="dropdown-select">
            <span>{{$sort_name}}</span>
            <i class="bx bxs-chevron-down"></i>
          </div>
          <form>
            @csrf
            <div class="dropdown-list">
              <div class="dropdown-item" data-value="{{Request::url()}}?sort_by=gia_tang">
                <span class="dropdown-text">Giá: Tăng dần</span>
                <span><i class='bx bx-trending-up'></i></span>
              </div>
              <div class="dropdown-item" data-value="{{Request::url()}}?sort_by=gia_giam">
                <span class="dropdown-text">Giá: Giảm dần</span>
                <span><i class='bx bx-trending-down'></i></span>
              </div>
              <div class="dropdown-item" data-value="{{Request::url()}}?sort_by=kytu_az">
                <span class="dropdown-text">Tên: A-Z</span>
                <span><i class='bx bx-sort-a-z'></i></span>
              </div>
              <div class="dropdown-item" data-value="{{Request::url()}}?sort_by=kytu_za">
                <span class="dropdown-text">Tên: Z-A</span>
                <span><i class='bx bx-sort-z-a'></i></span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    @csrf
    <div class="product-list">
      <div class="container list-item">
        @foreach($product as $product)
        <div class="product-item zoomIn animated">
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
              @if($size_amount != 0) 
              <img src="{{ asset('Image/'.$image->image_name) }}" alt="" />
              @else
              <img src="{{ asset('Image/'.$image->image_name) }}" alt="" class="sold-out" />
              @endif
              @endforeach
            </a>
            <div class="product-control">
              <form>
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
              @endif
              @if(isset($product_sizes))
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
                <a href="{{ URL::to('/product_details/'.$product->id)}}" title="{{$product->product_name}}">{{$product->product_name}}</a>
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
  <script src="{{ asset('frontend/js/filter.js') }}"></script>
</div>
