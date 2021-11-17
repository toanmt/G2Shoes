@extends('User.layout.main')
@section('content')
@include('User.contact.path')
<section class="contact">
	<div class="contact__container">
		<div class="contact__banner">
			<a href="#"
			><img src="{{asset('frontend/img/banner/page_banner.jpg')}}" alt="BOSS GIÀY"
			/></a>
		</div>
		<div class="contact__content">
			<div class="contact__title">Liên hệ</div>
			<div class="contact__info">
				<div class="contact__item">
					<span class="contact__item--title">Điện thoại:</span>
					<span>0243 765 5121</span>
				</div>
				<div class="contact__item">
					<span class="contact__item--title">Mail:</span>
					<span>Nhom2pmmnm@gmail.com</span>
				</div>
				<div class="contact__item">
					<span class="contact__item--title">Địa chỉ:</span>
					<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.4679193569327!2d105.73282371531405!3d21.053965592292247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455facd3904b5%3A0x9b4d70ebb9cf5523!2zMjk4IMSQLiBD4bqndSBEaeG7hW4sIEPhuqd1IERp4buFbiwgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1637049184596!5m2!1svi!2s"
					width="450"
					height="450"
					style="border: 0"
					allowfullscreen=""
					loading="lazy"
					></iframe>
				</div>
				<div class="contact__item">
					<span class="contact__item--title">Fanpage:</span>
					<div
					class="fb-page"
					data-href="https://www.facebook.com/group2shoes/"
					data-tabs="timeline"
					data-width="450"
					data-height="450"
					data-small-header="true"
					data-adapt-container-width="true"
					data-hide-cover="false"
					data-show-facepile="true"
					>
					<blockquote
					cite="https://www.facebook.com/group2shoes/"
					class="fb-xfbml-parse-ignore"
					>
					<a href="https://www.facebook.com/group2shoes/">G2 Shoes</a>
				</blockquote>
			</div>
		</div>
	</div>
</div>
</div>
</section>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="BTMBmKI2"></script>
@endsection
