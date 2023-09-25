@extends('layouts.Shop')
@section('title')
 Booking
  @endsection
  @section('head1') Edit Booking @endsection
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
                                                    <label class="col-lg-4 col-form-label">Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Enter name" id="name" value="{{$bk->name}}" readonly>
                                                        
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Mobile
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Enter name" id="mob" value="{{$bk->mobile}}" readonly>
                                                        
                                                    </div>
                                                </div>
                                               
                                               
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Persons
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" id="per" value="{{$bk->persons}}">
                                                        
                                                    </div>

                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Tables
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" id="tables" value="{{$bk->tables}}">
                                                        
                                                    </div>

                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Date
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="dt" value="{{$bk->book_date}}">
                                                        
                                                    </div>

                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Time
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="time" class="form-control" id="tim" value="{{$bk->book_time}}">
                                                        
                                                    </div>

                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Expiry
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="time" class="form-control" id="expiry" value="{{$bk->expiry}}">
                                                        
                                                    </div>

                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Status <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                       <select class="form-control" id="status">
                                                           <option @if($bk->status=='Active') selected @endif>Active</option>
                                                           <option @if($bk->status=='Cancelled') selected @endif>Cancelled</option>
                                                           <option @if($bk->status=='Completed') selected @endif>Completed</option>
                                                       </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                            <button type="button" class="btn btn-primary" onclick="Save()" id="ab1">Submit</button>
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

 
 function Save()
{

var tables=$('input#tables').val();
    if(tables=='')
    {
        $('#tables').focus();
        $('#tables').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#tables').css({'border':'1px solid #CCC'});

var dt=$('input#dt').val();
    if(dt=='')
    {
        $('#dt').focus();
        $('#dt').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#dt').css({'border':'1px solid #CCC'});

var per=$('input#per').val();
    if(per=='')
    {
        $('#per').focus();
        $('#per').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#per').css({'border':'1px solid #CCC'});

var expiry=$('input#expiry').val();
    if(expiry=='')
    {
        $('#expiry').focus();
        $('#expiry').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#expiry').css({'border':'1px solid #CCC'});

var tim=$('input#tim').val();
    if(tim=='')
    {
        $('#tim').focus();
        $('#tim').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#tim').css({'border':'1px solid #CCC'});

  var status=$('#status option:selected').val();

  $('#ab1').hide();
       $('#ab2').show();
    
          data = new FormData();


   data.append('tables', tables);
   data.append('dt', dt);
   data.append('tim', tim);
   data.append('expiry', expiry);
   data.append('status', status);
   data.append('per', per);
   data.append('bid', '{{$bk->id}}');
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/restaurent/booking-edit",
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
              text: "Booking updated successfully",
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

</script>


@endsection