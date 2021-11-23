<div class="main-path">
  <div class="container">
    <ul class="main-path__list">
      <li>
        <a href="/">Trang chủ</a>
      </li>
      <li class="main-path__item">
        <a href="{{URL::to('/brand/'.$product->type->brand_id)}}"><span><b>{{ $data->find($product->type->brand_id)->brand_name }}</b></span></a>
      </li>
      <li class="main-path__item">
        <span>{{$product->product_name}}</span>
      </li>
    </ul>
  </div>
</div>
