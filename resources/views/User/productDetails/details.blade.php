<section class="product-details">
  <div class="product-details__container">
    <div class="product-details-content">
      <div class="product-details-image">
        <div class="product-details-gallery">
          <?php $count1=-1; $count2=0; ?>
          @foreach($product->images as $image)
            <?php $count1++;?>
            <div class="product-details-gallery__thumbs">
              <img class="slider-image" src="{{ asset('Image/'.$image->image_name) }}" data-index="<?php echo $count1; ?>" alt="Product <?php echo $count1; ?>" />
            </div>
          @endforeach
        </div>
        <div class="product-details-slider">
          <div class="slider-main">
            @foreach($product->images as $image)
              <?php $count2++;?>
              <div class="slider-item">
                <img src="{{ asset('Image/'.$image->image_name) }}" alt="Product <?php echo $count2; ?>" />
              </div>
            @endforeach
          </div>
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
      @if(count($comment) == 0)
      <div class="product-details-review__comment__description">
        <div class="product-details-review__comment__sender">
          <p style="margin: 25px 15px;">Hiện tại sản phẩm chưa có đánh giá nào, bạn hãy trở thành người đầu tiên đánh giá cho sản phẩm này</p>
          <form id="review-form" class="review-form" action="{{ url('/add-comment') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="review-form-rating">
              <div class="review-form-rating-title">Đánh giá của bạn về sản phẩm:</div>
              <div class="review-form-rating-product">Giày {{ $product->product_name }}</div>
              <input type="hidden" name="productId" value="{{ $product->id }}">
              <div class="review-form-rating-stars">
                <input name="rating" class="star star-5" id="star-5" type="radio" value="5"/>
                <label class="star star-5" for="star-5"></label>
                <input name="rating" class="star star-4" id="star-4" type="radio" value="4"/>
                <label class="star star-4" for="star-4"></label>
                <input name="rating" class="star star-3" id="star-3" type="radio" value="3"/>
                <label class="star star-3" for="star-3"></label>
                <input name="rating" class="star star-2" id="star-2" type="radio" value="2"/>
                <label class="star star-2" for="star-2"></label>
                <input name="rating" class="star star-1" id="star-1" type="radio" value="1"/>
                <label class="star star-1" for="star-1"></label>
                <p class="error-fields"></p>
              </div>
            </div>
            <div class="review-form-information">
              <div class="form-group">
                <input id="review_author" name="author" type="text" class="form-control" placeholder=" " />
                <label for="review_author" class="form-label">Họ và tên</label>
                <span class="form-message"></span>
                <span class="form-icon form-icon--warn">
                  <i class="bx bxs-error"></i>
                </span>
              </div>
              <div class="form-group">
                <textarea id="review_body" name="content" rows="5" placeholder=" " class="form-control"></textarea>
                <label for="review_body" class="form-label">Nhập nội dung đánh giá của bạn về sản phẩm này</label>
                <span class="form-message"></span>
                <span class="form-icon form-icon--warn">
                  <i class="bx bxs-error"></i>
                </span>
              </div>
            </div>
            <button type="submit" class="btn-action add-to-cart form-submit" style="font-weight: 600">Gửi đánh giá của bạn</button>
          </form>
        </div>
      </div>
      @endif
      @if(count($comment) != 0)
      <div class="product-details-review__comment__description">
        <div class="product-details-review__comment__sender">
          <form id="review-form" class="review-form" action="{{ url('/add-comment') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="review-form-rating">
              <div class="review-form-rating-title">Đánh giá của bạn về sản phẩm:</div>
              <div class="review-form-rating-product">Giày {{ $product->product_name }}</div>
              <input type="hidden" name="productId" value="{{ $product->id }}">
              <div class="review-form-rating-stars">
                <input name="rating" class="star star-5" id="star-5" type="radio" value="5"/>
                <label class="star star-5" for="star-5"></label>
                <input name="rating" class="star star-4" id="star-4" type="radio" value="4"/>
                <label class="star star-4" for="star-4"></label>
                <input name="rating" class="star star-3" id="star-3" type="radio" value="3"/>
                <label class="star star-3" for="star-3"></label>
                <input name="rating" class="star star-2" id="star-2" type="radio" value="2"/>
                <label class="star star-2" for="star-2"></label>
                <input name="rating" class="star star-1" id="star-1" type="radio" value="1"/>
                <label class="star star-1" for="star-1"></label>
                <p class="error-fields"></p>
              </div>
            </div>
            <div class="review-form-information">
              <div class="form-group">
                <input id="review_author" name="author" type="text" class="form-control" placeholder=" " />
                <label for="review_author" class="form-label">Họ và tên</label>
                <span class="form-message"></span>
                <span class="form-icon form-icon--warn">
                  <i class="bx bxs-error"></i>
                </span>
              </div>
              <div class="form-group">
                <textarea id="review_body" name="content" rows="5" placeholder=" " class="form-control"></textarea>
                <label for="review_body" class="form-label">Nhập nội dung đánh giá của bạn về sản phẩm này</label>
                <span class="form-message"></span>
                <span class="form-icon form-icon--warn">
                  <i class="bx bxs-error"></i>
                </span>
              </div>
            </div>
            <button type="submit" class="btn-action add-to-cart form-submit" style="font-weight: 600">Gửi đánh giá của bạn</button>
          </form>
        </div>
        <div class="product-details-review__comment__action">
            <div class="rating-summary">
              <meta content="5" itemprop="bestRating">
              <meta content="1" itemprop="worstRating">
              <div class="rating-summary-score">
                  <span itemprop="ratingValue"><?php
                      $rate_score = 0;
                      foreach($comment as $key => $cmt)
                      {
                        $rate_score += $cmt->rating;
                      }
                      $rate = $rate_score/count($comment);
                      $rate_score = round($rate);
                      echo round($rate, 1, PHP_ROUND_HALF_EVEN);
                    ?>/5</span>
              </div>
              <div data-number="{{ $rate_score }}" data-score="{{ $rate_score }}" class="rating-summary-star">
                <?php
                  for($i = 1; $i <= $rate_score; $i++)
                  {
                    ?>
                      <i data-alt="{{ $i }}" class="bx bxs-star" style="margin: 0 2px; color: #ffbe00;" aria-hidden="true"></i>
                    <?php
                  }
                ?>
                <input name="score" type="hidden" value="{{ $rate_score }}" readonly="">
              </div>
              <div>(<span itemprop="ratingCount">{{ count($comment) }}</span> <span> đánh giá</span>)</div>
              
            </div>
            <div class="rating-filter">
              <div class="rating-filter-list">
                <div class="select-rating">
                  <input type="radio" id="FilterAll" name="filter" value="all" style="display: none;">
                  <label class="rating-score" for="FilterAll">Tất cả (<span class="count">{{ count($comment) }}</span>)</label>
                </div>
                <div class="select-rating">
                  <input type="radio" id="FiveScore" name="filter" value="5" style="display: none;">
                  <label class="rating-score" for="FiveScore">5 Điểm (<span class="count">{{ count($comment->where('rating',5)) }}</span>)</label>
                </div>
                <div class="select-rating">
                  <input type="radio" id="FourScore" name="filter" value="4" style="display: none;">
                  <label class="rating-score" for="FourScore">4 Điểm (<span class="count">{{ count($comment->where('rating',4)) }}</span>)</label>
                </div>
                <div class="select-rating">
                  <input type="radio" id="ThreeScore" name="filter" value="3" style="display: none;">
                  <label class="rating-score" for="ThreeScore">3 Điểm (<span class="count">{{ count($comment->where('rating',3)) }}</span>)</label>
                </div>
                <div class="select-rating">
                  <input type="radio" id="TwoScore" name="filter" value="2" style="display: none;">
                  <label class="rating-score" for="TwoScore">2 Điểm (<span class="count">{{ count($comment->where('rating',2)) }}</span>)</label>
                </div>
                <div class="select-rating">
                  <input type="radio" id="OneScore" name="filter" value="1" style="display: none;">
                  <label class="rating-score" for="OneScore">1 Điểm (<span class="count">{{ count($comment->where('rating',1)) }}</span>)</label>
                </div>
              </div>
            </div>
        </div>  
        <div id="review_data">
          
        </div>
        <div id="pagination-review">
          
        </div>
      </div>
      @endif
    </div>
  </div>
  <script src="{{ asset('frontend/js/pagination.min.js') }}"></script>
  <script>
    (function(name) {
    var container = $('#pagination-' + name);
    container.pagination({
      dataSource: <?php echo $comment;?>,
      locator: '',
      totalNumber: <?php echo $comment->count(); ?>,
      pageSize: 2,
      ajax: {
        beforeSend: function() {
          container.prev().html('Loading data from Database ...');
        }
      },
      callback: function(response, pagination) {
        window.console && console.log(22, response, pagination);
        let header = '';
        let rate = '';
        let body = '';
        let date = '';
        let action = '';
        let dataHtml = '';
        let dataReview = [];

        $.each(response, function (index, item) {
          for(i = 1; i <= item.rating; i++)
          {
            rate += '<i data-alt="'+ i +'" class="bx bxs-star" style="margin: 0 2px; color: #ffbe00;" aria-hidden="true"></i>';
          } 
          
          header += '<div class="product-details-review__comment__list-header">';
          header += '<span id="author">' + item.author + '</span>&nbsp;';
          header += '<div data-score="' + item.rating + '" data-number="' + item.rating + '">' + rate + '</div></div>';
          date = new Date(item.created_at);
          body += '<div class="product-details-review__comment__list-body"><span id="user_comment">' + item.content + '</span></div>';
          action += '<div class="product-details-review__comment__list-action"><span class="review-time" id="datePublished">' + date.toLocaleString() + '</span></div>';
          dataHtml += '<div class="product-details-review__comment__list">' + header + body + action + '</div>';
          dataReview[index] = dataHtml;
          header = '';
          rate = '';
          body = '';
          date = '';
          action = '';
          dataHtml = '';
        });

        container.prev().html(dataReview);
      }
    })
  })('review');
  </script>
</section>
