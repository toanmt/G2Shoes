
<section class="product">
  <div class="product-heading">
    <h2 class="heading heading-title"><a href="#">{{$type->type_name}}</a></h2>
    <a href="#" class="heading-view">Xem thêm</a>
  </div>
  <div class="product-list">
    <div class="container">
      <div class="product-item">
        <div class="product-image">
          <a href="#" class="product-image__link">
            <img src="{{ asset('frontend/img/product/product_1.webp') }}" alt="" />
            <img src="{{ asset('frontend/img/product/product_2.webp') }}" alt="" />
          </a>
          <div class="product-control">
            <a href="#" class="product-btn">Mua ngay</a>
            <a href="#" class="product-btn">Thêm vào giỏ</a>
          </div>
        </div>
        <div class="product-infor">
          <div class="product-name">
            <h3>
              <a href="#" title="{{$item->product_name}}">{{$item->product_name}}</a>
            </h3>
          </div>
          <div class="product-price">
            <p class="product-price__new">
              {{$item->price}}
              @if({{$item->discount}} > 0) 
              <span class="product-price__old">{{$item->price - ($item->price * $item->dicount)/100}}</span>
              @endif
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

