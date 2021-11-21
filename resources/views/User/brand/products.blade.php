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
    <div class="product-list">
      <div class="container list-item">
        @foreach($product as $product)
        <div class="product-item zoomIn animated">
          <div class="product-image">
            <a href="{{ URL::to('/product_details/'.$product->id)}}" class="product-image__link">
              @foreach($product->images as $image)
              <img src="{{ asset('Image/'.$image->image_name) }}" alt="" />
              @endforeach
            </a>
            <div class="product-control">
              <a href="#" class="product-btn">Xem nhanh</a>
              <a href="#" class="product-btn">Thêm vào giỏ</a>
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
