<!-- Navigation -->
<nav class="nav">
	<div class="container">
		<div class="nav-logo">
			<a href="/">
				<h1 class="heading">g2 shoes</h1>
			</a>
		</div>
		<div class="nav-menu">
			<ul class="nav-list">
				@foreach($data as $brand)
				<li class="nav-item">
					<a href="{{URL::to('/brand/'.$brand->id)}}" class="nav-link">{{$brand->brand_name}}</a>
				</li>
				@endforeach
				<li class="nav-item">
					<a href="{{URL::to('/sales')}}" class="nav-link">sales</a>
				</li>
				<li class="nav-item">
					<a href="{{URL::to('/introduce')}}" class="nav-link">giới thiệu</a>
				</li>
				<li class="nav-item">
					<a href="{{URL::to('/contact')}}" class="nav-link">liên hệ</a>
				</li>
			</ul>
		</div>
		<div class="nav-control">
			<div class="nav-search">
				<form action="{{URL::to('/search')}}" method="POST" class="form-search">
					{{csrf_field()}}
					<input type="text" placeholder="Nhập từ khoá tìm kiếm..." name="keywords_submit"/>
					<button type="submit">
						<i class="bx bx-search"></i>
					</button>
				</form>
			</div>
			<div class="nav-cart">
				<a href="{{ route('showCart') }}" class="nav-cart__icon">
					<i class="bx bx-cart"></i>
				</a>
				<span class="nav-cart__span">
					@if(isset($session['cart']) && count($session['cart']) > 0)
					<a href="" class="nav-cart__qty">{{ count($session['cart']) }}</a>
					@endif
				</span>
			</div>
		</div>
	</div>
</nav>
<!-- /Navigation -->
