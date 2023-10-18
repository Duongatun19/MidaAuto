@extends('layouts.main.master')
@section('title')
{{languageName($product->name)}}
@endsection
@section('description')
{{languageName($product->description)}}
@endsection
@section('image')
@php
$imgs = json_decode($product->images);
$priceDiscount = $product->price - $product->price * ($product->discount / 100);
@endphp
{{url(''.$imgs[0])}}
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/product_style.scss.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/swatch_style.scss.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/mew_style_first.scss.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/swiper.scss.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/button.css')}}">
@endsection
@section('js')
<script src="{{asset('frontend/js/swiper.js')}}"></script>
<script src="{{asset('frontend/js/mew_color.js')}}"></script>
<script src="{{asset('frontend/js/mew_content.js')}}"></script>
<script src="{{asset('frontend/js/mew_hide_unvaiable_option.js')}}"></script>
<script src="{{asset('frontend/js/mew_option_selectors.js')}}"></script>
<script src="{{asset('frontend/js/mew_product.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/papa.js')}}"></script>
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
                       <a href="{{route('allProduct')}}" title="Tất cả sản phẩm">Tất cả sản phẩm</a>						
                       <span class="slash-divider ml-2 mr-2">/</span>
                   </li>
                   <li>
                     <a href="{{route('allListProCate',['danhmuc'=>$product->cate->slug])}}" title="{{languageName($product->cate->name)}}">{{languageName($product->cate->name)}}</a>						
                     <span class="slash-divider ml-2 mr-2">/</span>
                 </li>
                   <li ><span>{{languageName($product->name)}}</span>
                   <li>
               </ul>
           </div>
       </div>
       <div itemscope itemtype="http://schema.org/Product">
           <meta itemprop="category" content="Flash Sale">
           <meta itemprop="url" content="//mew-mobile.mysapo.net/xiaomi-redmi-note-11-pro-plus-5g">
           <meta itemprop="name" content="{{languageName($product->name)}}">
           <meta itemprop="image" content="http://bizweb.dktcdn.net/thumb/grande/100/459/533/products/11-pro-plus-green-1.jpg?v=1660672160733">
          
           <div class="d-none" itemprop="brand" itemtype="https://schema.org/Brand" itemscope>
               <meta itemprop="name" content="Xiaomi" />
           </div>
           <meta itemprop="model" content="">
           <div class="d-none hidden" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
               <div class="inventory_quantity hidden" itemscope itemtype="http://schema.org/ItemAvailability">
                   <span class="a-stock" itemprop="supersededBy">
                   Còn hàng
                   </span>
               </div>
               <link itemprop="availability" href="http://schema.org/InStock">
               <meta itemprop="priceCurrency" content="VND">
               <meta itemprop="price" content="{{number_format($product->price)}}">
               <meta itemprop="url" content="https://mew-mobile.mysapo.net/xiaomi-redmi-note-11-pro-plus-5g">
               <span itemprop="UnitPriceSpecification" itemscope itemtype="https://schema.org/Downpayment">
                   <meta itemprop="priceType" content="{{number_format($product->price)}}">
               </span>
               <span itemprop="UnitPriceSpecification" itemscope itemtype="https://schema.org/Downpayment">
                   <meta itemprop="priceSpecification" content="9500000">
               </span>
               <meta itemprop="priceValidUntil" content="2099-01-01">
           </div>
         
           <div class="container mt-3 mb-3">
               <div class="rounded p-2 p-md-3 bg-white">
                   <section class="product-layout product-layout2 ">
                       <div class="row">
                           <div class="col-12 h_pr mb-3">
                               <h1 class="product-name font-weight-bold mb-2 d-inline-flex mr-3">{{languageName($product->name)}}</h1>
                               {{-- <label class="align-items-center border compare-label d-inline-flex m-0 position-relative px-2 py-1 rounded-10">
                               <input type="checkbox" class="compare-checkbox d-none" value="/xiaomi-redmi-note-11-pro-plus-5g" data-type="Android"> 
                               <span class="compare-checkbox mr-1 position-relative"></span>
                               So sánh
                               </label> --}}
                           </div>
                           <div class="product-layout_col-left col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 mb-3">
                               <div class="product-main-slide swiper-container mb-3">
                                   <div class="swiper-wrapper">
                                    @foreach ($imgs as $img)
                                       <div class="swiper-slide ">
                                          <picture class="position-relative d-block aspect ratio1by1 modal-open rounded">
                                             <source media="(min-width: 1200px)" srcset="{{$img}}">
                                             <source media="(min-width: 575px)" srcset="{{$img}}">
                                             <img src="{{$img}}" alt="Xiaomi Redmi Note 11 Pro Plus 5G" class="d-block m-auto img position-absolute img-contain gradient-load" data-zoom-image="{{$img}}"/>
                                          </picture>
                                       </div>
                                    @endforeach
                                    
                                       <div class="swiper-button-prev mew_product_main-slide_prev"></div>
                                       <div class="swiper-button-next mew_product_main-slide_next"></div>
                                   </div>
                               </div>
                               <div class="product-thumb-slide swiper-container ">
                                   <div class="swiper-wrapper">
                                    @foreach ($imgs as $img)
                                       <div class="swiper-slide m_thumb_pl border rounded modal-open crp ">
                                          <div class="position-relative w-100 m-0 ratio1by1 aspect">
                                             <img src="{{$img}}" data-img="{{$img}}" alt="Xiaomi Redmi Note 11 Pro Plus 5G" class="d-block img position-absolute w-100 h-100">
                                          </div>
                                       </div>
                                    @endforeach
                                    
                                   </div>
                               </div>
                           </div>
                           <div class="product-layout_col-right col-12 col-sm-12 col-md-7 col-lg-7 col-xl-5 product-warp">
                            
                               <div class="product-price font-weight-bold pt-2 pb-2 pl-3 pr-3 rounded mb-2">
                                   <span class="special-price m-0">{{number_format($priceDiscount)}}₫</span>
                                   <del class="old-price ml-2">{{number_format($product->price)}}₫</del>
                               </div>
                               <div class="m_giftbox mb-3">
                                <fieldset class="free-gifts p-3 pb-4 pb-md-3 rounded position-relative">
                                    <legend class="d-inline-block pl-3 pr-3 mb-0">
                                        <img alt="Code Ưu Đãi" src="//bizweb.dktcdn.net/thumb/icon/100/459/533/themes/868331/assets/gift.gif?1676652384879"> Code Ưu Đãi
                                    </legend>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-12">
                                            <div class="item line_b pb-2 ">
                                                <span class="mb-2 d-block"><small> Giảm ngay 120k (áp dụng cho các đơn hàng trên 500k)</small>
                                               
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-12">
                                            <div class="item line_b pb-2 none_mb">
                                                <span class="mb-2 d-block"><small> Giảm ngay 20% tổng giá trị đơn hàng trên 1000k. Số lượng có hạn</small>
                                              
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-12">
                                            <div class="item line_b pb-2 none_mb">
                                                <span class="mb-2 d-block"><small> <b>FREESHIP</b> đơn hàng từ 500k</small>
                                               
                                                </span>
                                            </div>
                                        </div>
                                        <div class="position-absolute vmore_c w-100 d-md-none">
                                            <a href="javascript:;" class="d-block v_more_coupon text-center font-weight-bold">
                                            <span class="t1">Xem thêm mã ưu đãi</span>
                                            <span class="t1 d-none">Thu gọn</span>
                                            </a>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                               <form >
                              
                                   <div id="o_sw_buy" class="mobile_open_box_swatch">
                                       <div class="d-flex align-items-start flex-column">
                                           <div class="product-control w-100">
                                               <div class="product-quantity d-sm-flex align-items-center clearfix">
                                                   <header class="font-weight-bold mb-2" style="min-width: 100px;">Số lượng </header>
                                                   <div class="custom-btn-number form-inline border-0">
                                                       <button class="mr-2 mb-2 border rounded bg-white justify-content-center align-items-center d-flex" onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro &gt; 1 ) result.value--;return false;" type="button">
                                                           <svg width="12" height="12">
                                                               <use href="#svg-minus" />
                                                           </svg>
                                                       </button>
                                                       <button class="mr-2 mb-2 border rounded bg-white justify-content-center align-items-center d-flex" onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;" type="button">
                                                           <svg width="14" height="14">
                                                               <use href="#svg-plus" />
                                                           </svg>
                                                       </button>
                                                       <input type="number"  name="quantity" min="1" value="1" class="form-control prd_quantity border rounded mb-2" id="qtym">
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="pt-2 pb-2 mb-2 d-flex gap_8 mxs_100">
                                           
                                           <button data-url="{{route('addToCart',['id'=>$product->id])}}" type="button" class=" add_to_cart btn d-flex w-100 justify-content-center flex-column align-items-center rounded pt-2 pb-2 product-action_buynow sitdown modal-open position-relative">
                                            
                                            <i class="fa-solid fa-cart-plus"></i>
                                            <small class="ml-2 mr-2 button__text">Thêm vào giỏ</small>
                                        </button>
                                        <button onclick="window.location.href='{{route('checkoutluon',['id'=>$product->id])}}'" type="button" class="btn d-flex w-100 justify-content-center flex-column align-items-center rounded pt-2 pb-2 product-action_buynow sitdown modal-open position-relative">
                                            
                                            <i class="fa-regular fa-credit-card"></i>
                                            <small class="ml-2 mr-2 button__text">Mua Ngay</small>
                                        </button>

                                        <button style="    background-color: green !important; color:white" onclick="window.location.href='tel:{{$setting->phone1}}'" type="button" class="btn d-flex w-100 justify-content-center flex-column align-items-center rounded pt-2 pb-2  sitdown modal-open position-relative">
                                            <span class="text-uppercase font-weight-bold">Liên hệ</span>
                                       
                                        </button>
                                           <script>
                                            $('.add_to_cart').click(function (e) { 
                                                e.preventDefault();
                                                var url = $(this).data('url');
                                                var quantity = $('input[name="quantity"]').val();
                                                $.ajax({
                                                    type: "get",
                                                    url: url,
                                                    data: {
                                                        quantity :quantity,
                                                    },
                                                    success: function (data) {
                                                       $('.count-item').html(data.html2);
                                                       $.notify("Thêm vào giỏ hàng thành công", "success"
			                                                    );
                                                    
                                                    }
                                                });
                                            });
                                        </script>
                                       </div>
                                   </div>
                                   <div class="product-summary small mb-3">
                                     {!!languageName($product->description)!!}
                                   </div>
                                   <div class="fix-phone p-1 p-lg-2 pt-lg-3 pb-lg-3" id="mb_bar">
                                       <a href="tel:19006750" title="Gọi mua hàng" class="mt-lg-1 ml-1 mb-lg-1 mr-1 ml-lg-0 mr-lg-0 phone-box d-flex align-items-center justify-content-center">
                                           <svg width="24" height="24" class="play0">
                                               <use href="#svg-phone" />
                                           </svg>
                                       </a>
                                       <a href="https://m.me/mewtheme" title="Chat Facebook" target="_blank" class="mt-lg-1 ml-1 mb-lg-1 mr-1 ml-lg-0 mr-lg-0 fb-box d-flex align-items-center justify-content-center rounded-circle">
                                           <svg width="28" height="28">
                                               <use href="#svg-messenger" />
                                           </svg>
                                       </a>
                                       <a href="https://zalo.me/{{$setting->phone1}}" title="Chat Zalo" target="_blank" class="mt-lg-1 ml-1 mb-lg-1 mr-1 ml-lg-0 mr-lg-0 zalo-box d-flex align-items-center justify-content-center">
                                           <svg width="32" height="32">
                                               <use href="#svg-zalo" />
                                           </svg>
                                       </a>
                                       {{-- <a href="/so-sanh" title="So sánh" class="d-none d-lg-flex mt-lg-1 ml-1 mb-lg-1 mr-1 ml-lg-0 mr-lg-0 js-compare-button js-notify-container zalo-box align-items-center justify-content-center">
                                           <svg width="24" height="24">
                                               <use href="#svg-compare" />
                                           </svg>
                                           <span class="position-absolute rounded-circle text-center font-weight-bold">0</span>
                                       </a> --}}
                                       <a href="javascript:;" title="Chia sẻ kết quả so sánh này" class="d-none d-lg-flex mt-lg-1 ml-1 mb-lg-1 mr-1 ml-lg-0 mr-lg-0 js-compare-share zalo-box align-items-center justify-content-center">
                                           <svg width="19" height="19">
                                               <use href="#svg-shareCompare" />
                                           </svg>
                                       </a>
                                   </div>
                                   {{-- <div class="mew_mobi_bar d-lg-none position-fixed d-flex modal-open">
                                       <a id="js-menu-toggle" href="javascript:;" title="Danh mục" class="item align-content-center d-flex flex-column h-100 justify-content-center ">
                                           <svg width="20" height="20">
                                               <use href="#svg-menu" />
                                           </svg>
                                           <span class="tit d-block font-weight-bold text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">Danh mục</span>
                                       </a>
                                       <a href="/so-sanh" title="So sánh" class="item align-content-center d-flex flex-column h-100 justify-content-center js-notify-container">
                                           <svg width="20" height="20">
                                               <use href="#svg-compare" />
                                           </svg>
                                           <span class="tit font-weight-bold d-block text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">So sánh <b class="js-compare-button"><span class="tit">0</span></b></span>
                                       </a>
                                       <a class="item d-flex flex-column p-1 align-items-center justify-content-center btn-cart position-relative  " title="Giỏ hàng" href="/cart">
                                           <span class="position-relative flex-column d-flex">
                                               <svg width="20" height="20">
                                                   <use href="#svg-cart" />
                                               </svg>
                                               <span class="tit d-block font-weight-bold text-center pr-1 pr-sm-2 pl-1 pl-sm-2 pt-1">Giỏ hàng</span>
                                               <span class="btn-cart-indicator position-absolute d-none text-center"></span>
                                           </span>
                                       </a>
                                       <a title="Chọn mua" href="javascript:;" id="o_sw_buys" class="btn d-flex text-white justify-content-center flex-row align-items-center rounded-0 product-action_buynow modal-open font-weight-bold open_sw_mobile">
                                       <span class="ml-2 mr-2">Chọn mua</span>
                                       </a>	
                                   </div> --}}
                               </form>
                           </div>
                           <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 product-warp">
                               <div class="linehot_pro alert alert-warning mb-3 d-flex align-items-center rounded-10">
                                   <img class="mr-3 lazy" alt="{{$setting->phone1}}" src="//bizweb.dktcdn.net/100/459/533/themes/868331/assets/placeholder_1x1.png?1676652384879" data-src="//bizweb.dktcdn.net/100/459/533/themes/868331/assets/customer-service.png?1676652384879">
                                   <div class="b_cont font-weight-bold">
                                       <span class="d-block">
                                       Gọi ngay <a href="tel:{{$setting->phone1}}" title="{{$setting->phone1}}">{{$setting->phone1}}</a> để được tư vấn tốt nhất!
                                       </span> 
                                   </div>
                               </div>
                               <div class="product-info position-relative mb-3 p-2 border rounded-10">
                                   <span class="in_1">
                                   Tình trạng:
                                   <span class="inventory_quantity">Còn hàng</span>
                                   </span>
                                   {{-- <div class="in_1">
                                       Thương hiệu: <span id="vendor">Xiaomi</span>
                                   </div> --}}
                                   <div class="in_1">Loại: <span id="type">{{languageName($product->cate->name)}}</span></div>
                               </div>
                               <div class="product-info position-relative mb-3 p-2 border rounded-10">
                                <span class="in_1 tran-tun">
                                Chính sách
                               
                                </span>
                                <ul class="links">
                                    @foreach ($helpCustomFooter as $item)
                                    <li><a href="{{route('pagecontent',['slug'=>$item->slug])}}" title="{{$item->title}}">{{$item->title}}</a></li>
                                    @endforeach
                                   
                                 </ul>
                            </div>
                            <div class="product-info position-relative mb-3 p-2 border rounded-10">
                                <span class="in_1 tran-tun">
                                Liên hệ tư vấn
                                </span>
                                <ul class="links">
                                   @if($setting->phone1 != '')
                                  <li style="list-style: none"><i class="fa-solid fa-phone"></i> <a href="tel:+{{$setting->phone1}}">{{$setting->phone1}}</a></li>
                                  @endif
                                  @if($setting->phone2 != '')
                                  <li style="list-style: none"><i class="fa-solid fa-phone"></i> <a href="tel:+{{$setting->phone2}}">{{$setting->phone2}}</a></li>
                                  @endif
                          
                                   
                                 </ul>
                          
                           </div>
                           <div class="product-info position-relative mb-3 p-2 border rounded-10">
                            <span class="in_1 tran-tun">
                            Địa chỉ mua hàng:
                            </span>
                            <ul class="links">
                               @if($setting->address1 != '')
                              <li style="list-style: none"><i class="fa-solid fa-map-location"></i></i> <a href="tel:+{{$setting->address1}}">{{$setting->address1}}</a></li>
                              @endif
                              @if($setting->address2 != '')
                              <li style="list-style: none"><i class="fa-solid fa-map-location"></i></i> <a href="tel:+{{$setting->address2}}">{{$setting->address2}}</a></li>
                              @endif
                             </ul>
                       </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-4 col-lg-3 col-12 order-lg-2 mb-3">
                               <div class="p-2 box_shadow rounded-10 modal-open spec-tables">
                                   <h3 class="special-content_title font-weight-bold d-block w-100 p-2 mb-2 button-custom">Thông số kỹ thuật</h3>
                                   <div class="border rounded-10 small modal-open">
                                       <div class="special-content">
                                          @php
                                              $thongso = json_decode($product->size)
                                          @endphp
                                          @foreach ($thongso as $info)
                                             <h4>{{$info->title}}</h4>
                                             <table border="1" cellpadding="1" cellspacing="1">
                                                <tbody>
                                                   <tr>
                                                        
                                                         <td>{{$info->detail}}</td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          @endforeach
                                       </div>
                                   </div>
                                   <a href="javascript:;" title="Xem chi tiết cấu hình" class="view_table box_shadow rounded-10 modal-open d-block p-2 small mb-2 mt-3 text-center font-weight-bold" data-bs-toggle="modal" data-bs-target="#specModal">Xem chi tiết cấu hình</a>
                               </div>
                           </div>
                           <div class="col-md-8 col-lg-9 col-12 order-lg-1">
                               <div class="p-2 box_shadow rounded-10 modal-open pl-lg-3 pr-lg-3 mb-3">
                                   <h3 class="special-content_title font-weight-bold d-block w-100 pt-2 pb-2 mb-0">Thông tin chi tiết</h3>
                                   <div class="product-content pt-2 pb-2 mewcontent">
                                    <div class="content_coll position-relative rte">
                                       {!!languageName($product->content)!!}
                                    </div>
                                       <div class="view_mores text-center mb-2">
                                           <a href="javascript:;" class="one pt-2 pb-2 pl-4 pr-4 modal-open position-relative btn rounded-10 box_shadow font-weight-bold" title="Xem tất cả">Xem tất cả <img class="m_more" src="//bizweb.dktcdn.net/thumb/pico/100/459/533/themes/868331/assets/sortdown.png?1676652384879" alt="Xem tất cả"></a>
                                           <a href="javascript:;" class="two pt-2 pb-2 pl-4 pr-4 modal-open position-relative btn rounded-10 box_shadow font-weight-bold d-none" title="Thu gọn">Thu gọn <img class="m_less" src="//bizweb.dktcdn.net/thumb/pico/100/459/533/themes/868331/assets/sortdown.png?1676652384879" alt="Thu gọn"></a>
                                       </div>
                                   </div>
                               </div>
                               @if(count($productlq)>1)
                               <div class="m_product p-2 box_shadow rounded-10 modal-open pl-lg-3 pr-lg-3">
                                   <h3 class="special-content_title pb-2 pt-2 font-weight-bold position-relative mb-1">
                                       <a class="position-relative" href="javascript:;" title="Sản phẩm liên quan">Sản phẩm liên quan</a>
                                       <span class="swiper-button-prev mre_prev"></span>
                                       <span class="swiper-button-next mre_next"></span>
                                   </h3>
                                   <div class="b_product p-1 swiper-container position-relative relate">
                                       <div class="swiper-wrapper">
                                          @foreach ($productlq as $pro)
                                          @if($product->id != $pro->id)
                                             <div class="swiper-slide">
                                                @include('layouts.product.item',['product'=>$pro])
                                             </div>
                                             @endif
                                          @endforeach
                               
                                       </div>
                                   </div>
                               </div>
                               @endif
                               <script>
                                   window.addEventListener('DOMContentLoaded', (event) => {
                                      var swiperRelateProduct = new Swiper('.b_product', {
                                         spaceBetween: 10,
                                         loop: false,
                                         autoplay:true,
                                         speed: 1000,
                                         navigation: {
                                            nextEl: '.mre_next',
                                            prevEl: '.mre_prev',
                                         },
                                         breakpoints: {
                                            320: {
                                               slidesPerView: 1
                                            },
                                            576: {
                                               slidesPerView: 1
                                            },
                                            768: {
                                               slidesPerView: 1
                                            },
                                            992: {
                                               slidesPerView: 3
                                            },
                                            1200: {
                                               slidesPerView: 4
                                            }
                                         }
                                      });
                                   });
                               </script>					
                           </div>
                       </div>
                   </section>
               </div>
           </div>
       </div>
       <div class="modal fade" id="specModal" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
               <div class="modal-content modal-open rounded-10">
                   <div class="modal-header">
                       <h5 class="modal-title fw-bold">Thông số kỹ thuật</h5>
                       <button type="button" class="btn btn-close rounded-10" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   </div>
                   <div class="modal-body max-height-popup"></div>
               </div>
           </div>
       </div>
   
   </div>
@endsection