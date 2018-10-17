@extends('teacher.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ url('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">All Files</li>
  </ol>

  @include('teacher.layouts.message')


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
                  <th>File Name</th>
                  <th>Course Title</th>
                  <th>Size</th>
                  <th>Type File</th>
                  <th>Created At</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#ID</th>
                  <th>File Name</th>
                  <th>Course Title</th>
                  <th>Size</th>
                  <th>Type File</th>
                  <th>Created At</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
              	<span hidden>{{ $count = 0 }}</span>
              	@foreach($courseFiles as $courseFile)
              	<span hidden>{{ $count = $count + 1 }}</span>
                <tr>
                  <td>{{ $count }}</td>
                  <td>{{ $courseFile->name }}</td>
                  <td>
                  	@foreach($courses as $course)
						@if($course->id == $courseFile->course_id)
							{{ $course->course_title }}
						@endif
					@endforeach
                  </td>
                  <td>{{ EducationAlzardHelpers::bytesToHuman($courseFile->size) }}</td>
                  <td>{{ $courseFile->type_file }}</td>
                  <td>{{ $courseFile->created_at->toDayDateTimeString() }}</td>
                  <td>
                  	<a href="{{ url('/dashboard/files/'.$courseFile->id.'/delete') }}" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Delete</a>
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

	  <form method="post" action="{{ url('dashboard/files') }}" enctype="multipart/form-data">
	  		{{ csrf_field() }}
			<div class="box_general padding_bottom">
					<div class="header_box version_2">
						<h2><i class="fa fa-file"></i>Files</h2>
					</div>
					<div class="row">
						<div class="col-md-12">
							{{-- <h6>Course Title</h6> --}}
							<table id="pricing-list-container" style="width:100%;">
								<tr class="pricing-list-item">
									<td>
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>Type the file name for display</label>
													<input type="text" name="name" required class="form-control" placeholder="Type the file name for display">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Course Title</label>
													<select name="course_id" class="form-control">
														@foreach($courses as $course)
															<option value="{{ $course->id }}" required>{{ $course->course_title }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Chose File</label>
													<input type="file" name="file_name" required class="form-control">
												</div>
											</div>
										</div>
									</td>
								</tr>
							</table>
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