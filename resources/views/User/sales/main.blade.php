@extends('User.layout.main')
@section('content')
	@include('User.sales.path')
	<section class="brand">
	  <div class="container">
	    @include('User.sales.filter')
	    @include('User.sales.products')
	    @include('User.home.modal')
	  </div>
	</section>
@endsection
