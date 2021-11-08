@foreach($brand as $brand)
<div class="brand-products">
  @foreach($brand->types as $type)
  <section class="product">
    <div class="brand-products__heading">
      <h1 class="brand-products__title">{{$brand->brand_name}}</h1>
      <div class="brand-products__sort">
        <div class="dropdown">
          <div class="dropdown-select">
            <span>Sắp xếp: </span>
            <i class="bx bxs-chevron-down"></i>
          </div>
          <div class="dropdown-list">
            <div class="dropdown-item">
              <span class="dropdown-text">Giá: Tăng dần</span>
              <span><i class='bx bx-trending-up'></i></span>
            </div>
            <div class="dropdown-item">
              <span class="dropdown-text">Giá: Giảm dần</span>
              <span><i class='bx bx-trending-down'></i></span>
            </div>
            <div class="dropdown-item">
              <span class="dropdown-text">Tên: A-Z</span>
              <span><i class='bx bx-sort-a-z'></i></span>
            </div>
            <div class="dropdown-item">
              <span class="dropdown-text">Tên: Z-A</span>
              <span><i class='bx bx-sort-z-a'></i></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product-list">
      <div class="container">
        @foreach($type->products as $product)
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
  </section>
  @endforeach
</div>
@endforeach
