@extends('layouts.main.master')
@section('title')
Giới thiệu về {{$setting->company}}
@endsection
@section('description')
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
               <li >Giới thiệu</li>
            </ul>
         </div>
      </div>
      <section class="blog-layout" itemscope itemtype="http://schema.org/Blog">
         <meta itemprop="name" content="Tin tức">
         <meta itemprop="description" content="">
         <div class="container mt-3 mb-3 lastest-articles">
            <div class="rounded p-3 bg-white">
               <div class="row">
                 
                  <div class="col-12 col-md-7">
                    <h3 class="h3-custom">Giới thiệu</h3>
                    <div class="abcontent">
                     {!!$pageContent->content!!}
                     </div>
                  </div>
                  <div class="col-md-5 col-12">
                    {!!$setting->iframe_map!!}
                  </div>
               </div>
               <br>

               <div class="row bd" >
                  <div class="col-md-4 col-xs-12 flex-cus">
                     <div>
                        <i class="fa-solid fa-phone"></i>
                     </div>
                     <div>
                        {{$setting->phone1}}
                     </div>
                  </div>
                  <div class="col-md-4 col-xs-12 flex-cus">
                     <div>
                        <i class="fa-solid fa-envelope"></i>
                     </div>
                     <div>
                        {{$setting->email}}
                     </div>
                  </div>
                  <div class="col-md-4 col-xs-12 flex-cus">
                     <div><i class="fa-solid fa-location-dot"></i></div>
                     <div>{{$setting->address1}}</div>
               </div>
               </div>
            </div>
         </div>
      </section>
   </div>
@endsection