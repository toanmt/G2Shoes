<div class="brand-control">
  <div class="brand-control__item">
    <div class="brand-control__title">
      <span>Thương hiệu</span>
      <span class="brand-control__icon"><i class="bx bx-minus"></i></span>
    </div>
    <div class="brand-control__filter js-filter">
      <ul class="brand-control__list">
        @foreach($data as $brand)
        <li>
          <input 
            type="checkbox"
            data-url="{{Request::url()}}/filter"
            filter="{{$brand->id}}"
            data-search="brand_list"
            value="{{$brand->brand_name}}" 
            name="Type{{$brand->id}}" 
            id="Type{{$brand->id}}" 
            class="filter_brand filter"
          />
          <label for="Type{{$brand->id}}" class="filter-label">{{$brand->brand_name}}</label>
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
          <input class="filter_price filter" type="radio" name="price_range" id="g0" data-url="{{Request::url()}}/filter" data-search="price_list" filter="0" checked />
          <label for="g0">Tất cả</label>
        </li>
        <li>
          <input class="filter_price filter" type="radio" name="price_range" id="g1" data-url="{{Request::url()}}/filter" data-search="price_list" filter="1" />
          <label for="g1">Dưới 1,000,000đ</label>
        </li>
        <li>
          <input class="filter_price filter" type="radio" name="price_range" id="g2" data-url="{{Request::url()}}/filter" data-search="price_list" filter="2" />
          <label for="g2">1,000,000₫ - 2,000,000₫</label>
        </li>
        <li>
          <input class="filter_price filter" type="radio" name="price_range" id="g3" data-url="{{Request::url()}}/filter" data-search="price_list" filter="3" />
          <label for="g3">2,000,000₫ - 3,500,000₫</label>
        </li>
        <li>
          <input class="filter_price filter" type="radio" name="price_range" id="g4" data-url="{{Request::url()}}/filter" data-search="price_list" filter="4" />
          <label for="g4">3,000,000₫ - 5,000,000₫</label>
        </li>
        <li>
          <input class="filter_price filter" type="radio" name="price_range" id="g5" data-url="{{Request::url()}}/filter" data-search="price_list" filter="5" />
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
          <input 
            type="checkbox" 
            data-url="{{Request::url()}}/filter"
            filter="{{$size->id}}"
            data-search="size_list"
            value="{{$size->size_number}}" 
            name="Size{{$size->size_number}}" 
            id="Size{{$size->size_number}}"
            class="filter_size filter" 
          />
          <label for="Size{{$size->size_number}}" class="filter-label">{{$size->size_number}}</label>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
