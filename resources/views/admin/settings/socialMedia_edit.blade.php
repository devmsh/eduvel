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
            <a href="{{ url('/admin/settings/social-media') }}">Social Media</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    @include('admin.layouts.message')

    <form action="/admin/settings/social-media/update" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $get->id }}">
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
                                                <option value="ti-facebook" <?php if ($get->icon == 'ti-facebook') {
                                                    echo "selected";
                                                } ?> >Facebook
                                                </option>
                                                <option value="ti-twitter-alt" <?php if ($get->icon == 'ti-twitter-alt') {
                                                    echo "selected";
                                                } ?> >Twitter
                                                </option>
                                                <option value="ti-google" <?php if ($get->icon == 'ti-google') {
                                                    echo "selected";
                                                } ?> >Google Plus
                                                </option>
                                                <option value="ti-pinterest" <?php if ($get->icon == 'ti-pinterest') {
                                                    echo "selected";
                                                } ?> >Pinterest
                                                </option>
                                                <option value="ti-instagram" <?php if ($get->icon == 'ti-instagram') {
                                                    echo "selected";
                                                } ?> >Instagram
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="link"
                                                   placeholder="Social Media URL" value="{{ $get->link }}">
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

        <!-- <p><a href="#0" class="btn_1 medium">Save</a></p> -->
        <a href="{{ url('/admin/settings/social-media') }}" class="btn_1 medium "
           style="background: #335693 !important">Back</a>
        <input type="submit" class="btn_1 medium" name="" value="Update">
    </form>


@endsection