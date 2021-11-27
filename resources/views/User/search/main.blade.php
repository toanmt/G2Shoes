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
					<div class="product-noti">
						<?php
						if(!empty($product_size)) {
							$size_amount = $product_size->where('product_id',$product->id)->first();
							if(!empty($size_amount)) {
								$size_amount = $size_amount->amount;
							}
						}
						?>
						@if(empty($size_amount) || $size_amount == 0)
						<span class="product-noti__show product-noti__sold-out">Hết</span>
						@else
						@if($product->discount > 0)
						<span class="product-noti__show product-noti__sale">-{{$product->discount}}%</span>
						@endif
						@endif
					</div>
					<a href="#" class="product-image__link">
						@foreach($product->images as $image) 
						<img src="{{ asset('Image/'.$image->image_name) }}" alt="" />
						@endforeach
					</a>
					<div class="product-control">
						<form>
							@csrf
							<input 
							type="button" 
							name="quick-view" 
							class="product-btn product-quickview" 
							data-id_product="{{$product -> id}}" 
							id="product-quickview" 
							value="Xem nhanh"
							>
						</form>
						<?php
						$product_size = $product->find($product->id)->product_size;
						if(isset($product_size)) {
							$product_size = $product_size->first();
						}
						?>
						@if(empty($product_size))
						<a href="#" data-url="" class="product-btn add-to-cart">Thêm vào giỏ</a>
						@endif
						@if(isset($product_size))
						<a href="#" data-url="{{ route('addToCart') }}" data-quantity="1" class="product-btn add-to-cart">Thêm vào giỏ</a>
						<div class="add_to_cart_fields">
							<input type="hidden" name="product_id" value="{{ $product->id }}">
							<input type="hidden" name="product_size" value="{{ $product_size->size_id }}">
						</div>
						@endif
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
</section>
@include('User.home.modal')
@endsection
