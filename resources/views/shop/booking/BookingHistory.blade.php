@extends('layouts.Shop')
@section('title')
 Bookings
  @endsection
  @section('head1') Bookings History @endsection
@section('contents')



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                 <div class="row page-titles">
                    <form action="/restaurent/get-bookings" method="POST" target="_blank"> 
                    @csrf 
                        <div class="row">
                          
                       
                    <div class="col-lg-4">
                        From
                        <input type="date" class="form-control" name="fromdt" value="{{$start_date}}">
                        @error('fromdt') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                    <div class="col-lg-4">
                        To
                        <input type="date" class="form-control" name="todt" value="{{$end_date}}">
                        @error('todt') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                    
                    <div class="col-lg-4 mt-3">

                    <button type="submit" class="btn btn-primary" id="ab1">Get Bookings</button>
                    
                </div>
               
                </div>
                    </form> 
                </div>
               
                <div class="row">
					<div class="col-12">
                        <div class="card">
                             <!-- <div class="card-header">
                                <h4 class="card-title">Active Categories</h4>
                            </div> --> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Details</th>
                                                <th>Tables</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bookings as $b)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>Name : {{$b->name}}<br>
                                                    Mobile : {{$b->mobile}}<br>
                                                    Email : {{$b->email}}<br>
                                                    Persons : {{$b->persons}}
                                                </td>
                                                <td>{{$b->tables}}</td>
                                                <td>Date : {{date("d-M-Y", strtotime($b->book_date))}}<br>
                                                Time : {{date("H:i a", strtotime($b->book_time))}}-{{date("H:i a", strtotime($b->expiry))}}

                                                </td>
                                                <td>{{$b->status}}</td>
                                                <td>{{$b->note}}</td>
                                               
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th>Id</th>
                                                <th>Details</th>
                                                <th>Tables</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Note</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
					











				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

 <script type="text/javascript">

     function AddTable()
{
     
 var name=$('input#name').val();
    if(name=='')
    {
        $('#name').focus();
        $('#name').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#name').css({'border':'1px solid #CCC'});

 var det=$('input#det').val();
    // if(det=='')
    // {
    //     $('#det').focus();
    //     $('#det').css({'border':'1px solid red'});
    //     return false;
    // }
    // else
  
    // $('#det').css({'border':'1px solid #CCC'});



       $('#ab1').hide();
       $('#ab2').show();
    
          data = new FormData();


   data.append('name', name);
   data.append('det', det);
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/restaurent/add-table",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
  if(data['success'])
  {
    $('#ab2').hide();
    $('#ab1').show();
            Toastify({
              text: "Table added successfully",
              duration: 1000,
              newWindow: true,
              // close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #12a00f, #12a00f)",
              },
              callback: function () {
               // alert("sss");
               window.location.href=window.location.href;
              },
            }).showToast();
                            
  }

     else
  {
        
  }


}




})



}





    function Delete(val)
    {
    
  
 swal({
  title: "Do you want to delete this table ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/restaurent/delete-table',
              data: {
        _token: @json(csrf_token()),
        body: body
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       swal({
                              title: "Table deleted successfully.",
                             // text: "This member moved and Password send to your Email",
                              icon: "success",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      .then((willDelete) => {
                       if (willDelete) {
                             window.location.href=window.location.href;
                                  } 

                            });

                     
                    }
                  
                
            }
       })

 } 
  
});

} 




   </script>


@endsection