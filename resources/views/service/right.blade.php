<h3 class="h3-custom">Dịch vụ khác</h3>
@foreach ($service_khac as $item)
@if($item->id != $detail_service->id)
@php
    $img = json_decode($item->image)
@endphp
<article class="blog-item-list clearfix mb-3 row">
    <div class="col-4 col-lg-3 pr-0 pl-md-0">
       <a href="{{route('serviceDetail',['slug'=>$item->slug])}}" class=" d-block modal-open thumb_img_blog_list thumb rounded" > 
       <span class="modal-open position-relative d-block w-100 m-0 ratio3by2 has-edge aspect zoom">
       <img src="{{$img[0]}}" data-src="{{$img[0]}}" decoding="async" alt="{{$item->name}}" class="lazy d-block img img-cover position-absolute">
       </span>
       </a>
    </div>
    <div class="blogs-rights col-8 col-lg-9">
       <h3 class="blog-item-name font-weight-bold mb-1 title_blo">
          <a class="line_1" href="{{route('serviceDetail',['slug'=>$item->slug])}}" style="text-transform: uppercase">{{$item->name}}</a>
       </h3>
       {{-- <div class="post-time small">{{$item->created_at}}</div> --}}
       <div class="sum line_2 h-auto text-justify">
        {!!languageName($item->description)!!}
       </div>
    </div>
 </article>
 @endif
@endforeach