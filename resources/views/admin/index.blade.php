@include('admin.layouts.header')
@include('admin.layouts.navbar')


  <div class="content-wrapper">
    <div class="container-fluid">

     	@yield('content')

	  </div>
	  <!-- /.container-fluid-->
   	</div>
    <!-- /.container-wrapper-->
    



@include('admin.layouts.footer')