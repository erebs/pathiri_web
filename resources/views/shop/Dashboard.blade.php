
@extends('layouts.Shop')
@section('title')
 Dashboard
  @endsection
    @section('head1') Dashboard @endsection
  
@section('contents')

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row invoice-card-row">

					<div class="col-xl-3 col-xxl-3 col-sm-6" style="cursor:pointer;" onclick="window.location.href='/restaurent/tables'">
						<div class="card bg-warning invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">	
								 <i class="fa fa-table" style="color:white;"></i>								
								</div>
								<div>
									<h2 class="text-white invoice-num">{{$tabcnt}}</h2>
									<span class="text-white fs-18">Total Tables</span>
								</div>
							</div>
						</div>
					</div>
					  
					<div class="col-xl-3 col-xxl-3 col-sm-6" style="cursor:pointer;" onclick="window.location.href='/restaurent/booking-history'">
						<div class="card bg-info invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
									 <i class="fa fa-book" style="color:white;"></i>
								</div>
								<div>
									<h2 class="text-white invoice-num"></h2>
									<span class="text-white fs-18">Booking History</span>
								</div>
							</div>
						</div>
					</div>
					 <div class="col-xl-3 col-xxl-3 col-sm-6" style="cursor:pointer;" onclick="window.location.href='/restaurent/active-categories'">
						<div class="card bg-secondary invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
								<i class="fa fa-list-alt" style="color:white;"></i>					
								</div>
								<div>
									<h2 class="text-white invoice-num">{{$catcnt}}</h2>
									<span class="text-white fs-18">Active Categories</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-sm-6" style="cursor:pointer;" onclick="window.location.href='/restaurent/active-items'">
						<div class="card bg-success invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
									 <i class="fas fa-utensils" style="color:white;"></i>
								</div>
								<div>
									<h2 class="text-white invoice-num">{{$itemcnt}}</h2>
									<span class="text-white fs-18">Active Items</span>
								</div>
							</div>
						</div>
					</div>
				</div>



				<!-- //////////////////// -->

<div class="col-12">
                        <div class="card">
                        	 <div class="card-header">
                                <h4 class="card-title">Pending Bookings</h4>
                            </div> 
  <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <!-- <th>Id</th> -->
                                                
                                                <th>Customer</th>
                                                <th>Persons</th>
                                                <th>Tables</th>
                                                <th>Slote</th>
                                                <th>Note</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bookings as $b)
                                            <tr>
                                                <!-- <td>{{$loop->iteration}}</td> -->
                                                
                                                <td>Name : {{$b->name}}<br>
                                                	Mobile : {{$b->mobile}}<br>
                                                	Email : {{$b->email}}
                                                </td>
                                                <td>{{$b->persons}}</td>
                                                <td>{{$b->tables}}</td>
                                                <td>Date : {{date("d-M-Y", strtotime($b->book_date))}}<br>
                                                Time : {{date("H:i a", strtotime($b->book_time))}}-{{date("H:i a", strtotime($b->expiry))}}

                                                </td>
                                                <td>{{$b->note}}</td>
                                                <td>{{$b->status}}</td>
                                               
                                                
                                                
                                                <td>
                                                    
                                                    <div class="dropdown ms-auto text-end">
                                                        <div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
                                                            <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            
                                                            <a class="dropdown-item" href="/restaurent/edit-booking/{{$b->id}}">Edit</a>
                                                            <!-- <a class="dropdown-item" style="cursor: pointer;" onclick="Delete('{{$b->id}}')">Delete</a> -->
                                                        </div>
                                                    </div>
                                                </td>
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
 </div>
                            </div>


    </div>



				<!-- //////////////////////// -->


				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

	@endsection
		
		