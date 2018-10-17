@extends('admin.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ url('/admin') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ url('/admin/settings') }}">Settings</a>
    </li>
    <li class="breadcrumb-item active">Social Media</li>
  </ol>

  @include('admin.layouts.message')

  	
  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Links Social Media</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#ID</th>
                  <th>Links</th>
                  <th>Icons</th>
                  <th>Created At</th>
                  <th>Control</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#ID</th>
                  <th>Links</th>
                  <th>Icons</th>
                  <th>Created At</th>
                  <th>Control</th>
                </tr>
              </tfoot>
              <tbody>
              	<span hidden="hidden">{{ $count=0 }}</span>
              	@foreach($socialMedia as $value)
                <tr>
                  <td>{{ $count = $count+1 }}</td>
                  <td>{{ $value->link }}</td>
                  <td class="text-center">
                    <?php 
                      switch ($value->icon) {
                        case 'ti-facebook':
                          echo "Facebook";
                          break;

                        case 'ti-twitter-alt':
                          echo "Twitter";
                          break;

                        case 'ti-google':
                          echo "Google Plus";
                          break;

                        case 'ti-pinterest':
                          echo "Google +";
                          break;

                        case 'ti-instagram':
                          echo "Instagram";
                          break;
                        
                        default:
                          echo "Not Found";
                          break;
                      }
                    ?>
                  </td>
                  <td>{{ $value->created_at->toDayDateTimeString() }}</td>
                  <td>
                    <a href="social-media/{{ $value->id }}/edit" class="btn_1 bg-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>
                    <a href="social-media/{{ $value->id }}/destroy" class="btn_1 bg-danger"><i class="fa fa-fw fa-close"></i> Deleted</a>
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


  <form action="social-media" method="POST">
    {{ csrf_field() }}
    <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-link"></i>Social Media</h2>
      </div>
      <div class="row">
				<div class="col-md-12">
					<h6>Links</h6>
					<table id="pricing-list-container" style="width:100%;">
						<tr class="pricing-list-item">
							<td>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<!-- <input type="text" class="form-control" placeholder=">Social Media Icon"> -->
											<select name="icon" class="form-control">
												<option value="ti-facebook">Facebook</option>
												<option value="ti-twitter-alt">Twitter</option>
												<option value="ti-google">Google Plus</option>
												<option value="ti-pinterest">Pinterest</option>
												<option value="ti-instagram">Instagram</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="link" placeholder="Social Media URL">
										</div>
									</div>
									<!-- <div class="col-md-2">
										<div class="form-group">
											<a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
										</div>
									</div> -->
								</div>
							</td>
						</tr>
					</table>
					<!-- <a href="#0" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i>Add New Link</a> -->
					</div>
      </div>
      <!-- /row-->
    </div>
    <!-- /box_general-->

    <!-- <p><a href="#0" class="btn_1 medium">Save</a></p> -->
    <input type="submit" class="btn_1 medium" name="" value="Add">
  </form>
    

@endsection