<div class="brand-products">
  <section class="product">
    <div class="brand-products__heading">
      <h1 class="brand-products__title">sales</h1>
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
    <div class="product-list">
      <div class="container list-item">
        @foreach($product as $product)
        <div class="product-item zoomIn animated">
          <div class="product-image">
            <div class="product-noti">
              <?php
              if(!empty($product_size)) {
                $size_amount = $product_size->where('product_id',$product->id)->first();
                if(!empty($size_amount)) {
                  $size_amount = $size_amount->amount;
                }
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
              <?php
              $product_size = $product->find($product->id)->product_size;
              if(isset($product_size)) {
                $product_size = $product_size->first();
              }
              ?>
              @if(empty($product_size))
              <a href="#" data-url="" class="product-btn add_to_cart">Thêm vào giỏ</a>
              @endif
              @if(isset($product_size))
              <a href="#" data-url="{{ route('addToCart', ['id' => $product->id, 'size' => $product_size->size_id, 'quantity' => 1 ]) }}" class="product-btn add_to_cart">Thêm vào giỏ</a>
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
  <script type="text/javascript">
    $(document).ready(function(){
      //handle sort product
      $('.dropdown-item').on('click',function(e){
        var url = $(this).data('value');
        window.location = url;
      });
    });
  </script>
  <script src="{{ asset('frontend/js/filter.js') }}"></script>
</div>
