<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth,Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\shop;
use App\Models\tables_booking;
use App\Models\booking_table;
use App\Models\restaurent_category;
use App\Models\restaurent_item;

class ShopController extends Controller
{
     public function login()
    {
        return view('shop.login');
    }

    public function shop_login(Request $req)
    {
        $rememberStatus=$req->rememberStatus;
        $uname=$req->username;
        $psw=$req->password;
        if($rememberStatus==0)
        {
            if(Auth::guard('shop')->attempt(['mobile' => $uname, 'password' => $psw]))
                {
                    $data['success']='Login success.Please wait...';
                }
            else
                {
                    $data['err']='Invalid user !';
                }    
        }
        else if($rememberStatus==1)
        {
            
            if(Auth::guard('shop')->attempt(['mobile' => $req->username, 'password' => $req->password],true))
                {
                    $data['success']='Login success.Please wait...';
                }
            else
                {
                    $data['err']='Invalid user !';
                }

        }

        echo json_encode($data);
    }

    public function logout()
    {
        Auth::guard('shop')->logout();
        return redirect()->route('shop.login');
    }

   

   
    public function dashboard()
    {
        
       $header="Dashboard";
       $dt=date('Y-m-d');
       $bookings=tables_booking::where('restaurent_id',auth()->guard('shop')->user()->id)->where('status','Active')->latest()->get();
       $tabcnt=booking_table::where('added_by',auth()->guard('shop')->user()->id)->where('status','Active')->count();
       $catcnt=restaurent_category::where('added_by',auth()->guard('shop')->user()->id)->where('status','Active')->count();
       $itemcnt=restaurent_item::where('added_by',auth()->guard('shop')->user()->id)->where('status','Active')->count();
        return view('shop.Dashboard',['header'=>$header,'bookings'=>$bookings,'tabcnt'=>$tabcnt,'catcnt'=>$catcnt,'itemcnt'=>$itemcnt]);
    }

    public function change_password()
    {
        return view('shop.ChangePassword');
       
    }
    public function password_update(Request $req)
    {
        $currentpass=auth()->guard('shop')->user()->password;
        $oldpass=$req->oldpass;
        $newpass=$req->newpass;

        if(Hash::check($oldpass, $currentpass))
        {
            shop::where('id',auth()->guard('shop')->user()->id)->update([
                'password'=>bcrypt($newpass)
            ]) ;
            $data['success']="success";
        }
        else{
            $data['err']="err";
        }
        echo json_encode($data);
       
    }

    public function edit_shop_profile()
    {
        $shop=shop::where('id',auth()->guard('shop')->user()->id)->first();
        return view('shop.ShopProfileEdit',['shop'=>$shop]);
    }

     public function shop_profile_update(Request $req)
    {
       
        $shp=shop::where('id',auth()->guard('shop')->user()->id)->first();
         $img = $req->file('img1');
        if($img=='')
        {
            $new_name=$shp->profile_image;
        }
        else{
             $imgWillDelete = public_path() . '/uploads/shop/' . $shp->profile_image;
            File::delete($imgWillDelete);
          $image = $req->file('img1');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/shop'), $new_name);
        }

        // $img1 = $req->file('img1');
        // if($img1=='')
        // {
        //     $new_name1=$shp->logo;
        // }
        // else{
        //      $imgWillDelete1 = public_path() . '/upload/logo/' . $shp->logo;
        //     File::delete($imgWillDelete1);
        //   $image1 = $req->file('img1');
        //      $new_name1 = time() . '.' . $image1->getClientOriginalExtension();
        //     $image1->move(public_path('upload/logo'), $new_name1);
        // }

        
            shop::where('id',auth()->guard('shop')->user()->id)->update([

                'shop_name'=>$req->shname,
                'proprietor'=>$req->name,
                'mail_id'=>$req->mail,
                'location'=>$req->location,
                'address'=>$req->det,
                'pincode'=>$req->pincode,
                'profile_image'=>$new_name,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

        public function shop_availability()
    {
        $shop=shop::select('is_available','available_from','available_to','id')->where('id',auth()->guard('shop')->user()->id)->first();
        return view('shop.ShopAvailability',['shop'=>$shop]);
    }

         public function availability_update(Request $req)
    {
       
        
            shop::where('id',auth()->guard('shop')->user()->id)->update([

                'is_available'=>$req->avl,
                'available_from'=>$req->avlfrom,
                'available_to'=>$req->avlto,

            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

}
