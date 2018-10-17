@extends('admin.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ url('admin') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ url('admin/users') }}">Users</a>
    </li>
    <li class="breadcrumb-item active">Edit User</li>
  </ol>

  @include('admin.layouts.message')

  <form action="update" method="POST">
  	{{ csrf_field() }}
  	<div class="box_general padding_bottom">
		<div class="header_box version_2">
			<h2><i class="fa fa-file"></i>Create New </h2>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Ful Name</label>
					<input type="text" class="form-control" name="name" required="required" placeholder="Full Name" value="{{ $users->name }}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control date-pick" required="required" name="email" placeholder="Email" value="{{ $users->email }}">
				</div>
			</div>
		</div>
		<!-- /row-->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>New Password</label>
					<input type="password" class="form-control" name="password" placeholder="New Password">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Control</label>
					<select class="form-control date-pick" required="required" name="control" value="{{ old('control') }}">
						<option <?php if($users->control == 'Admin'){echo 'selected';} ?> value="Admin">Admin</option>
						<option <?php if($users->control == 'Supervisor'){echo 'selected';} ?> value="Supervisor">Supervisor</option>
					</select>
				</div>
			</div>
		</div>
		<!-- /row-->
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" required="required" name="description" placeholder="Description">{{ $users->description }} </textarea>
				</div>
			</div>
		</div>
		<!-- /row-->
		<a href="{{ url('/admin/users') }}" class="btn_1 medium " style="background: #335693 !important">Back</a>
		<input type="submit" class="btn_1 medium" name="" value="update">
	</div>
	<!-- /box_general-->
  </form>

    

@endsection