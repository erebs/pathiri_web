@extends('layouts.Shop')
@section('title')
 Videos
  @endsection
  @section('head1') Videos @endsection
@section('contents')



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <div class="row page-titles">
                    
                        <div class="row">
                       
                    <div class="col-lg-3">
                        <input type="text" class="form-control" placeholder="Enter Title" id="title">
                    </div>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" placeholder="Enter Link" id="link">
                    </div>
                    
                    <div class="col-lg-2">
                    <button type="button" class="btn btn-primary" onclick="AddVideo()" id="ab1">Add Video</button>
                    <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Add Video</button>
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
                                                <th>Title</th>
                                                <th>Video</th>
                                                 <th>Index Visibility</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($video as $b)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$b->title}}</td>
                                                <td>@php print_r($b->link) @endphp</td>
                                                <td>{{$b->index_visibility}}</td>
                                                <td>

                                                    
                                                    <div class="dropdown ms-auto text-end">
                                                        <div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
                                                            <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="/restaurent/edit-video/{{$b->id}}">Edit</a>
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="Delete('{{$b->id}}')">Delete</a>
                                                        </div>
                                                    </div>
												</td>
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th>Id</th>
                                                <th>Title</th>
                                                <th>Video</th>
                                                 <th>Index Visibility</th>
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
     
 var title=$('input#title').val();
    if(title=='')
    {
        $('#title').focus();
        $('#title').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#title').css({'border':'1px solid #CCC'});

 var link=$('input#link').val();
    if(link=='')
    {
        $('#link').focus();
        $('#link').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#link').css({'border':'1px solid #CCC'});



       $('#ab1').hide();
       $('#ab2').show();
    
          data = new FormData();


   data.append('title', title);
   data.append('link', link);
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/restaurent/add-video",
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
              text: "Video added successfully",
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
  title: "Do you want to delete this video ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/restaurent/delete-video',
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
                              title: "Video deleted successfully.",
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