@extends('User.layout.main')
@section('content')
	@include('User.brand.path')
	<section class="brand">
	  <div class="container">
	    @include('User.brand.filter')
	    @include('User.brand.products')
	  </div>
	</section>
	@include('User.home.gallery')
@endsection
