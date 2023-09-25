@extends('layouts.Shop')
@section('title')
 Tables
  @endsection
  @section('head1') Edit Table @endsection
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
                                                        <input type="text" class="form-control" placeholder="Enter name" id="name" value="{{$table->name}}">
                                                        
                                                    </div>
                                                </div>
                                               
                                               
                                               

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Details
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="det" value="{{$table->details}}">
                                                        
                                                    </div>

                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Status <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                       <select class="form-control" id="status">
                                                           <option @if($table->status=='Active') selected @endif>Active</option>
                                                           <option @if($table->status=='Blocked') selected @endif>Blocked</option>
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
  var status=$('#status option:selected').val();

  $('#ab1').hide();
       $('#ab2').show();
    
          data = new FormData();


   data.append('name', name);
   data.append('det', det);
   data.append('status', status);
   data.append('tid', '{{$table->id}}');
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/restaurent/table-edit",
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
              text: "Table updated successfully",
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
               window.location.href='/restaurent/tables';
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