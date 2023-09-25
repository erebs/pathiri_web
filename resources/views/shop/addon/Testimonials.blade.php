@extends('layouts.Shop')
@section('title')
 Testimonial
  @endsection
  @section('head1') Testimonial @endsection
@section('contents')



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <div class="row page-titles">
                    
                        <div class="row">
                       
                    <div class="col-lg-3">
                        <input type="text" class="form-control" placeholder="Enter Name" id="name">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" placeholder="Enter Designation" id="desig">
                    </div>
                    <div class="col-lg-3">
                        <textarea class="form-control" id="msg" placeholder="Enter Msg"></textarea>
                    </div>
                    <div class="col-lg-3">
                       <select class="form-control" id="star">
                           <option value="1">1 Star</option>
                           <option value="2">2 Star</option>
                           <option value="3">3 Star</option>
                           <option value="4">4 Star</option>
                           <option value="5">5 Star</option>
                       </select>
                    </div>
                    
                    <div class="col-lg-3 mt-4">
                    <button type="button" class="btn btn-primary" onclick="AddVideo()" id="ab1">Add</button>
                    <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Add</button>
                </div>
                </div>
                    
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
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Msg</th>
                                                <th>Star</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($testimonials as $t)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$t->name}}</td>
                                                <td>{{$t->designation}}</td>
                                                <td>{{$t->msg}}</td>
                                                <td>{{$t->star}}</td>
                                                <td>
                                                    
                                                    <div class="dropdown ms-auto text-end">
                                                        <div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
                                                            <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="/restaurent/edit-testimonial/{{$t->id}}">Edit</a>
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="Delete('{{$t->id}}')">Delete</a>
                                                        </div>
                                                    </div>
												</td>
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th>Id</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Msg</th>
                                                <th>Star</th>
                                                <th>Actions</th>
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

     function AddVideo()
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

    var msg=$('#msg').val();
    if(msg=='')
    {
        $('#msg').focus();
        $('#msg').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#msg').css({'border':'1px solid #CCC'});

var desig=$('input#desig').val();
var star=$('#star option:selected').val();

       $('#ab1').hide();
       $('#ab2').show();
    
          data = new FormData();


   data.append('name', name);
   data.append('msg', msg);
   data.append('desig', desig);
   data.append('star', star);
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/restaurent/add-testimonial",
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
              text: "Testimonial added successfully",
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
        $('#ab2').hide();
        $('#ab1').show();
                   Toastify({
              text: "Branch already exists",
              duration: 3000,
              newWindow: true,
              // close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, red, red)",
              },
              callback: function () {
              },
            }).showToast();
  }


}




})



}





    function Delete(val)
    {
    
  
 swal({
  title: "Do you want to delete this testimonial ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/restaurent/delete-testimonial',
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
                              title: "Testimonial deleted successfully.",
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