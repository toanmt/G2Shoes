<div class="main-path">
  <div class="container">
    <ul class="main-path__list">
      <li>
        <a href="/">Trang chủ</a>
      </li>
      <li class="main-path__item">
        @if(empty($carts))
				  <span style="text-transform: none">Giỏ hàng chưa có sản phẩm</span>
				@endif
        @if(isset($carts))
				  <span style="text-transform: none">Giỏ hàng ({{ count($carts) }})</span>
				@endif
      </li>
    </ul>
  </div>
</div>