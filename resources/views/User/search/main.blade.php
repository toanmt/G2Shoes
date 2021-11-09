@extends('User.layout.main')
@section('content')
<section class="product">
	<div class="product-heading">
		<h2 class="heading heading-title">Kết quả tìm kiếm</h2>
		<p>Có <span style="font-weight: 700">{{$search->count()}}</span> sản phẩm phù hợp với từ khoá <span style="font-weight: 700">"{{$keywords}}"</span></p>
	</div>
	<div class="product-list">
		<div class="container">
			@foreach($search as $product)
			<div class="product-item">
				<div class="product-image">
					<a href="#" class="product-image__link">
						@foreach($product->images as $image) 
						<img src="{{ asset('Image/'.$image->image_name) }}" alt="" />
						@endforeach
					</a>
					<div class="product-control">
						<a href="#" class="product-btn">Mua ngay</a>
						<a href="#" class="product-btn">Thêm vào giỏ</a>
					</div>
				</div>
				<div class="product-infor">
					<div class="product-name">
						<h3>
							<a href="#" title="">{{$product->product_name}}</a>
						</h3>
					</div>
					<div class="product-price">
						<p class="product-price__new">
							{{$product->price}}đ
							@if($product->discount > 0)
							<span class="product-price__old">{{$product->price - ($product->price * $product->discount)/100}}đ</span>
							@endif
						</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@include('User.home.gallery')
@endsection
