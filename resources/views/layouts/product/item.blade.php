
@php
$img = json_decode($product->images);
$discountPrice = $product->price - $product->price * ($product->discount / 100);
@endphp
<div class="product-item position-relative mb-0 p-2 rounded-10 bg-white h-100 box_shadow">
   @if ($product->discount > 0)
      <div class="sale-label sale-top-right position-absolute font-weight-bold">Giảm 
      {{$product->discount}}% 
      </div>
   @endif
   <a href="{{route('detailProduct', ['cate'=>$product->cate_slug, 'slug'=>$product->slug])}}" class="thumb d-block modal-open position-relative" title="{{languageName($product->name)}}">
   <div class="position-relative w-100 m-0 ratio1by1 has-edge aspect zoom">
      <img src="{{$img[0]}}" data-src="{{$img[0]}}" decoding="async" class="d-block img img-cover position-absolute lazy" alt="{{languageName($product->name)}}">
   </div>
   </a>
   <div class="item-info mt-1 position-relative">
   {{-- <div class="clearfix">
      <div class="sold-module d-flex w-100 position-relative modal-open">
         <img src="//bizweb.dktcdn.net/100/459/533/themes/868331/assets/hot-sale.png?1676652384879" decoding="async" class="position-absolute" alt="Sắp cháy hàng">
         <div class="d-flex align-items-center justify-content-center sold text-uppercase position-absolute h-100 w-100">Sắp cháy hàng</div>
         <div class="remain modal-open position-absolute h-100" style="width:90%"></div>
      </div>
   </div> --}}
   <h3 class="item-title font-weight-bold">
      <a class="line_1" href="{{route('detailProduct', ['cate'=>$product->cate_slug, 'slug'=>$product->slug])}}" title="{{languageName($product->name)}}">
      {{languageName($product->name)}} 
      </a>
   </h3>
   @if ($product->price > 0 && $product->discount > 0)
      <div class="item-price mb-1">
         <span class="special-price font-weight-bold">{{number_format($discountPrice, 0,'','.')}}₫</span>
         <del class="old-price"> {{number_format($product->price, 0,'','.')}}₫</del>
      </div>
   @elseif($product->price > 0 && $product->discount == 0)
      <div class="item-price mb-1">
         <span class="special-price font-weight-bold">{{number_format($product->price, 0,'','.')}}₫</span>
      </div>
   @else
      <div class="item-price mb-1">
         <span class="special-price font-weight-bold">Liên hệ</span>
      </div>
   @endif
  
   </div>
</div>
