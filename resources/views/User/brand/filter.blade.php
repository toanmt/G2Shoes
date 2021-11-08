@foreach($brand as $brand)
<div class="brand-control">
  <div class="brand-control__item">
    <div class="brand-control__title">
      <span>Loại</span>
      <span class="brand-control__icon"><i class="bx bx-minus"></i></span>
    </div>
    <div class="brand-control__filter js-filter">
      <ul class="brand-control__list">
        @foreach($brand->types as $type)
        <li>
          <input type="checkbox" name="{{substr($type->type_name, 9).$type->id}}" id="{{substr($type->type_name, 9).$type->id}}"/>
          <label for="{{substr($type->type_name, 9).$type->id}}">{{$type->type_name}}</label>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
  <div class="brand-control__item">
    <div class="brand-control__title">
      <span>Giá sản phẩm</span>
      <span class="brand-control__icon"><i class="bx bx-minus"></i></span>
    </div>
    <div class="brand-control__filter js-filter">
      <ul class="brand-control__list brand-control__price">
        <li>
          <input type="checkbox" name="g1" id="g1" />
          <label for="g1">Dưới 1,000,000đ</label>
        </li>
        <li>
          <input type="checkbox" name="g2" id="g2" />
          <label for="g2">1,000,000₫ - 2,000,000₫</label>
        </li>
        <li>
          <input type="checkbox" name="g3" id="g3" />
          <label for="g3">2,000,000₫ - 3,500,000₫</label>
        </li>
        <li>
          <input type="checkbox" name="g4" id="g4" />
          <label for="g4">3,000,000₫ - 5,000,000₫</label>
        </li>
        <li>
          <input type="checkbox" name="g5" id="g5" />
          <label for="g5">Trên 5,000,000đ</label>
        </li>
      </ul>
    </div>
  </div>
  <div class="brand-control__item">
    <div class="brand-control__title">
      <span>Kích thước</span>
      <span class="brand-control__icon"><i class="bx bx-minus"></i></span>
    </div>
    <div class="brand-control__filter--size js-filter">
      <ul class="brand-control__list brand-control__size">
        @foreach($size as $size)
        <li>
          <input type="checkbox" name="SZ{{$size->size_number}}" id="SZ{{$size->size_number}}" />
          <label for="SZ{{$size->size_number}}">{{$size->size_number}}</label>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endforeach
