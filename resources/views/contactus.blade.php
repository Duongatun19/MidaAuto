@extends('layouts.main.master')
@section('title')
Liên hệ với chúng tôi
@endsection
@section('description')
Liên hệ với chúng tôi
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
@endsection
@section('js')
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
				<li >Liên Hệ</li>
			</ul>
		</div>
	</div>
	<section class="blog-layout" itemscope itemtype="http://schema.org/Blog">
		<meta itemprop="name" content="Tin tức">
		<meta itemprop="description" content="">
		<div class="container mt-3 mb-3 lastest-articles">
			<div class="rounded p-3 bg-white">
				<div class="row">
				<div class="col-md-12 col-xs-12">
					<form action="{{route('postcontact')}}" method="post" class="formlienhe">
					@csrf
					Nhập tên của bạn (<i style="color: red">*</i>)
					<input type="text" class="form-control" name="name" placeholder="Enter Name"  required>
					Nhập số điện thoại (<i style="color: red">*</i>)
					<input type="text" class="form-control" name="phone" placeholder="Enter Phone"  required>
					Nhập email(<i style="color: red">*</i>)
					<input type="text" class="form-control" name="email" placeholder="Enter Email"  required>
					Nhập Thông tin
					<br>
					<input type="text" class="form-control" name="mess" placeholder="Enter Content">
					(<i style="color: red">*</i>) Là trường bắt buộc
					<br>
					<input type="submit"  class ="btn-success" value="Gửi thông tin liên hệ">
				</form>
				</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection