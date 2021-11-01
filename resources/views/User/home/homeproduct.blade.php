@extends('User.layout.main')
@section('content')

<section class="product">
  <div class="product-heading">
    <h2 class="heading heading-title"><a href="#">sản phẩm mới</a></h2>
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
              <a href="#" title="[DA9325-100] NIKE AIR MAX 97 PINK CREAM"
              >[DA9325-100] NIKE AIR MAX 97 PINK CREAM</a
              >
            </h3>
          </div>
          <div class="product-price">
            <p class="product-price__new">2,890,000đ</p>
          </div>
        </div>
      </div>
      <div class="product-item">
        <div class="product-image">
          <div class="product-noti">
            <span class="product-noti__show product-noti__sold-out"
            >Hết</span
            >
          </div>
          <a href="#" class="product-image__link">
            <img src="{{ asset('frontend/img/product/product_3.webp') }}" alt="" />
            <img src="{{ asset('frontend/img/product/product_4.webp') }}" alt="" />
          </a>
          <div class="product-control">
            <a href="#" class="product-btn">Mua ngay</a>
            <a href="#" class="product-btn">Thêm vào giỏ</a>
          </div>
        </div>
        <div class="product-infor">
          <div class="product-name">
            <h3>
              <a
              href="#"
              title="[CI7538-100] NIKE AIRMAX 97G WHITE COOL GREY"
              >[CI7538-100] NIKE AIRMAX 97G WHITE COOL GREY</a
              >
            </h3>
          </div>
          <div class="product-price">
            <p class="product-price__new">2,700,000₫</p>
          </div>
        </div>
      </div>
      <div class="product-item">
        <div class="product-image">
          <div class="product-noti">
            <span class="product-noti__show product-noti__sale"
            >-34%</span
            >
          </div>
          <a href="#" class="product-image__link">
            <img src="{{ asset('frontend/img/product/product_5.webp') }}" alt="" />
            <img src="{{ asset('frontend/img/product/product_6.webp') }}" alt="" />
          </a>
          <div class="product-control">
            <a href="#" class="product-btn">Mua ngay</a>
            <a href="#" class="product-btn">Thêm vào giỏ</a>
          </div>
        </div>
        <div class="product-infor">
          <div class="product-name">
            <h3>
              <a href="#" title="PUMA MULE">PUMA MULE</a>
            </h3>
          </div>
          <div class="product-price">
            <p class="product-price__new discount">
              1,190,000₫
              <span class="product-price__old">1,790,000₫</span>
            </p>
          </div>
        </div>
      </div>
      <div class="product-item">
        <div class="product-image">
          <div class="product-noti">
            <span class="product-noti__show product-noti__sale"
            >-20%</span
            >
          </div>
          <a href="#" class="product-image__link">
            <img src="{{ asset('frontend/img/product/product_7.webp') }}" alt="" />
            <img src="{{ asset('frontend/img/product/product_8.webp') }}" alt="" />
          </a>
          <div class="product-control">
            <a href="#" class="product-btn">Mua ngay</a>
            <a href="#" class="product-btn">Thêm vào giỏ</a>
          </div>
        </div>
        <div class="product-infor">
          <div class="product-name">
            <h3>
              <a href="#" title="[150206C] CONVERSES X CDG LOW BLACK"
              >[150206C] CONVERSES X CDG LOW BLACK</a
              >
            </h3>
          </div>
          <div class="product-price">
            <p class="product-price__new discount">
              3,190,000₫
              <span class="product-price__old">3,990,000₫</span>
            </p>
          </div>
        </div>
      </div>
      <div class="product-item">
        <div class="product-image">
          <div class="product-noti">
            <span class="product-noti__show product-noti__sold-out"
            >Hết</span
            >
          </div>
          <a href="#" class="product-image__link">
            <img src="{{ asset('frontend/img/product/product_11.webp') }}" alt="" />
            <img src="{{ asset('frontend/img/product/product_12.webp') }}" alt="" />
          </a>
          <div class="product-control">
            <a href="#" class="product-btn">Mua ngay</a>
            <a href="#" class="product-btn">Thêm vào giỏ</a>
          </div>
        </div>
        <div class="product-infor">
          <div class="product-name">
            <h3>
              <a
              href="#"
              title="[DD1649-001] JORDAN 1 MID CARBON FIBER ALL-STAR"
              >[DD1649-001] JORDAN 1 MID CARBON FIBER ALL-STAR</a
              >
            </h3>
          </div>
          <div class="product-price">
            <p class="product-price__new">4,990,000₫</p>
          </div>
        </div>
      </div>
      <div class="product-item">
        <div class="product-image">
          <div class="product-noti">
            <span class="product-noti__show product-noti__sold-out"
            >Hết</span
            >
          </div>
          <a href="#" class="product-image__link">
            <img src="{{ asset('frontend/img/product/product_13.webp') }}" alt="" />
            <img src="{{ asset('frontend/img/product/product_14.webp') }}" alt="" />
          </a>
          <div class="product-control">
            <a href="#" class="product-btn">Mua ngay</a>
            <a href="#" class="product-btn">Thêm vào giỏ</a>
          </div>
        </div>
        <div class="product-infor">
          <div class="product-name">
            <h3>
              <a href="#" title="[DD1650-001] JORDAN 1 LOW BLACK CARBON"
              >[DD1650-001] JORDAN 1 LOW BLACK CARBON</a
              >
            </h3>
          </div>
          <div class="product-price">
            <p class="product-price__new">3,450,000₫</p>
          </div>
        </div>
      </div>
      <div class="product-item">
        <div class="product-image">
          <div class="product-noti">
            <span class="product-noti__show product-noti__sale"
            >-15%</span
            >
          </div>
          <a href="#" class="product-image__link">
            <img src="{{ asset('frontend/img/product/product_15.webp') }}" alt="" />
            <img src="{{ asset('frontend/img/product/product_16.webp') }}" alt="" />
          </a>
          <div class="product-control">
            <a href="#" class="product-btn">Mua ngay</a>
            <a href="#" class="product-btn">Thêm vào giỏ</a>
          </div>
        </div>
        <div class="product-infor">
          <div class="product-name">
            <h3>
              <a href="#" title="[DB2813-100] NIKE AIR FORCE 1 KSA"
              >[DB2813-100] NIKE AIR FORCE 1 KSA</a
              >
            </h3>
          </div>
          <div class="product-price">
            <p class="product-price__new discount">
              2,890,000₫
              <span class="product-price__old">3,390,000₫</span>
            </p>
          </div>
        </div>
      </div>
      <div class="product-item">
        <div class="product-image">
          <div class="product-noti">
            <span class="product-noti__show product-noti__sold-out"
            >Hết</span
            >
          </div>
          <a href="#" class="product-image__link">
            <img src="{{ asset('frontend/img/product/product_17.webp') }}" alt="" />
            <img src="{{ asset('frontend/img/product/product_18.webp') }}" alt="" />
          </a>
          <div class="product-control">
            <a href="#" class="product-btn">Mua ngay</a>
            <a href="#" class="product-btn">Thêm vào giỏ</a>
          </div>
        </div>
        <div class="product-infor">
          <div class="product-name">
            <h3>
              <a href="#" title="[FY0306] ULTRA BOOST 2021 ALLBLACK"
              >[FY0306] ULTRA BOOST 2021 ALLBLACK</a
              >
            </h3>
          </div>
          <div class="product-price">
            <p class="product-price__new discount">2,390,000₫</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
