@extends('layouts.Shop')
@section('title')
 Banner
  @endsection
  @section('head1') Edit Banner @endsection
@section('contents')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h4 class="card-title">Edit Food Catagory</h4>
                            </div> -->
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Title
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Enter title" id="title" value="{{$banner->title}}">
                                                        
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Heading
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Enter Heading" id="h1" value="{{$banner->heading}}">
                                                        
                                                    </div>
                                                </div>
                                                 <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Sub Heading
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Enter Sub Heading" id="h2" value="{{$banner->sub_heading}}">
                                                        
                                                    </div>
                                                </div>
                                               
                                               

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Image
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        
                                                        <input type="file" class="form-control" name="pdf_file" id="pdf_file" onchange="Chkformat()">
                                                        
                                                    </div>

                                                </div>

                                                
                                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                            <button type="button" class="btn btn-primary" onclick="EditBanner()" id="ab1">Submit</button>
                  <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
                                                    </div>
                                                </div>

                                                
                                            </div>

                                            <div class="col-xl-6">

                                                <div class="mb-3 row">
                                                    
                                                    <img src="{{Url($banner->image)}}" style="width:300px;border-radius:10px;">

                                                </div>

                                            </div>    

                                          
                                        </div>
                                    </form>
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

 
function EditBanner()
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
var h1=$('input#h1').val();
    var h2=$('input#h2').val();

       $('#ab1').hide();
       $('#ab2').show();
    
          data = new FormData();


   data.append('title', title);
   data.append('h1', h1);
   data.append('h2', h2);
   data.append('bid', '{{$banner->id}}');
   data.append('img', $('#pdf_file')[0].files[0]);
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/restaurent/banner-edit",
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
              text: "Banner updated successfully",
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
               window.location.href='/restaurent/banners';
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



</script>


@endsection