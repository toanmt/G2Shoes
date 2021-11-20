@extends('User.layout.main')
@section('content')
@include('User.introduce.path')
<section class="introduce">
	<div class="introduce__container">
		<div class="introduce__banner">
			<a href="#"
			><img src="{{asset('frontend/img/banner/page_banner.jpg')}}" alt="BOSS GIÀY"
			/></a>
		</div>
		<div class="introduce__content">
			<div class="introduce__title">Giới thiệu</div>
			<div class="introduce__description">
				G2 SHOES được thành lập từ niềm đam mê Sneaker người mà yêu thích
				nền văn hóa SÁT MẶT ĐẤT. Nơi giao lưu học hỏi và mua bán các sản
				phẩm Sneaker Authentic 100%.
			</div>
			<div class="introduce__video">
				<h4>Một số đánh giá:</h4>
				<div class="introduce__video--item">
					<iframe
					width="480"
					height="315"
					src="https://www.youtube.com/embed/N4cQpfMILKc"
					title="YouTube video player"
					frameborder="0"
					allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
					allowfullscreen
					></iframe>
					<iframe
					width="480"
					height="315"
					src="https://www.youtube.com/embed/51ya03e_rFY"
					title="YouTube video player"
					frameborder="0"
					allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
					allowfullscreen
					></iframe>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
