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
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/settings/why-choose') }}">Why Choose</a>
        </li>
        <li class="breadcrumb-item active">Create New</li>
    </ol>

    @include('admin.layouts.message')

    <form action="store" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="">

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Why Choose Education</h2>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Icon</label><br>
                        <!-- <input type="text" class="form-control" name="icon" placeholder="Title"  value=""> -->
                        <!-- <select name="icon" class="form-control">
                          <option value="pe-7s-diamond">pe-7s-diamond</option>
                          <option value="pe-7s-display2">pe-7s-display2</option>
                          <option value="pe-7s-science">pe-7s-science</option>
                          <option value="pe-7s-rocket">pe-7s-rocket</option>
                          <option value="pe-7s-target">pe-7s-target</option>
                          <option value="pe-7s-graph1">pe-7s-graph1</option>
                        </select> -->

                        <!-- Start fontawesome-iconpicker -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary iconpicker-component py-2">Select Icon <i
                                        class="fa fa-fw fa-heart"></i></button>
                            <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                    data-selected="fa-car" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu"></div>
                        </div>
                        <button hidden="hidden" class="btn btn-default action-create">Create instances</button>
                        <script type="text/javascript">
                            var classes = document.getElementById("icon").getAttribute("class");
                            document.getElementById("myIcon").innerHTML = classes;
                        </script>
                        <!-- <script>document.write(classes);</script> -->
                        <!-- End fontawesome-iconpicker -->
                        @if($errors->has('icon'))
                            <small style="color: red">{{ $errors->first('icon') }}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title"
                               value="{{ old('title') }}">
                        @if($errors->has('title'))
                            <small style="color: red">{{ $errors->first('title') }}</small>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /row-->

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="5" class="form-control" name="description" style="height:100px;"
                                  placeholder="Description">{{ old('description') }}</textarea>
                        @if($errors->has('description'))
                            <small style="color: red">{{ $errors->first('description') }}</small>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /row-->

        </div>
        <!-- /box_general-->

        <p><input type="submit" class="btn_1 medium" name="submit" value="Save"></p>

    </form>


@endsection