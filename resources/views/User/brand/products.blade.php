<div class="brand-products">
  <section class="product">
    <div class="brand-products__heading">
      <h1 class="brand-products__title">{{$brand->brand_name}}</h1>
      <div class="brand-products__sort">
        <div class="dropdown">
          <div class="dropdown-select">
            <span>Sắp xếp: </span>
            <i class="bx bxs-chevron-down"></i>
          </div>
          <form>
            @csrf
            <div class="dropdown-list" id="sort">
              <div class="dropdown-item">
                <span class="dropdown-text" data-value="{{Request::url()}}?sort_by=gia_tang">Giá: Tăng dần</span>
                <span><i class='bx bx-trending-up'></i></span>
              </div>
              <div class="dropdown-item">
                <span class="dropdown-text" data-value="{{Request::url()}}?sort_by=gia_giam">Giá: Giảm dần</span>
                <span><i class='bx bx-trending-down'></i></span>
              </div>
              <div class="dropdown-item">
                <span class="dropdown-text" data-value="{{Request::url()}}?sort_by=kytu_az">Tên: A-Z</span>
                <span><i class='bx bx-sort-a-z'></i></span>
              </div>
              <div class="dropdown-item">
                <span class="dropdown-text" data-value="{{Request::url()}}?sort_by=kytu_za">Tên: Z-A</span>
                <span><i class='bx bx-sort-z-a'></i></span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="product-list">
      <div class="container">
        @foreach($product as $product)
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
                <a href="{{ URL::to('/product_details/'.$product->id)}}" title="{{$product->product_name}}">{{$product->product_name}}</a>
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
  </section>
</div>
