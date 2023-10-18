<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\product\Category;
use App\models\product\Product;
use App\models\blog\Blog;
use Session;
use App\models\website\Partner;
use App\models\blog\BlogCategory;
use App\models\BannerAds;
use App\models\PageContent;
use  App\models\ReviewCus;
use App\models\website\Prize;

class HomeController extends Controller
{
    public function home()
    {
        $data['bannerAds'] = BannerAds::where('status',1)->get(['name','image','id']);
        $data['partner'] = Partner::where(['status'=>1])->get(['id','image','name','link']);
        $data['prizes'] = Prize::where(['status'=>1])->get();
        $data['aboutUs'] = PageContent::where(['status'=>1, 'type'=>'ve-chung-toi', 'language'=>'vi'])->first();
        $data['saleHomeProduct'] = Product::where(['status'=>1, 'discountStatus'=>1])->where('discount', '>', 0)->orderBy('id', 'desc')->get(['id','category','name','discount','price','images','slug','cate_slug','type_slug']);
        $data['cateProHome'] = Category::with([
            'product' => function ($query) {
                $query->where('status',1)->orderBy('id','DESC')->select('id','category','name','discount','price','images','slug','cate_slug','type_slug'); 
            }
        ])->where('status',1)->orderBy('id','asc')->get(['id','name','imagehome','avatar','slug']);
        $data['homeBlog'] = Blog::where(['status'=>1, 'home_status'=>1])->orderBy('id', 'desc')->limit(5)->get(['id','title','image','description','created_at','slug','category']);
        return view('home',$data);
    }
}
