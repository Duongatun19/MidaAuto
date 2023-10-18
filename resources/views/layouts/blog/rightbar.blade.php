<h3 class="h3-custom">Blog news</h3>
@foreach ($blognew as $item)
   <article class="blog-item-list clearfix mb-3 row">
      <div class="col-4 col-lg-3 pr-0 pl-md-0">
         <a href="{{route('detailBlog',['slug'=>$item->slug])}}" class=" d-block modal-open thumb_img_blog_list thumb rounded" > 
         <span class="modal-open position-relative d-block w-100 m-0 ratio3by2 has-edge aspect zoom">
         <img src="{{$item->image}}" data-src="{{$item->image}}" decoding="async" alt="{{languageName($item->title)}}" class="lazy d-block img img-cover position-absolute">
         </span>
         </a>
      </div>
      <div class="blogs-rights col-8 col-lg-9">
         <h3 class="blog-item-name font-weight-bold mb-1 title_blo">
            <a class="line_1" href="{{route('detailBlog',['slug'=>$item->slug])}}">{{languageName($item->title)}}</a>
         </h3>
    
         <div class="sum line_2 h-auto text-justify">
         {!!languageName($item->description)!!}
         </div>
      </div>
   </article>
@endforeach