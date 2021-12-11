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
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <div class="product-details-infomation__title">
        <div class="product-details-infomation__name">
          {{ $product->product_name }}
        </div>
        <div class="product-details-infomation__sku">
          <span>SKU: {{ $product->id }}</span>
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
          <span class="product-details__noti">Tình trạng: <strong>Hết hàng</strong></span>
          @else
          <span class="product-details__noti">Tình trạng: <strong>Còn hàng</strong></span>
          @endif
        </div>
      </div>
      <div class="product-details-infomation__price">
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
        @if($product->discount > 0)
        <span class="product-price__discount">- {{$product->discount}}%</span>
        @endif
      </div>
      @if(count($product_size) != 0)
      <div class="product-details-infomation__size">
        <div class="select-size">
          @foreach($product_size as $key => $size)
          <div class="select-size__list">
            <input id="size-{{ $size->size_id }}" type="radio" name="product_size" value="{{ $size->size_id }}" />
            <label class="size-item" for="size-{{ $size->size_id }}">
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
      @endif
      <div class="product-details-infomation__quantity">
        <button class="btn-quantity btn-minus">-</button>
        <input type="text" value="1" name="product_quantity" min="1" max="20" step="1" class="quantity-box" id="product-quantity">
        <button class="btn-quantity btn-plus">+</button>
      </div>
      <div class="product-details-infomation__action">
        <a href="#" class="btn-action add-to-cart">Thêm vào giỏ</a>
        <a href="#" class="btn-action buy-now">Mua ngay</a>
      </div>
      <a href="{{URL::to('/contact')}}" class="btn-action support">
        Nhấn vào đây để hỗ trợ nhanh nhất
      </a>
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
            <button type="submit" class="btn-action form-submit btn-add-comment" style="font-weight: 600">Gửi đánh giá của bạn</button>
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
            <button type="submit" class="btn-action form-submit btn-add-comment" style="font-weight: 600">Gửi đánh giá của bạn</button>
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
      <div class="product-related">
        <div class="product-related__title">
          <h2>Có thể bạn sẽ thích</h2>
        </div>
        <div class="product-related__list">
          @foreach($like_product as $product)
          <div class="product-related__item">
            <div class="product-related__img">
              <a href="{{ URL::to('/product_details/'.$product->id)}}">
                @foreach($product->images as $image)
                <img src="{{ asset('Image/'.$image->image_name) }}" alt="" />
                @endforeach
              </a>
            </div>
            <div class="product-related__infor">
              <div class="product-related__name">
                <h3>
                  <a href="{{ URL::to('/product_details/'.$product->id)}}">{{$product->product_name}}</a>
                </h3>
              </div>
              <div class="product-related__price">
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
    </div>
  </div>
  <script src="{{ asset('frontend/js/pagination.min.js') }}"></script>
  <script>


    $(document).ready(function () {

      $(".quantity-box").off().change(function (e) {
        e.preventDefault();
        let urlUpdateCart = $('.update_cart_url').data('url');
        let id = $(this).closest('.item-quan').find('.item-quan-fields').data('id');
        let qty = $(this).closest('.item-quan').find('.quantity-box');
        let quantity = parseInt(qty.val());

        if (quantity.length == 0) {
          Swal.fire({title: 'Số lượng nhập không được để trống!' , icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
        }
        else if (isNaN(quantity)) {
          Swal.fire({title: 'Số lượng nhập không được phép chứa ký tự khác số!' , icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
        }
        else if (parseInt(quantity) < 1) {
          Swal.fire({title: 'Số lượng nhập không được bé hơn 1!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
        }

      });

      $('.btn-quantity').off().click(function (e) {
        e.preventDefault();
        let qty = $(this).parents('.product-details-infomation__quantity').find('.quantity-box');
        let quantity = parseInt(qty.val());
        if($(this).hasClass('btn-minus')) {
          quantity = quantity - 1;
        }
        if($(this).hasClass('btn-plus')) {
          quantity = quantity + 1;
        }
        if (quantity.length == 0) {
          Swal.fire({title: 'Số lượng nhập không được để trống!' , icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
        }
        else if (isNaN(quantity)) {
          Swal.fire({title: 'Số lượng nhập không được phép chứa ký tự khác số!' , icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
        }
        else if (parseInt(quantity) < 1) {
          Swal.fire({title: 'Số lượng nhập không được bé hơn 1!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000})
        }
        else {
          qty.val(quantity);
        }
      });

      if(document.querySelector('.size-item')) {
        $('.select-size__list').find('.size-item')[0].classList.add("active");
        $('.select-size__list').find('input[name="product_size"]')[0].checked = true;
      }

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

    });
  </script>
  <script type="text/javascript">
    if(document.querySelector('.product-details')) {
        //handle slider
        const details = document.querySelector('.product-details');
        const sliderMain = details.querySelector(".slider-main");
        const sliderImgs = details.querySelectorAll(".slider-image");
        const sliderItems = details.querySelectorAll(".slider-item");
        const sliderItemWidth = sliderItems[0].offsetWidth;
        let positionX = 0;

        sliderImgs[0].classList.add("active");
        [...sliderImgs].forEach((item) => {
          item.addEventListener("click", (e) => {
            document.querySelector(".slider-image.active").classList.remove("active");
            e.target.classList.add("active");
            const slideIndex = parseInt(e.target.dataset.index);
            positionX = -1 * slideIndex * sliderItemWidth;
            sliderMain.style = `transform: translateX(${positionX}px)`;
          });
        });

        //select size of shoes
        const sizeElm = document.querySelectorAll(".size-item");
        [...sizeElm].forEach((elm) =>
          elm.addEventListener("click", (e) => {
            [...sizeElm].forEach((item) => item.classList.remove("active"));
            e.target.classList.add("active");
          })
          );
      }

    </script>
  </section>
