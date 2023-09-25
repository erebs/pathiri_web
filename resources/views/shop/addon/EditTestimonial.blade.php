@extends('layouts.Shop')
@section('title')
 Testimonial
  @endsection
  @section('head1') Edit Testimonial @endsection
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
                                                    <label class="col-lg-2 col-form-label">Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" placeholder="Enter Name" id="name" value="{{$testimonial->name}}">
                                                        
                                                    </div>
                                                </div>
                                               
                                               
                                               

                                                <div class="mb-3 row">
                                                    <label class="col-lg-2 col-form-label">Designation
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-10">
                                                        
                                                      <input type="text" class="form-control" placeholder="Enter Designation" id="desig" value="{{$testimonial->designation}}">
                                                        
                                                    </div>

                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-2 col-form-label">Msg
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-10">
                                                        
                                                      <textarea class="form-control" id="msg" placeholder="Enter Msg">{{$testimonial->msg}}</textarea>
                                                        
                                                    </div>

                                                </div>

                                                 <div class="mb-3 row">
                                                    <label class="col-lg-2 col-form-label">Msg
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-10">
                                                        
                                                      <select class="form-control" id="star">
                                                       <option value="1" @if($testimonial->star=='1') selected @endif>1 Star</option>
                                                       <option value="2" @if($testimonial->star=='2') selected @endif>2 Star</option>
                                                       <option value="3" @if($testimonial->star=='3') selected @endif>3 Star</option>
                                                       <option value="4" @if($testimonial->star=='4') selected @endif>4 Star</option>
                                                       <option value="5" @if($testimonial->star=='5') selected @endif>5 Star</option>
                                                   </select>
                                                        
                                                    </div>

                                                </div>

                                                
                                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                            <button type="button" class="btn btn-primary" onclick="EditTest()" id="ab1">Submit</button>
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

 
function EditTest()
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
   data.append('tid', '{{$testimonial->id}}');
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/restaurent/testimonial-edit",
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
              text: "Testimonial updated successfully",
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