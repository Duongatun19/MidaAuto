@extends('layouts.main.master')
@section('title')
{{$title_page}} 
@endsection
@section('description')
{{$title_page}}
@endsection
@section('image')
{{url(''.$banners[0]->image)}}
@endsection
@section('css')
<link href="{{asset('frontend/css/blog_article_style.scss.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('frontend/css/sidebar_style.scss.css')}}" rel="stylesheet" type="text/css" />
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
                <li >Dịch vụ</li>
             </ul>
          </div>
       </div>
       <section class="blog-layout" itemscope itemtype="http://schema.org/Blog">
          <meta itemprop="name" content="Tin tức">
          <meta itemprop="description" content="">
          <div class="container mt-3 mb-3 lastest-articles">
             <div class="rounded p-3 bg-white">
                <div class="row">
                  
                   <div class="col-12 col-md-12">
                      @foreach ($serviceslist as $item)
                      {{-- @dd($item); --}}
                      @php
                          $img = json_decode($item->image);
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
                      @endforeach
                    
                   </div>
                   
                </div>
             </div>
          </div>
       </section>
       
    
    </div>

@endsection