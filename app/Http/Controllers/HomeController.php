<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\banner;
use App\Models\offer;
use App\Models\gallery;
use App\Models\video;
use App\Models\restaurent_category;
use App\Models\restaurent_item;
use App\Models\shop;
use App\Models\testimonial;
use App\Models\tables_booking;
use App\Models\booking_table;
use DB,Session;

class HomeController extends Controller
{
    public function index()
    {
        $shop=shop::select('id')->orderBy('id','ASC')->limit(1)->first();
        $shopid=$shop->id; 
        $shopsid=Session::put('shopid',$shopid);
        $banner1=banner::where('added_by',$shopid)->orderBy('id','DESC')->limit(1)->first();
        $banner=banner::where('added_by',$shopid)->where('id','!=',$banner1->id)->latest()->get();
        $offers=offer::where('added_by',$shopid)->latest()->get();
         $offer_products=restaurent_item::where('added_by',$shopid)->where('is_offer','Yes')->latest()->get();
        $gal=gallery::where('added_by',$shopid)->limit(4)->latest()->get();
        $testi=testimonial::where('added_by',$shopid)->latest()->get();
        $vid=video::where('added_by',$shopid)->where('index_visibility','Yes')->first();
        return view('frontend.index',['banner1'=>$banner1,'banner'=>$banner,'offers'=>$offers,'offer_products'=>$offer_products,'gal'=>$gal,'testi'=>$testi,'vid'=>$vid]);
    }
    public function about()
    {
        $shopsid=Session::get('shopid');
        $testi=testimonial::where('added_by',$shopsid)->latest()->get();
        $vid=video::where('added_by',$shopsid)->where('index_visibility','Yes')->first();
        return view('frontend.about',['testi'=>$testi,'vid'=>$vid]);
    }

    public function contact()
    {
        $shops=shop::get();
        return view('frontend.contact',['shops'=>$shops]);
    }

    public function gallery()
    {
        $shopsid=Session::get('shopid');
        $gallery=gallery::where('added_by',$shopsid)->latest()->get();
        $video=video::where('added_by',$shopsid)->latest()->get();
        return view('frontend.gallery',['gallery'=>$gallery,'video'=>$video]);
    }

    public function menu()
    {
        $shopsid=Session::get('shopid');
        $cat=restaurent_category::where('added_by',$shopsid)->orderBy('disp_order','ASC')->get();
        return view('frontend.menu',['cat'=>$cat]);
    }

    public function menu_type($menu)
    {
        $shopsid=Session::get('shopid');
        $cat=restaurent_category::where('added_by',$shopsid)->orderBy('disp_order','ASC')->get();
        return view('frontend.menu_types',['cat'=>$cat,'menu'=>$menu]);
    }

    public function book_table(Request $req)
    {
         $shopsid=Session::get('shopid');
         $specific_time = $req->btime;
        $timestamp = strtotime($specific_time);
        $new_timestamp = $timestamp + 3600;
        $new_time_formatted = date('Y-m-d H:i:s', $new_timestamp);

        $tabcnt=booking_table::where('added_by',$shopsid)->where('status','Active')->count();
        $bkcnt = tables_booking::where('restaurent_id', $shopsid)
            ->where('book_date', $req->bdate)
            ->where(function ($query) use ($req) {
                $userChosenTime = $req->btime;
                
                $query->where('book_time', '<=', $userChosenTime)
                      ->where('expiry', '>=', $userChosenTime);
            })
            ->where('status', 'Active')
            ->sum('tables');
        if($bkcnt>=$tabcnt)
        {
         $data['err']="error";   
        }
        else
        {
        tables_booking::create([

            'name'=>$req->bname,
            'mobile'=>$req->bmobile,
            'email'=>$req->bmail,
            'note'=>$req->bnote,
            'persons'=>$req->bperson,
            'book_date'=>$req->bdate,
            'tables'=>1,
            'book_date'=>$req->bdate,
            'book_time'=>$req->btime,
            'expiry'=>$new_time_formatted,
            'restaurent_id'=>$shopsid,
            'status'=>'Active',

        ]);
        $data['success']="success";
    }
        echo json_encode($data);
    }


    /////////////////////


    public function index1()
    {
        $shop=shop::select('id')->orderBy('id','DESC')->limit(1)->first();
        $shopid=$shop->id;
        $shopsid=Session::put('shopid',$shopid); 
        $banner1=banner::where('added_by',$shopid)->orderBy('id','DESC')->limit(1)->first();
        $banner=banner::where('added_by',$shopid)->where('id','!=',$banner1->id)->latest()->get();
        $offers=offer::where('added_by',$shopid)->latest()->get();
        $offer_products=restaurent_item::where('added_by',$shopid)->where('is_offer','Yes')->latest()->get();
        $gal=gallery::where('added_by',$shopid)->limit(4)->latest()->get();
        $testi=testimonial::where('added_by',$shopid)->latest()->get();
        $vid=video::where('added_by',$shopid)->where('index_visibility','Yes')->first();
        return view('frontend.index1',['banner1'=>$banner1,'banner'=>$banner,'offers'=>$offers,'offer_products'=>$offer_products,'gal'=>$gal,'testi'=>$testi,'vid'=>$vid]);
    }
    public function about1()
    {
        $shopsid=Session::get('shopid');
        $testi=testimonial::where('added_by',$shopsid)->latest()->get();
        $vid=video::where('added_by',$shopsid)->where('index_visibility','Yes')->first();
        return view('frontend.about1',['testi'=>$testi,'vid'=>$vid]);
    }

    public function contact1()
    {
        $shops=shop::get();
        return view('frontend.contact1',['shops'=>$shops]);
    }

    public function gallery1()
    {
        $shopsid=Session::get('shopid');
        $gallery=gallery::where('added_by',$shopsid)->latest()->get();
        $video=video::where('added_by',$shopsid)->latest()->get();
        return view('frontend.gallery1',['gallery'=>$gallery,'video'=>$video]);
    }

    public function menu1()
    {
        $shopsid=Session::get('shopid');
        $cat=restaurent_category::where('added_by',$shopsid)->orderBy('disp_order','ASC')->get();
        return view('frontend.menu1',['cat'=>$cat]);
    }

    public function menu_type1($menu)
    {
        $shopsid=Session::get('shopid');
        $cat=restaurent_category::where('added_by',$shopsid)->orderBy('disp_order','ASC')->get();
        return view('frontend.menu_types1',['cat'=>$cat,'menu'=>$menu]);
    }
}
