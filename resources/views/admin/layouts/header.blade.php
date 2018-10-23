<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/udema/admin_section/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 21:24:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>{{ trans('admin.title-dashboard') }}</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ url('/design/adminpanel') }}/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
          href="{{ url('/design/adminpanel') }}/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href="{{ url('/design/adminpanel') }}/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="{{ url('/design/adminpanel') }}/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="{{ url('/design/adminpanel') }}/img/apple-touch-icon-144x144-precomposed.png">

    <!-- Bootstrap core CSS-->
    <link href="{{ url('/design/adminpanel') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Main styles -->
    <link href="{{ url('/design/adminpanel') }}/css/admin.css" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="{{ url('/design/adminpanel') }}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <!-- Plugin styles -->
    <link href="{{ url('/design/adminpanel') }}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="{{ url('/design/adminpanel') }}/vendor/dropzone.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="{{ url('/design/adminpanel') }}/css/custom.css" rel="stylesheet">

    <script type="text/javascript">
        function check_all() {

            // item_checkall
            $('input[class="item_checkall"]:checkbox').each(function () {

                if ($('input[class="check_all"]:checkbox:checked').lengh == 0) {
                    $(this).prop('checked', false);
                } else {

                    $(this).prop('checked', true);
                }

            });


        }

        function delete_at() {

            $(document).on('click', '.delBtn', function () {

                var item_checked = $('input[class="check_all"]:checkbox:checked').length;
                console.log(item_checked);

                var item_checked = $('input[class="check_all"]:checkbox:checked').length;
                if (item_checked > 0) {
                    $(".record_count").text(item_checked);
                    // $(".not_empty_record").css("display","block !important");
                }

            });
        }

        // delete_at()

        // alert('test');
    </script>

    <!-- custom scrollbar styles -->
<!-- <link href="{{ url('/design/adminpanel') }}/css/custom-scrollbar.css" rel="stylesheet"> -->

    <!-- Start fontawesome-iconpicker CSS -->
    <link href="{{ url('/fontawesome-iconpicker/css/all.css') }}" rel="stylesheet">
    <link href="{{ url('/fontawesome-iconpicker/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet">
    <!-- Error Botton -->
    <!-- End fontawesome-iconpicker CSS -->

</head>

<body class="fixed-nav sticky-footer {{-- do-nicescrol --}}" id="page-top">