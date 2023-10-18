<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\PageContent;
use Session;
use App\models\blog\Blog;

class PageContentController extends Controller
{
    public function detail($slug)
    {
        $data['blognew'] = Blog::where(['status'=>1, 'home_status'=>1])->orderBy('id', 'desc')->limit(10)->get(['id', 'title', 'slug', 'image','created_at','description']);
    	$language_current = Session::get('locale');
    	$data['pagecontentdetail'] = PageContent::where(['language'=>$language_current,'slug'=>$slug])->first();
    	return view('pageContent',$data);
    }
}
