<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\banner;
use App\Models\offer;
use App\Models\gallery;
use App\Models\video;
use App\Models\testimonial;
use Illuminate\Support\Facades\File;

class AddOnController extends Controller
{
     public function banners()
    {
        $banner=banner::where('added_by',auth()->guard('shop')->user()->id)->latest()->get();
        return view('shop.addon.Banners',['banner'=>$banner]);
    }

     public function add_banner(Request $req)
    {
       
          $image = $req->file('img');
          $new_name = '/uploads/banner/'.time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('uploads/banner'), $new_name);

            banner::create([
                'title'=>$req->title,
                'heading'=>$req->h1,
                'sub_heading'=>$req->h2,
                'image'=>$new_name,
                'added_by'=>auth()->guard('shop')->user()->id,
            ]) ;
            $data['success']="success";
        echo json_encode($data);
       
    }

    public function edit_banner($bid)
    {
        $banner=banner::where('id',$bid)->first();
        return view('shop.addon.EditBanner',['banner'=>$banner]);
    }

    public function banner_edit(Request $req)
    {

        $ban=banner::where('id',$req->bid)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$ban->image;
        }
        else{
             $imgWillDelete = public_path() . '/uploads/banner/' . $ban->image;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = '/uploads/banner/'.time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/banner'), $new_name);
            //$ins['Photo']=$new_name;
        }


            banner::where('id',$req->bid)->update([
                'title'=>$req->title,
                'heading'=>$req->h1,
                'sub_heading'=>$req->h2,
                'image'=>$new_name,
            ]) ;
            $data['success']="success";
        echo json_encode($data);
       
    }

     public function delete_banner(Request $req)
    {
       
            banner::where('id',$req->body)->delete();
            $data['success']="success";
        echo json_encode($data);
       
    }

    /////

     public function offers()
    {
        $offers=offer::where('added_by',auth()->guard('shop')->user()->id)->latest()->get();
        return view('shop.addon.Offers',['offers'=>$offers]);
    }

     public function add_offer(Request $req)
    {
       
          $image = $req->file('img');
          $new_name = '/uploads/offer/'.time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('uploads/offer'), $new_name);

            offer::create([
                'title'=>$req->title,
                'image'=>$new_name,
                'added_by'=>auth()->guard('shop')->user()->id,
            ]) ;
            $data['success']="success";
        echo json_encode($data);
       
    }


    public function edit_offer($oid)
    {
        $offer=offer::where('id',$oid)->first();
        return view('shop.addon.EditOffer',['offer'=>$offer]);
    }

    public function offer_edit(Request $req)
    {

        $offer=offer::where('id',$req->oid)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$ban->image;
        }
        else{
             $imgWillDelete = public_path() . '/uploads/offer/' . $offer->image;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = '/uploads/offer/'.time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/offer'), $new_name);
            //$ins['Photo']=$new_name;
        }


            offer::where('id',$req->oid)->update([
                'title'=>$req->title,
                'image'=>$new_name,
            ]);
            $data['success']="success";
        echo json_encode($data);
       
    }

     public function delete_offer(Request $req)
    {
       
            offer::where('id',$req->body)->delete();
            $data['success']="success";
        echo json_encode($data);
       
    }

    //////

    public function gallery()
    {
        $gallery=gallery::where('added_by',auth()->guard('shop')->user()->id)->latest()->get();
        return view('shop.addon.Gallery',['gallery'=>$gallery]);
    }

     public function add_gallery(Request $req)
    {
       
          $image = $req->file('img');
          $new_name = '/uploads/gallery/'.time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('uploads/gallery'), $new_name);

            gallery::create([
                'title'=>$req->title,
                'image'=>$new_name,
                'added_by'=>auth()->guard('shop')->user()->id,
            ]) ;
            $data['success']="success";
        echo json_encode($data);
       
    }


     public function delete_gallery(Request $req)
    {
       
            gallery::where('id',$req->body)->delete();
            $data['success']="success";
        echo json_encode($data);
       
    }

    ////


        public function videos()
    {
        $video=video::where('added_by',auth()->guard('shop')->user()->id)->latest()->get();
        return view('shop.addon.Videos',['video'=>$video]);
    }

     public function add_video(Request $req)
    {
       

            video::create([
                'title'=>$req->title,
                'link'=>$req->link,
                'added_by'=>auth()->guard('shop')->user()->id,
            ]) ;
            $data['success']="success";
        echo json_encode($data);
       
    }

        public function edit_video($vid)
    {
        $video=video::where('id',$vid)->first();
        return view('shop.addon.EditVideo',['video'=>$video]);
    }

    public function video_edit(Request $req)
    {
        if($req->vis=='Yes')
        {
          video::where('added_by',auth()->guard('shop')->user()->id)->where('index_visibility','Yes')->update([
                'index_visibility'=>'No',
            ]);  
        }

            video::where('id',$req->vid)->update([
                'title'=>$req->title,
                'link'=>$req->link,
                'index_visibility'=>$req->vis,
            ]);
            $data['success']="success";
        echo json_encode($data);
       
    }

     public function delete_video(Request $req)
    {
       
            video::where('id',$req->body)->delete();
            $data['success']="success";
        echo json_encode($data);
       
    }
    ///////////////


            public function testimonials()
    {
        $testimonials=testimonial::where('added_by',auth()->guard('shop')->user()->id)->latest()->get();
        return view('shop.addon.Testimonials',['testimonials'=>$testimonials]);
    }

     public function add_testimonial(Request $req)
    {
       

            testimonial::create([
                'name'=>$req->name,
                'designation'=>$req->desig,
                'msg'=>$req->msg,
                'star'=>$req->star,
                'added_by'=>auth()->guard('shop')->user()->id,
            ]) ;
            $data['success']="success";
        echo json_encode($data);
       
    }

        public function edit_testimonial($tid)
    {
        $testimonial=testimonial::where('id',$tid)->first();
        return view('shop.addon.EditTestimonial',['testimonial'=>$testimonial]);
    }

    public function testimonial_edit(Request $req)
    {

            testimonial::where('id',$req->tid)->update([
                'name'=>$req->name,
                'designation'=>$req->desig,
                'msg'=>$req->msg,
                'star'=>$req->star,
            ]);
            $data['success']="success";
        echo json_encode($data);
       
    }

     public function delete_testimonial(Request $req)
    {
       
            testimonial::where('id',$req->body)->delete();
            $data['success']="success";
        echo json_encode($data);
       
    }
}
