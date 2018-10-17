@extends('admin.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ url('admin') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">All Coupons</li>
  </ol>

  @include('admin.layouts.message')

  <main>
  			<!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#ID</th>
                  <th>Course Title</th>
                  <th>Coupon Code</th>
                  <th>Discount price</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Number Of Students</th>
                  {{-- <th>Is Active</th> --}}
                  <th>Created At</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#ID</th>
                  <th>Course Title</th>
                  <th>Coupon Code</th>
                  <th>Discount price</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Number Of Students</th>
                  {{-- <th>Is Active</th> --}}
                  <th>Created At</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
              	<span hidden>{{ $count = 0 }}</span>
              	@foreach($coupons as $coupon)
              	<span hidden>{{ $count = $count + 1 }}</span>
                <tr>
                  <td>{{ $count }}</td>
                  @foreach($courses as $course)
						@if($course->id == $coupon->course_id)
                  			<td>{{ $course->course_title }}</td>
						@endif
				  @endforeach
				  <td>{{ $coupon->coupon_code }}</td>
                  <td>{{ $coupon->coupon_code_discount_price }}</td>
                  <td>{{ $coupon->start_date }}</td>
                  <td>{{ $coupon->end_date }}</td>
                  <td>{{ $coupon->number_of_students }}</td>
                  {{-- <td>
                  	@if($coupon->isActive == 1)
                  		Yes
                  	@else
                  		No
                  	@endif
                  </td> --}}
                  <td>{{ $coupon->created_at }}</td>
                  <td class="text-center">
                  	@if($coupon->isActive !== 1)
                  	<a href="{{ url('/admin/coupon/'.$coupon->coupon_code.'/approve') }}" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Approve</a>
                  	@endif
                  	<a href="{{ url('/admin/coupon/'.$coupon->coupon_code.'/delete') }}" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
	  <!-- /tables-->

	  <form method="post" action="{{ url('admin/add-coupon') }}">
	  		{{ csrf_field() }}
			<div class="box_general padding_bottom">
					<div class="header_box version_2">
						<h2><i class="fa fa-industry"></i>Coupons</h2>
					</div>
					<div class="row">
						<div class="col-md-12">
							{{-- <h6>Course Title</h6> --}}
							<table id="pricing-list-container" style="width:100%;">
								<tr class="pricing-list-item">
									<td>
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label>Course Title
													<select name="course_id" class="form-control">
														@foreach($courses as $course)
															<option value="{{ $course->id }}" required>{{ $course->course_title }}</option>
														@endforeach
													</select>
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label>Discount Price
													<input type="number" name="coupon_code_discount_price" required class="form-control" placeholder="Coupon code discount price">
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label> Start Date
													<input type="date" name="start_date" class="form-control" placeholder="Start Date">
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label> End Date
													<input type="date" name="end_date" class="form-control" placeholder="End Date">
													</label>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label> Number Of Students
													<input type="number" name="number_of_students" class="form-control" placeholder="Number of students">
													</label>
												</div>
											</div>
											{{-- <div class="col-md-3">
												<div class="form-group">
													<input type="text" class="form-control"  placeholder="Video URL">
												</div>
											</div> --}}
											{{-- <div class="col-md-2">
												<div class="form-group">
													<a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
												</div>
											</div> --}}
										</div>
									</td>
								</tr>
							</table>
							{{-- <a href="#0" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i>Add Item</a> --}}
							</div>
					</div>
					<!-- /row-->
			</div>
			<!-- /box_general-->
			{{-- <p><a href="#0" class="btn_1 medium">Save</a></p> --}}
			<p><input type="submit"  class="btn_1 medium" value="Save"></p>
	</form>
  </main>

@endsection