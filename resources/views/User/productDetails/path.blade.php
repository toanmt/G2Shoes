<div class="main-path">
  <div class="container">
    <ul class="main-path__list">
      <li>
        <a href="/">Trang chủ</a>
      </li>
      <li class="main-path__item">
        @foreach($type as $type)
          @if($type->id==$product->type_id)
            @foreach($data as $brand)
              @if($brand->id==$type->id)
                <a href="{{URL::to('/brand/'.$brand->id)}}"><span><b>{{ $brand->brand_name }}</b></span></a>
              @endif
            @endforeach
          @endif
        @endforeach
      </li>
      <li class="main-path__item">
        <span>{{$product->product_name}}</span>
      </li>
    </ul>
  </div>
</div>
