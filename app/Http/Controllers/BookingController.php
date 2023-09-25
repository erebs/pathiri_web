<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\booking_table;
use App\Models\tables_booking;

class BookingController extends Controller
{
    public function tables()
    {
        $tables=booking_table::latest()->get();
        return view('shop.booking.Tables',['tables'=>$tables]);
    }

     public function add_table(Request $req)
    {
       

            booking_table::create([
                'name'=>$req->name,
                'details'=>$req->det,
                'status'=>'Active',
                'added_by'=>auth()->guard('shop')->user()->id,
            ]) ;
            $data['success']="success";
        echo json_encode($data);
       
    }

    public function edit_table($tid)
    {
        $table=booking_table::where('id',$tid)->first();
        return view('shop.booking.EditTable',['table'=>$table]);
    }

     public function table_edit(Request $req)
    {
    
            booking_table::where('id',$req->tid)->update([
                'name'=>$req->name,
                'details'=>$req->det,
                'status'=>$req->status,
               
            ]) ;
            $data['success']="success";
        echo json_encode($data);
       
    }


     public function delete_table(Request $req)
    {
       
            booking_table::where('id',$req->body)->delete();
            $data['success']="success";
        echo json_encode($data);
       
    }


    public function edit_booking($bid)
    {
        $bk=tables_booking::where('id',$bid)->first();
        return view('shop.booking.EditBooking',['bk'=>$bk]);
    }

     public function booking_edit(Request $req)
    {
    
            tables_booking::where('id',$req->bid)->update([
                'persons'=>$req->per,
                'tables'=>$req->tables,
                'book_date'=>$req->dt,
                'book_time'=>$req->tim,
                'expiry'=>$req->expiry,
                'status'=>$req->status,
               
            ]) ;
            $data['success']="success";
        echo json_encode($data);
       
    }

    public function booking_history()
    {
        $start_date=date('Y-m-01');
        $end_date=date('Y-m-t');
        $bookings=tables_booking::where('status','!=','Active')->where('book_date','>=',$start_date)->where('book_date','<=',$end_date)->latest()->get();
        return view('shop.booking.BookingHistory',['bookings'=>$bookings,'start_date'=>$start_date,'end_date'=>$end_date]);
    }

      public function get_bookings(Request $req)
    {
        $req->validate([
            'fromdt'=>'required',
            'todt'=>'required',

           
            ],
            [
              'fromdt.required' => 'This field is required',
              'todt.required' => 'This field is required',
            ]


          );
        $start_date=$req->fromdt;
        $end_date=$req->todt;

       $bookings=tables_booking::where('status','!=','Active')->where('book_date','>=',$start_date)->where('book_date','<=',$end_date)->latest()->get();
        return view('shop.booking.BookingHistory',['bookings'=>$bookings,'start_date'=>$start_date,'end_date'=>$end_date]);
    }
}
