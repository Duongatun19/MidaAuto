@extends('layouts.main.master')
@section('title')
{{$title}}
@endsection
@section('description')
Danh sách {{$title}}
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('js')
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/collection_style.scss.css')}}">
@endsection
@section('content')
<div class="col-right position-relative">
<div class="contentWarp ">
   <div class="opacity_filter"></div>
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
            <li > {{$title}}</li>
         </ul>
      </div>
   </div>
   <section class="collection-layout mt-3 mb-3">
      <div class="container">
         <div class="rounded p-2 p-md-3 bg-white">
            <div class="banner_collection mb-3 swiper-container position-relative">
               <div class="swiper-wrapper">
                  @if(isset($cate_img))
                  <div class="swiper-slide text-center effect-ming">
                     <a href="javascrip:;" class="rounded modal-open position-relative w-100 m-0 ratio1by6 d-block aspect sitdown" title="Điện thoại">
                     <img src="{{$cate_img}}" alt="Điện thoại" class="d-block img img-cover position-absolute" />
                     </a>
                  </div>
                  @endif
               </div>
               <div class="swiper-button-prev mbc_prev d-none d-md-flex"></div>
               <div class="swiper-button-next mbc_next d-none d-md-flex"></div>
            </div>
            <div class="row">
               <div class="col-12 col-lg-9 order-lg-2 pt-3 pt-lg-0">
                  <div class="collection" id="form-ketqua">
                     <div class="category-products position-relative mt-3 mb-3">
                        <div class="row slider-items">
                           @foreach ($list as $pro)
                           <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 product-grid-item-lm mb-3 ">
                              @include('layouts.product.item',['product'=>$pro])
                           </div>
                           @endforeach
                           <div class="pagenav">
                              {{$list->links()}}
                           </div>
                        </div>
                     </div>
                  </div>
                 
               </div>
               <div class="col-12 col-lg-3 order-lg-1">
                  <div class="sidebar sidebar_mobi m-0 p-2 p-lg-0 mt-lg-1 d-flex flex-column">
                     <script src="//bizweb.dktcdn.net/100/459/533/themes/868331/assets/search_filter.js?1676652384879" type="text/javascript"></script>
                     <div class="aside-filter mb-3 modal-open w-100 pr-0 pr-md-2 order-lg-3 clearfix">
                        <div class="filter-container row">
                           <aside class="aside-item filter-price mb-3 col-12 col-sm-12 col-lg-12">
                              <div class="aside-content filter-group mb-1">
                                 <div class="row">
                                 </div>
                              </div>
                             
                           </aside>
                           <aside class="aside-item filter-type mb-3 col-12 col-sm-4 col-lg-12">
                              <div class="h2 title-head m-0 pt-2 pb-2 font-weight-bold">Loại</div>
                              <div class="aside-content filter-group">
                                 <ul class="filter-type d-flex flex-wrap gap_8 list-unstyled m-0">
                                    @if (isset($cate_id))
                                    <input type="text" name="cateno" data-id="{{$cate_id}}" class="cate-id" hidden>
                                    @elseif(isset($type_id))
                                    <input type="text" name="cateno" data-id="{{$type_id}}" class="type-id" hidden>
                                    @endif
                                    @php
                                   $activeClass = 'active';
                                    @endphp
                                    @foreach ($categoryhome as $cate)
                           <li >
                              @if (isset($cate_id))
                              <a class="cus-tu {{ $cate->id == $cate_id ? $activeClass : '' }}" title="{{languageName($cate->name)}}"  href="{{route('allListProCate',['danhmuc'=>$cate->slug])}}">{{languageName($cate->name)}}</a>
                              @else
                              <a class="cus-tu" title="{{languageName($cate->name)}}"  href="{{route('allListProCate',['danhmuc'=>$cate->slug])}}">{{languageName($cate->name)}}</a>
                              @endif
                           </li>   
                        @endforeach
                                 </ul>
                              </div>
                           </aside>
                           <aside class="aside-item filter-tag-style-1 tag-filtster mb-3 col-12 col-sm-4 col-lg-12">
                              <div class="h2 title-head m-0 pt-2 pb-2 font-weight-bold">Khoảng giá</div>
                              <div class="aside-content filter-group">
                                 <form>
                                    <input data-url="{{route('filterProduct')}}" type="checkbox" name="price" value="<1trieu" onchange="toggleCheckboxes(this)"> Nhỏ hơn 1 triệu<br>
                                    <input data-url="{{route('filterProduct')}}" type="checkbox" name="price" value="1-2trieu" onchange="toggleCheckboxes(this)"> Từ 1tr -2tr<br>
                                    <input data-url="{{route('filterProduct')}}" type="checkbox" name="price" value="2-3trieu" onchange="toggleCheckboxes(this)"> Từ 2tr -3tr<br>
                                    <input data-url="{{route('filterProduct')}}" type="checkbox" name="price" value="3-5trieu" onchange="toggleCheckboxes(this)"> Từ 3tr -5tr<br>
                                    <input data-url="{{route('filterProduct')}}" type="checkbox" name="price" value="5-8trieu" onchange="toggleCheckboxes(this)"> Từ 5tr -8tr<br>
                                    <input data-url="{{route('filterProduct')}}" type="checkbox" name="price" value="8-10trieu" onchange="toggleCheckboxes(this)"> Từ 8tr -10tr<br>
                                    <input data-url="{{route('filterProduct')}}" type="checkbox" name="price" value=">10trieu" onchange="toggleCheckboxes(this)"> Trên 10tr<br>
                                 </form>
                                 <script>
                                    function toggleCheckboxes(checkbox) {
                                    event.preventDefault(); // Prevent default form behavior
                                    var url = $('input[name="price"]').data('url');
                                    var cate = $('.cate-id').data('id');
                                    console.log(cate);
                                    var checkboxes = document.getElementsByName('price');
                                    for (var i = 0; i < checkboxes.length; i++) {
                                    if (checkboxes[i] != checkbox) {
                                    checkboxes[i].checked = false;
                                    }
                                    }
                                    // Send AJAX request to server
                                    $.ajax({
                                    type: 'POST',
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    url: url,
                                    data: { 
                                       price: checkbox.value ,
                                       cate :cate,
                                    },
                                    success: function (data) {
                                    $('#form-ketqua').html(data.html7);
                                    console.log('thành công');
                                    },
                                    error: function (data) {
                                    // Handle error response from server
                                    console.log('sai');
                                    }
                                    });
                                    }
                                    
                                 </script>
                              </div>
                           </aside>
                        </div>
                     </div>
                     <div class="filter-container__selected-filter position-relative d-none order-lg-2 rounded-10 p-2 mb-3">
                        <div class="filter-container__selected-filter-header d-flex clearfix pt-1 pb-1">
                           <b class="filter-container__selected-filter-header-title text-white position-relative">Lọc theo:</b>
                        </div>
                        <ul class="filter-container__selected-filter-list pl-0 m-0 list-unstyled d-block w-100 position-relative clearfix"></ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <script>
      var colId = 2921522;
      var selectedViewData = 'data';
      var isFilterRange = true;
   </script>
</div>
<style>
   .pagenav{
   width: 100% !important;
   display: flex !important;
   justify-content: center !important;
   padding: 40px 0 !important;
   }
   .pagenav ul.pagination{
   background-color: rgb(255 255 255) !important;
   display: flex !important;
   list-style: none !important;
   }
   .pagenav ul.pagination li span{
   height:41px !important;
   width: 35px!important;
   display: flex;
   justify-content: center!important;
   align-items: center!important;
   }
   .pagenav .pagination a{
   height:41px!important;
   width: 35px!important;
   display: flex!important;
   justify-content: center!important;
   align-items: center!important;
   }
   .pagenav .pagination a:hover{
   background-color: #847467!important;
   color: antiquewhite!important;
   }
   .pagenav li.active{
   background-color: #847467!important;
   color: antiquewhite!important;
   }
</style>
@endsection