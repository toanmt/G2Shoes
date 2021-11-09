<section class="product-details">
  <div class="product-details__container">
    <div class="product-details-content">
      <div class="product-details-image">
        <div class="product-details-gallery">
        <?php $count1=0; $count2=0; ?>
        @foreach($product->images as $image)
        <?php $count1++;?>
          <div class="product-details-gallery__thumbs">
            <img class="demo active" src="{{ asset('Image/'.$image->image_name) }}" onclick="currentSlide(<?php echo $count1; ?>)" alt="Product <?php echo $count1; ?>" />
          </div>
          @endforeach
        </div>
        <div class="product-details-slider">
        @foreach($product->images as $image)
        <?php $count2++;?>
          <div class="slider-item">
            <img src="{{ asset('Image/'.$image->image_name) }}" alt="Product <?php echo $count2; ?>" />
          </div>
        @endforeach
        </div>
      </div>
      <div class="product-details-description">
        <div class="product-details-description__title">Mô tả</div>
        <div class="product-details-description__details">
          <div>-Hàng chính hãng</div>
          <div>-Giao hàng Toàn Quốc</div>
          <div>-Thanh Toán khi nhận hàng</div>
          <div>-Bảo hành chính hãng trọn đời sản phẩm</div>
          <div>-Bảo hành keo , chỉ trọn đời sản phẩm</div>
          <div>-Giao hàng Nhanh 60p tại Sài Gòn</div>
        </div>
      </div>
    </div>
    <div class="product-details-infomation">
      <div class="product-details-infomation__title">
        <div class="product-details-infomation__name">
            {{ $product->product_name }}
        </div>
        <div class="product-details-infomation__sku">SKU: {{ $product->id }}</div>
      </div>
      <div class="product-details-infomation__price">
        <p class="product-price__new">
          {{$product->price}}đ
          @if($product->discount > 0)
          <span class="product-price__old">{{$product->price - ($product->price * $product->discount)/100}}đ</span>
          @endif
        </p>
      </div>
      <div class="product-details-infomation__size">
        <div class="select-size">
          @foreach($product_size as $key => $size)
          <div class="select-size__list">
            <input id="{{ $size->size_id}}" type="radio" name="option" />
            <label class="size-item" for="{{ $size->size_id}}">
                @foreach($sizes as $key => $sizes_id)
                  @if($sizes_id->id==$size->size_id)
                    {{ $sizes_id->size_number }}
                  @endif
                @endforeach
            </label>
          </div>
          @endforeach 
        </div>
      </div>
      <div class="product-details-infomation__quantity">
        <div class="btn-quantity minus">-</div>
        <div class="quantity-box">1</div>
        <div class="btn-quantity plus">+</div>
      </div>
      <div class="product-details-infomation__action">
        <div class="btn-action add-to-cart">Thêm vào giỏ</div>
        <div class="btn-action buy-now">Mua ngay</div>
      </div>
      <div class="btn-action support">
        Nhấn vào đây để hỗ trợ nhanh nhất
      </div>
    </div>
  </div>
  <div class="product-details-review">
    <div class="product-details-review__comment">
      <div class="product-details-review__comment__description no-comment" style="display: none;">
        <div class="product-details-review__comment__sender">
          <p style="margin: 25px 15px;">Hiện tại sản phẩm chưa có đánh giá nào, bạn hãy trở thành người đầu tiên đánh giá cho sản phẩm này</p>
          <form class="review-form" action="">
            <div class="review-form-rating">
              <div class="review-form-rating-title">Đánh giá của bạn về sản phẩm:</div>
              <div class="review-form-rating-product">Giày {{ $product->product_name }}</div>
              <div class="review-form-rating-stars">
                <input class="star star-5" id="star-5" type="radio" name="star"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="star"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="star"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="star"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="star"/>
                <label class="star star-1" for="star-1"></label>
              </div>
            </div>
            <div class="review-form-information">
              <div class="review-form-information-name">
                <input type="text" maxlength="100" id="review_author" name="author" value="" placeholder="Nhập họ tên của bạn">
              </div>
              <div class="review-form-information-evaluate">
                <textarea maxlength="1000" id="review_body" name="body" rows="5" placeholder="Nhập nội dung đánh giá của bạn về sản phẩm này"></textarea>
              </div>
            </div>
            <button type="button" class="btn-new-review" onclick="">Gửi đánh giá của bạn</button>
          </form>
        </div>
      </div>
      <div class="product-details-review__comment__description have-comment" style="display: block;">
        <div class="product-details-review__comment__sender">
          <form class="review-form" action="">
            <div class="review-form-rating">
              <div class="review-form-rating-title">Đánh giá của bạn về sản phẩm:</div>
              <div class="review-form-rating-product">Giày {{ $product->product_name }}</div>
              <div class="review-form-rating-stars">
                <input class="star star-5" id="star-5" type="radio" name="star"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="star"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="star"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="star"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="star"/>
                <label class="star star-1" for="star-1"></label>
              </div>
            </div>
            <div class="review-form-information">
              <div class="review-form-information-name">
                <input type="text" maxlength="100" id="review_author" name="author" value="" placeholder="Nhập họ tên của bạn">
              </div>
              <div class="review-form-information-evaluate">
                <textarea maxlength="1000" id="review_body" name="body" rows="5" placeholder="Nhập nội dung đánh giá của bạn về sản phẩm này"></textarea>
              </div>
            </div>
            <button type="button" class="btn-new-review" onclick="">Gửi đánh giá của bạn</button>
          </form>
        </div>
        <div class="product-details-review__comment__action">
            <div class="rating-summary">
              <meta content="5" itemprop="bestRating">
              <meta content="1" itemprop="worstRating">
              <div class="rating-summary-score">
                  <span itemprop="ratingValue">5</span>
                  <span class="max-score">/5</span>
              </div>
              <div data-number="5" data-score="5" class="rating-summary-star">
                <i data-alt="1" class="fa fa-star" aria-hidden="true"></i>
                <i data-alt="2" class="fa fa-star" aria-hidden="true"></i>
                <i data-alt="3" class="fa fa-star" aria-hidden="true"></i>
                <i data-alt="4" class="fa fa-star" aria-hidden="true"></i>
                <i data-alt="5" class="fa fa-star" aria-hidden="true"></i>
                <input name="score" type="hidden" value="5" readonly="">
              </div>
              <div>(<span itemprop="ratingCount">1</span> <span> đánh giá</span>)</div>
              
            </div>
            <div class="rating-filter">
              <div class="rating-filter-list">
                <div class="select-rating">
                  <input type="radio" id="FilterAll" name="filter" value="all" style="display: none;">
                  <label class="rating-score" for="FilterAll">Tất cả</label>
                </div>
                <div class="select-rating">
                  <input type="radio" id="FiveScore" name="filter" value="5" style="display: none;">
                  <label class="rating-score" for="FiveScore">5 Điểm (<span class="count">1</span>)</label>
                </div>
                <div class="select-rating">
                  <input type="radio" id="FourScore" name="filter" value="4" style="display: none;">
                  <label class="rating-score" for="FourScore">4 Điểm (<span class="count">1</span>)</label>
                </div>
                <div class="select-rating">
                  <input type="radio" id="ThreeScore" name="filter" value="3" style="display: none;">
                  <label class="rating-score" for="ThreeScore">3 Điểm (<span class="count">1</span>)</label>
                </div>
                <div class="select-rating">
                  <input type="radio" id="TwoScore" name="filter" value="2" style="display: none;">
                  <label class="rating-score" for="TwoScore">2 Điểm (<span class="count">1</span>)</label>
                </div>
                <div class="select-rating">
                  <input type="radio" id="OneScore" name="filter" value="1" style="display: none;">
                  <label class="rating-score" for="OneScore">1 Điểm (<span class="count">1</span>)</label>
                </div>
              </div>
            </div>
        </div>
        <div class="product-details-review__comment__list">
          <div class="product-details-review__comment__list-header">
            <span id="author">LOL</span>&nbsp;
            <div data-score="5" data-number="5">
              <i data-alt="1" class="fa fa-star" aria-hidden="true"></i>
              <i data-alt="2" class="fa fa-star" aria-hidden="true"></i>
              <i data-alt="3" class="fa fa-star" aria-hidden="true"></i>
              <i data-alt="4" class="fa fa-star" aria-hidden="true"></i>
              <i data-alt="5" class="fa fa-star" aria-hidden="true"></i>
            </div>
          </div>
          <div class="product-details-review__comment__list-body">
            <span id="user_comment">sản phẩm tốt</span>
          </div>
          <div class="product-details-review__comment__list-action">
            <ul>
              <li>
                <span class="review-time" id="datePublished">10:48 06/11/2021</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div>
        <img src="{{ asset('Image/demo/shoes.png') }}" alt="Các thương hiệu">
      </div>
    </div>
  </div>  
</section>