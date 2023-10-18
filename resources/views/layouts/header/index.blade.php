<div class="menubar w-100 text-right d-flex d-lg-none position-fixed align-items-center scroll_down ">
   <a href="{{route('home')}}" title="{{$setting->company}}" class="mr-auto ml-3">
   <img alt="{{$setting->company}}" src="{{$setting->logo}}" class="img-fluid mb_logo">
   </a> 
   </div>
   <div class="bg_head position-fixed w-100 scroll_down ">
 
   </div>
   <div>
     <img src="{{asset('frontend/images/banner-top.png')}}" alt="" srcset="">
   </div>
   <div class="col-left position-fixed d-flex flex-column pt-2 pb-2">
   <div class="container position-relative">
      <div class="row align-items-center">
         <div class="col-12 col-lg-3 d-none d-lg-block">
               <a href="{{route('home')}}" title="{{$setting->company}}" class="logo">
               <img alt="{{$setting->company}}" src="{{$setting->logo}}" class="img-fluid img-logo-cus">
               </a> 
         </div>
         <div class="col-12 col-lg-9">
               <div class="d-lg-flex align-items-center position-static pr-menu">
               <div class="mr-2 mr-xl-3 level0 position-relative cls">
                  <a href="{{route('tracuubaohanh')}}" title="Tra cứu bảo hành" class="align-items-center d-flex head_svg p-1 pl-xl-2 pr-xl-2 rounded-10">
                  <small class="title-tracuu">Tra cứu 
                  <b class="d-block">bảo hành</b>
                  </small>
                  </a>
               </div>
               <div class="search-block mr-3">
                  <form action="{{route('search_result')}}" method="post" class="js-search-form left-search position-relative mt-4 mt-lg-0 pt-2 pb-2 pt-lg-1 pb-lg-1">
                     @csrf
                     <input type="text" id="js-search-form" placeholder="Từ khoá..." value="" maxlength="70" name="keyword" class="rounded form-control pl-2 pl-lg-3 pr-5" autocomplete="off" required>
                     <input type="submit" class="border-0 position-absolute p-0">
                     <div class="w-100 position-absolute rounded searchResult px-2 d-none">
                           <div class="overflow-auto search-result-warpper">
                           <div class="d-block text-left h6 searchResult_products_text mt-2 p-2 rounded text-white">Sản phẩm (<span>0</span>)</div>
                           <div class="searchResult_products"></div>
                           <div class="d-block text-left h6 searchResult_articles_text mt-2 p-2 rounded text-white">Tin tức (<span>0</span>)</div>
                           <div class="searchResult_articles"></div>
                           <div class="d-block text-left h6 searchResult_pages_text mt-2 p-2 rounded text-white">Trang nội dung (<span>0</span>)</div>
                           <div class="searchResult_pages"></div>
                           <a href="/search?type=product&q=" class="btn border-0 rounded-0 w-100 my-0 all-result d-block mb-2 font-weight-bold">Xem tất cả kết quả</a>
                           </div>
                     </div>
                  </form>
               </div>
           
               <div class="info-block mr-3 title-tracuu">
                  <a href="tel:{{$setting->phone1}}" title="{{$setting->phone1}}" class="align-items-center d-flex">
                     <span class="play0 d-none d-xl-block">
                           <svg width="32" height="32">
                           <use href="#svg-phone" />
                           </svg>
                     </span>
                     <b><small >Gọi mua hàng</small> <br>{{$setting->phone1}}</b>
                  </a>
               </div>
               <div class="navigation-bottom mt-auto mt-lg-0 title-tracuu">
                  <div class="b_use d-none d-lg-flex align-items-stretch">
                
                     <a class=" p-1 btn-cart position-relative d-inline-flex head_svg justify-content-center align-items-center rounded-10" title="Giỏ hàng" href="{{route('listCart')}}">
                           <span class="b_ico_Cart text-center d-flex justify-content-center align-items-center position-relative">
                           <svg width="20" height="20" >
                              <use href="#svg-cart" />
                           </svg>
                     
                           <p class="count-item">{{count($cartcontent)}}</p>
                    
                           </span>
                           <small class="d-none d-xl-block ml-lg-1">Giỏ hàng</small>
                     </a>
                  </div>
               </div>
               </div>
         </div>
      </div>
   </div>
   </div>
   <div class="navigation-block mr-lg-auto d-none d-lg-block">
   <div class="container">
      <ul id="menu_pc" class="p-0 m-0 list-unstyled position-relative d-lg-flex">
         <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
            <a href="{{route('home')}}" title="Trang chủ" class="font-weight-bold d-block pt-1 pb-1 pl-lg-3 pr-lg-3 pr-2 position-relative ">
            Trang chủ
            </a>
         </li>
         &nbsp;  &nbsp;
         <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 mega">
            <a href="{{route('allProduct')}}" title="Sản phẩm" class="font-weight-bold d-block pt-1 pb-1  pr-4 js-checkMenu position-relative ">
            Sản phẩm
            <i class="down_icon align-items-center justify-content-center position-absolute d-none d-lg-block mg"></i>
            </a>
            <i class="js-submenu down_icon d-flex align-items-center justify-content-center position-absolute d-lg-none"></i>
            <ul class="lv1 list-group p-0 list-unstyled rounded">
               @foreach ($categoryhome as $cate)
                  <li class=" level1 pr-lg-2 pt-lg-2 pb-lg-2 pl-2 position-relative cls d-flex">
                     <span>
            
                     <img src="{{$cate->avatar}}" alt="" srcset="" width="30px" height="30px">
                     <strong>
                        &nbsp;
                     <a href="{{route('allListProCate', ['danhmuc'=>$cate->slug])}}" class="pt-1 pb-1 pr-4 position-relative  js-checkMenu" title="{{languageName($cate->name)}}">
                     {{languageName($cate->name)}}
                     </a>
                  </strong>
                                 
                  </span>
                     @if (count($cate->typeCate) > 0)
                        <i class="js-submenu down_icon d-flex align-items-center justify-content-center position-absolute d-lg-none"></i>
                        <ul class="lv2 list-group p-0 list-unstyled rounded">
                           @foreach ($cate->typeCate as $type)
                              <li class="level2 "> 
                                    <a href="{{route('allListProType', ['danhmuc'=>$type->cate_slug, 'loaidanhmuc'=>$type->slug])}}" title="{{languageName($type->name)}}">{{languageName($type->name)}}</a>
                              </li>
                           @endforeach
                        </ul>
                     @endif
                  </li>
               @endforeach
            </ul>
         </li>
        
         <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
            <a href="{{route('aboutUs')}}" title="Giới thiệu" class="font-weight-bold d-block pt-1 pb-1 pl-lg-3 pr-lg-3 pr-2 position-relative ">
            Giới thiệu
            </a>
         </li>
         <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
            <a href="{{route('listAllService')}}" title="Dịch vụ" class="font-weight-bold d-block pt-1 pb-1 pl-lg-3 pr-4 js-checkMenu position-relative ">
            Dịch vụ
            <i class="down_icon align-items-center justify-content-center position-absolute d-none d-lg-block mg"></i>
            </a>
            <i class="js-submenu down_icon d-flex align-items-center justify-content-center position-absolute d-lg-none"></i>
            <ul class="lv1 list-group p-0 list-unstyled rounded">
               @foreach ($servicehome as $item)
                  <li class="no level1 pr-lg-2  pl-2 position-relative cls">
                     <a href="{{route('serviceDetail',['slug'=>$item->slug])}}" class="pt-1 pb-1 pr-4 position-relative  js-checkMenu" title="Phụ kiện di động">
                     {{$item->name}}
                     </a>
                  </li>
               @endforeach
          
            </ul>
         </li>
         <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
               <a href="{{route('tracuubaohanh')}}" title="Tra cứu bảo hành" class="font-weight-bold d-block pt-1 pb-1 pl-lg-3 pr-lg-3 pr-2 position-relative ">
               Tra cứu bảo hành
               </a>
         </li>
         
         <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
               <a href="{{route('allListBlog')}}" title="Tin tức" class="font-weight-bold d-block pt-1 pb-1 pl-lg-3 pr-lg-3 pr-2 position-relative active">
               Tin tức
               </a>
         </li>
         <li class="level0 position-relative cls pt-1 pt-lg-2 pb-lg-2 pb-1 ">
               <a href="{{route('lienHe')}}" title="Liên hệ" class="font-weight-bold d-block pt-1 pb-1 pl-lg-3 pr-lg-3 pr-2 position-relative ">
               Liên hệ
               </a>
         </li>
      </ul>
   </div>
   </div>
   <div class="col-left position-fixed d-flex flex-column pt-lg-2 pb-lg-2 pt-0 pb-0 d-lg-none" id="col-left-mew">
   <div class="align-items-center menu_mobile h-100 position-relative">
      <ul id="menu-mew" class="p-0 m-0 list-unstyled d-lg-flex justify-content-lg-end">
         <li class="level0 d-block w-100 position-static">
               <ul class="lv1 p-0 list-unstyled position-absolute m_chill m-0">
               <li class="level1 main position-sticky bg-white">
                  <a href="/dien-thoai" class="font-weight-bold d-flex pt-2 pb-2 border-bottom align-items-center w-100 justify-content-center text-main" title="Chi tiết danh mục">
                  Chi tiết danh mục
                  </a>
               </li>
               <li class="level1 position-relative">
                 
                  <ul class="lv2 d-flex list-unstyled flex-column pl-0">
                     <li class="level2 position-relative">
                           <a href="{{route('home')}}" class="h-100 d-flex pl-3 pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center" >
                         Trang chủ
                           </a>
                     </li>
                     <li class="level2 position-relative">
                           <a href="{{route('allListBlog')}}" class="h-100 d-flex pl-3 pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center" title="Từ 5 - 10 triệu">
                           Tin Tức
                           </a>
                     </li>
                     <li class="level2 position-relative">
                           <a href="{{route('tracuubaohanh')}}" class="h-100 d-flex pl-3 pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center" title="Tra cứu">
                           Tra cứu bảo hành
                           </a>
                     </li>
                     <li class="level2 position-relative">
                           <a href="{{route('listAllService')}}" class="h-100 d-flex pl-3 pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center" title="Dịch vụ">
                           Dịch vụ
                           </a>
                     </li>
                     <li class="level2 position-relative">
                           <a href="{{route('lienHe')}}" class="h-100 d-flex pl-3 pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center" title="Liên hệ">
                           Liên hệ
                           </a>
                     </li>
                      <li class="level2 position-relative">
                           <a href="{{route('aboutUs')}}" class="h-100 d-flex pl-3 pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center" title="">
                           Giới thiệu
                           </a>
                     </li>
                     <li class="level2 position-relative">
                        <a href="{{route('allProduct')}}" class="h-100 d-flex pl-3 pt-2 pb-2 border-bottom mr-2 ml-2 align-items-center" title="Sản phẩm">
                        Sản phẩm
                        </a>
                  </li>
                  </ul>
               </ul>
         </li>
         @foreach ($categoryhome as $cate)
            <li class="level0 d-block w-100 position-static">
                  <a href="{{route('allListProCate',['danhmuc'=>$cate->slug])}}" title="{{languageName($cate->name)}}" class="position-relative d-flex flex-column justify-content-center align-items-center text-center p-2">
                  <img class="lazy d-block pb-2 m-auto" src="{{$cate->avatar}}" data-src="{{$cate->avatar}}" alt="{{languageName($cate->name)}}">
                  <span class="line_1 line_2">{{languageName($cate->name)}}</span>
                  </a>
            </li>
         @endforeach
       
      </ul>
   </div>
</div>