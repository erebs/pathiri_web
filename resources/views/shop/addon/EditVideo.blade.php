@extends('layouts.Shop')
@section('title')
 Video
  @endsection
  @section('head1') Edit Video @endsection
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
                                            <div class="col-xl-12">
                                                <div class="mb-3 row">
                                                    <label class="col-lg-2 col-form-label">Title
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" placeholder="Enter title" id="title" value="{{$video->title}}">
                                                        
                                                    </div>
                                                </div>
                                               
                                               
                                               

                                                <div class="mb-3 row">
                                                    <label class="col-lg-2 col-form-label">Link
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-10">
                                                        
                                                      <input type="text" class="form-control" placeholder="Enter link" id="link" value="{{$video->link}}">
                                                        
                                                    </div>

                                                </div>


                                                <div class="mb-3 row">
                                                    <label class="col-lg-2 col-form-label">Link
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-10">
                                                        
                                                      <select id="vis" class="form-control">
                                                        <option value="No" @if($video->index_visibility=='No') selected @endif>No</option>
                                                        <option value="Yes" @if($video->index_visibility=='Yes') selected @endif>Yes</option>

                                                              
                                                      </select>
                                                        
                                                    </div>

                                                </div>

                                                
                                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                            <button type="button" class="btn btn-primary" onclick="EditOffer()" id="ab1">Submit</button>
                  <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
                                                    </div>
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

 
function EditOffer()
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
var vis=$('#vis option:selected').val();

       $('#ab1').hide();
       $('#ab2').show();
    
          data = new FormData();


   data.append('title', title);
   data.append('vid', '{{$video->id}}');
   data.append('link', link);
   data.append('vis', vis);
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/restaurent/video-edit",
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
              text: "Video updated successfully",
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
               window.location.href='/restaurent/videos';
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


function Chkformat()
{
                  var name = document.getElementById("pdf_file").files[0].name;
  //alert(name)
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  //if(jQuery.inArray(ext, ['gif','png','jpg','jpeg','pdf']) == -1)
  if(jQuery.inArray(ext, ['pdf','png','jpg','jpeg']) == -1)

  {

               Toastify({
              text: "Invalid file format ! Upload JPEG/PNG file",
              duration: 3000,
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

   $('input#pdf_file').val("");
   return false;
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("pdf_file").files[0]);
  var f = document.getElementById("pdf_file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 500000)
  {

                  Toastify({
              text: "Maximum file size is 500kb",
              duration: 3000,
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
   $('input#pdf_file').val("");
   return false;
  }

  
  }


</script>


@endsection