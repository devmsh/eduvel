@include('student.layouts.header')
@include('student.layouts.navbar')


<div class="content-wrapper">
    <div class="container-fluid">
        @if(auth()->user()->confirmed != 1)
            <div class="alert alert-warning" role="alert">Please check email to activate the account</div>
        @endif
        @yield('content')

    </div>
    <!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->


@include('student.layouts.footer')