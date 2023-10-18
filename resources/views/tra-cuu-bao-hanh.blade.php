@extends('layouts.main.master')
@section('title')
Tra cứu bảo hành
@endsection
@section('description')
@endsection
@section('image')
{{url(''.$banners[0]->image)}}
@endsection
@section('js')
<script>
   $('.tra-cuu-new').click(function (e) { 
       e.preventDefault();
       var url = $(this).data('url');
       var phonexe =$('input[name="phonexe"]').val();
       var bienxe = $('input[name="bienxe"]').val();
       console.log(url);
       $.ajax({
           type: "POST",
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: url,
           data: {
               phonexe : phonexe,
               bienxe :bienxe,
           },
       
           success: function (data) {
            $('.ketquatracuu').html(data.html8);
           }
       });
       
   });
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
            <li >Tra cứu bảo hành</li>
         </ul>
      </div>
   </div>
   <section class="blog-layout box-tra-cuu-bao-hanh" itemscope itemtype="http://schema.org/Blog">
      <div class="container mt-3 mb-3 lastest-articles">
         <div class="rounded p-3 bg-white">
            <div class="content-tcbh">
               <h1 class="title-tcbh">
                  <span>Tra cứu thông tin bảo hành</span>
               </h1>
               <div class="form-tcbh">
                  <div class="form-tcbh-ct">
                     <div class="form-ct">
                        <label>Số điện thoại</label>
                        <input type="text"  name="phonexe" class="phonetcbh">
                     </div>
                     <div class="form-ct">
                        <label>Biển số xe</label>
                        <input type="text" name="bienxe" class="bienxe">
                     </div>
                     <div class="form-ct">
                        <button  class="tra-cuu-new" data-url="{{route('resultTraCuu')}}" >Tra cứu bảo hành</button>
                        <a href="{{route('home')}}">Quay lại trang chủ</a>
                     </div>
                     <div class="form-ct">
                        <div id="js-error" style="color:red"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   @if (session()->has('thongtinxe') )
   @foreach ($thongtinxe as $item)
   @php
   $imgs = isset($item['avatar']) ? json_decode($item['avatar']) : [];
   $name = isset($item['name']) ? json_decode($item['name']) : [];
   $content = isset($item['content']) ? json_decode($item['content']) : [];
   @endphp
   <div class="container ketquatracuu">
      <div class="row ">
         <div class="col-md-12 mb-4">
           
         </div>
         <div class="col-md-6">
            <table class="table table-striped">
               @foreach ($imgs as $img)
               <img style="height:300px" src="{{$img}}" alt="" data-fancybox="gallery">
               @endforeach
            </table>
         </div>
         <div class="col-md-6">
            <table class="table table-striped">
               <tr>
                  @foreach ($name as $na)
                  <td style="font-weight: 600;">{{$na->title}}</td>
                  <td>{{$na->detail}}</td>
                  @endforeach
               </tr>
               @foreach ($content as $item)
               <tr>
                  <td style="font-weight: 600;">{{$item->title}}</td>
                  <td>{{$item->detail}}</td>
               </tr>
               @endforeach
            </table>
         </div>
      </div>
   </div>
   @endforeach
   @else
   <div class="container">

   không có xe nào 
   </div>
@endif
   <style>
      .box-tra-cuu-bao-hanh .content-tcbh {
      padding: 20px 0px;
      }
      .box-tra-cuu-bao-hanh .content-tcbh .title-tcbh {
      width: 100%;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      justify-content: center;
      margin-bottom: 0;
      }
      .box-tra-cuu-bao-hanh .title-tcbh span {
      width: 428px;
      float: left;
      text-align: center;
      font-size: 22px;
      font-weight: 700;
      color: #fff;
      text-transform: uppercase;
      line-height: 47px;
      background: #f9ab0f;
      }
      .box-tra-cuu-bao-hanh .form-tcbh {
      width: 100%;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      justify-content: center;
      }
      .box-tra-cuu-bao-hanh .form-tcbh .form-tcbh-ct {
      width: 864px;
      float: left;
      border: solid 1px #f9ab0f;
      padding: 30px;
      padding-right: 218px;
      }
      .box-tra-cuu-bao-hanh .form-tcbh .form-ct {
      width: 100%;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: end;
      -ms-flex-pack: end;
      justify-content: flex-end;
      margin-bottom: 10px;
      }
      .box-tra-cuu-bao-hanh .form-tcbh .form-ct label {
      font-size: 14px;
      font-weight: 300;
      line-height: 40px;
      color: #222222;
      float: left;
      margin-right: 12px;
      width: 90px;
      text-align: right;
      }
      .box-tra-cuu-bao-hanh .form-tcbh .form-ct input {
      width: 428px;
      border: solid 1px #e1e1e1;
      border-radius: 5px;
      height: 40px;
      line-height: 40px;
      padding: 0px 10px;
      outline: none;
      }
      .box-tra-cuu-bao-hanh .form-tcbh .form-ct button {
      width: 210px;
      float: left;
      margin-right: 8px;
      line-height: 38px;
      border: solid 1px #f9ab0f;
      text-align: center;
      font-size: 14px;
      font-weight: 700;
      color: #fff;
      background: #f9ab0f;
      border-radius: 5px;
      }
      .box-tra-cuu-bao-hanh .form-tcbh .form-ct a {
      width: 210px;
      float: left;
      line-height: 38px;
      border: solid 1px #f9ab0f;
      text-align: center;
      font-size: 14px;
      font-weight: 700;
      color: #f9ab0f;
      background: #fff;
      border-radius: 5px;
      }
   </style>
</div>
@endsection