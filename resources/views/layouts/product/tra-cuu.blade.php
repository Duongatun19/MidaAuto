@if (isset($customerService))
@php
$imgs = json_decode($customerService->avatar);
$name = json_decode($customerService->name);
$content = json_decode($customerService->content);
@endphp
<div class="row ketquatracuu">
   <div class="col-md-12 mb-4">
      <h5 class="text-uppercase"><span style="color: #ff6600;">Kết quả tra cứu bảo hành</span></h5>
   </div>
   <div class="col-md-6">
      <table class="table table-striped">
         @foreach ($imgs as $img)
         <img src="{{$img}}" alt="" data-fancybox="gallery">
      @endforeach
        
      </table>
   </div>
   <div class="col-md-6">
      <table class="table table-striped">
         @foreach ($name as $item)
         <tr>
            <td style="font-weight: 600;">{{$item->title}}</td>
            <td>{{$item->detail}}</td>
         </tr>
      @endforeach
         @foreach ($content as $item)
            <tr>
               <td style="font-weight: 600;">{{$item->title}}</td>
               <td>{{$item->detail}}</td>
            </tr>
         @endforeach
      </table>
   </div>
   
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
</div>
@else
<div class="container">
   <div class="col-md-12 mb-4">
      <h5 class="text-uppercase"><span style="color: #ff6600;">Không có kết quả nào phù hợp</span></h5>
   </div>
</div>
@endif