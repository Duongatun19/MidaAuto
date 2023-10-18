<div class="category-products position-relative mt-3 mb-3">
   <div class="row slider-items">
      @foreach ($product as $pro)
      <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 product-grid-item-lm mb-3 ">
         @include('layouts.product.item',['product'=>$pro])
      </div>
      @endforeach
   </div>
</div>