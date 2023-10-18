@extends('layouts.main.master')
@section('title')
{{($detail_service->name)}}
@endsection
@section('description')
{{($detail_service->description)}}
@endsection
@section('image')
{{url(''.$detail_service->image)}}
@endsection
@php
$imgs = json_decode($detail_service->image);
@endphp
@section('css')
@endsection
@section('js')
<script>
	$('.owl-carousel').owlCarousel({
		loop:false,
		margin:10,
		nav:true,
		autoplay: true,
		responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1000:{
					items:2
				}
		}
	})
</script>
@endsection
@section('content')
<div class="col-right position-relative">
	<div class="contentWarp ">
	   <div class="breadcrumbs bg-white">
		  <div class="container position-relative">
			 <ul class="breadcrumb align-items-center m-0 pl-0 pr-0 small pt-2 pb-2">
				<li class="home">
				   <a href="{{route('home')}}" title="Trang chủ">
					  <svg width="12" height="10.633">
						 <use href="#svg-home" />
					  </svg>
					  Trang chủ
				   </a>
				   <span class="slash-divider ml-2 mr-2">/</span>
				</li>
				<li>
				   <a href="/tin-tuc" title="Tin tức"><span>Tin tức</span></a>	
				   <span class="slash-divider ml-2 mr-2">/</span>
				</li>
				<li >{{($detail_service->name)}}</li>
			 </ul>
		  </div>
	   </div>
	   <section class="col2-right-layout" itemscope  itemtype="http://schema.org/Article">
		  <meta itemprop="mainEntityOfPage" content="/oppo-reno8-series-ra-mat-tai-viet-nam-vao-ngay-18-8">
		  <meta itemprop="description" content="">
		  <meta itemprop="url" content="//mew-mobile.mysapo.net/oppo-reno8-series-ra-mat-tai-viet-nam-vao-ngay-18-8">
		  <meta itemprop="name" content="{{$detail_service->name}}">
		  <meta itemprop="headline" content="{{$detail_service->name}}">
		  <meta itemprop="image" content="http://bizweb.dktcdn.net/thumb/grande/100/459/533/articles/cleanshot-2022-08-09-at-1-27-11-2x-e1659983495924.jpg?v=1660019210580">
		  <meta itemprop="author" content="Mew Theme">
		  <meta itemprop="datePublished" content="09-08-2022">
		  <meta itemprop="dateModified" content="09-08-2022">
		  <div class="d-none" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			 <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
				<img class="hidden" src="https://bizweb.dktcdn.net/100/459/533/themes/868331/assets/logo.png?1676652384879" alt="Mew Mobile"/>
				<meta itemprop="url" content="https://bizweb.dktcdn.net/100/459/533/themes/868331/assets/logo.png?1676652384879">
				<meta itemprop="width" content="400">
				<meta itemprop="height" content="60">
			 </div>
			 <meta itemprop="name" content="Mew Mobile">
		  </div>
		  <div class="main container blogs">
			 <div class="col-main art_container mt-3 mb-3">
				<div class="rounded p-3 bg-white">
				   <div class="row">
					  <article class="blog_entry clearfix order-md-2 col-12 col-md-12 col-lg-8 col-xl-9" style="padding: 37px;transform: translateY(-40px);">
						 <h1 class="article-name font-weight-bold mt-1">{{($detail_service->name)}}</h1>
						 <div class="entry-date">
							<p class="day mb-0 mb-lg-3 pt-1">
								<b>{{$detail_service->created_at}}</b>
							</p>
						 </div>
						 <div class="js-toc table-of-contents w-100 position-relative p-2 rounded mb-3" data-toc></div>
						 <div class="entry-content text-justify rte " data-content>
							{!!languageName($detail_service->content)!!}
						 </div>
					  
					  </article>
					  <div class="col-xl-3 col-lg-4 col-md-12 d-none d-lg-block ba_sidebar order-3 order-lg-1" style="border-right:2px solid red">
						@include('service.right')
					  </div>
				   </div>
				</div>
			  
			 </div>
		  </div>
	   </section>
	</div>
@endsection