@extends('layouts.Shop')
@section('title')
 Banners
  @endsection
  @section('head1') Banners @endsection
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
                    <div class="col-lg-3">
                        <input type="text" class="form-control" placeholder="Enter Heading" id="h1">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" placeholder="Enter Sub Heading" id="h2">
                    </div>
                    <div class="col-lg-3">
                        <input type="file" class="form-control" placeholder="Enter Title" id="pdf_file" onchange="Chkformat()" style="color: black;padding: 1em;background: #ececec;">
                        (Dimensions must be 900*600 px)
                    </div>
                    
                    <div class="col-lg-3 mt-4">
                    <button type="button" class="btn btn-primary" onclick="AddBanner()" id="ab1">Add Banner</button>
                    <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Add Banner</button>
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
                                                <th>Heading</th>
                                                <th>Sub Heading</th>
                                                <th>Banner</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($banner as $b)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$b->title}}</td>
                                                <td>{{$b->heading}}</td>
                                                <td>{{$b->sub_heading}}</td>
                                                <td><a href="{{Url($b->image)}}" target="_blank"><img src="{{Url($b->image)}}" style="width:80px;border-radius:10px;"></a></td>
                                                
                                                
                                                <td>
                                                    
                                                    <div class="dropdown ms-auto text-end">
                                                        <div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
                                                            <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            
                                                            <a class="dropdown-item" href="/restaurent/edit-banner/{{$b->id}}">Edit</a>
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
                                                 <th>Heading</th>
                                                <th>Sub Heading</th>
                                                <th>Banner</th>
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

     function AddBanner()
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

var ls=$('input#pdf_file').val();
    if(ls=='')
    {
            Toastify({
              text: "Please upload a photo",
              duration: 2000,
              newWindow: true,
              // close: true,
              gravity: "bottom", // `top` or `bottom`
              position: "center", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, red, red)",
              },
              callback: function () {
              },
            }).showToast();
        return false;
    }

    var h1=$('input#h1').val();
    var h2=$('input#h2').val();

       $('#ab1').hide();
       $('#ab2').show();
    
          data = new FormData();


   data.append('title', title);
   data.append('h1', h1);
   data.append('h2', h2);
   data.append('img', $('#pdf_file')[0].files[0]);
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/restaurent/add-banner",
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
              text: "Banner added successfully",
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


function Chkformat() {
  var fileInput = document.getElementById("pdf_file");
  var name = fileInput.files[0].name;
  var ext = name.split('.').pop().toLowerCase();
  var validExtensions = ['png', 'jpg', 'jpeg'];

  if (validExtensions.indexOf(ext) === -1) {
    // Handle invalid file format
    Toastify({
      text: "Invalid file format! Upload JPEG/PNG file",
      duration: 3000,
      newWindow: true,
      gravity: "bottom",
      position: "center",
      stopOnFocus: true,
      style: {
        background: "linear-gradient(to right, red, red)",
      },
      callback: function () {},
    }).showToast();
    fileInput.value = ""; // Clear the file input
    return false;
  }

  var oFReader = new FileReader();
  oFReader.readAsDataURL(fileInput.files[0]);
  var img = new Image();

  oFReader.onload = function (e) {
    img.src = e.target.result;

    img.onload = function () {
      var width = this.width;
      var height = this.height;

      if (width === 900 && height === 600) {
        // Image dimensions are valid
        // You can continue with your logic here
      } else {
        // Handle invalid dimensions
        Toastify({
          text: "Image must be 900x600 pixels",
          duration: 3000,
          newWindow: true,
          gravity: "bottom",
          position: "center",
          stopOnFocus: true,
          style: {
            background: "linear-gradient(to right, red, red)",
          },
          callback: function () {},
        }).showToast();
        fileInput.value = ""; // Clear the file input
        return false;
      }
    };
  };
}



    function Delete(val)
    {
    
  
 swal({
  title: "Do you want to delete this banner ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/restaurent/delete-banner',
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
                              title: "Banner deleted successfully.",
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