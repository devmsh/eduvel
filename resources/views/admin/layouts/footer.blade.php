<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © Education Alzard 2018</small>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="/admin/logout">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
{{-- <script src="{{ url('/design/adminpanel') }}/vendor/jquery/jquery.min.js"></script> --}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ url('/design/adminpanel') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="{{ url('/design/adminpanel') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="{{ url('/design/adminpanel') }}/vendor/chart.js/Chart.js"></script>
<script src="{{ url('/design/adminpanel') }}/vendor/datatables/jquery.dataTables.js"></script>
<script src="{{ url('/design/adminpanel') }}/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="{{ url('/design/adminpanel') }}/vendor/jquery.selectbox-0.2.js"></script>
<script src="{{ url('/design/adminpanel') }}/vendor/retina-replace.min.js"></script>
<script src="{{ url('/design/adminpanel') }}/vendor/jquery.magnific-popup.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="{{ url('/design/adminpanel') }}/js/admin.js"></script>
<!-- Custom scripts for this page-->
<script src="{{ url('/design/adminpanel') }}/js/admin-charts.js"></script>
<!-- Custom scripts for this page-->
<script src="{{ url('/design/adminpanel') }}/js/admin-datatables.js"></script>

<!-- Custom scripts for this page-->
<script src="{{ url('/design/adminpanel') }}/vendor/dropzone.min.js"></script>

<!-- For Ck-Editor -->
<script src="{{ url('/') }}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('article-ckeditor');
</script>

<!-- custom scrollbar JS -->
<script src="{{ url('/design/adminpanel') }}/js/jquery.nicescroll.min.js"></script>
<script type="text/javascript">
    $(".do-nicescrol").niceScroll();
</script>

<!-- Start fontawesome-iconpicker JS -->
<script src="{{ url('/fontawesome-iconpicker/js/fontawesome-iconpicker.js') }}"></script>
<script>
    $(function () {
        $('.action-destroy').on('click', function () {
            $.iconpicker.batch('.icp.iconpicker-element', 'destroy');
        });
        // Live binding of buttons
        $(document).on('click', '.action-placement', function (e) {
            $('.action-placement').removeClass('active');
            $(this).addClass('active');
            $('.icp-opts').data('iconpicker').updatePlacement($(this).text());
            e.preventDefault();
            return false;
        });
        $('.action-create').on('click', function () {
            $('.icp-auto').iconpicker();

            $('.icp-dd').iconpicker({
                //title: 'Dropdown with picker',
                //component:'.btn > i'
            });
            $('.icp-opts').iconpicker({
                title: 'With custom options',
                icons: [
                    {
                        title: "fab fa-github",
                        searchTerms: ['repository', 'code']
                    },
                    {
                        title: "fas fa-heart",
                        searchTerms: ['love']
                    },
                    {
                        title: "fab fa-html5",
                        searchTerms: ['web']
                    },
                    {
                        title: "fab fa-css3",
                        searchTerms: ['style']
                    }
                ],
                selectedCustomClass: 'label label-success',
                mustAccept: true,
                placement: 'bottomRight',
                showFooter: true,
                // note that this is ignored cause we have an accept button:
                hideOnSelect: true,
                // fontAwesome5: true,
                templates: {
                    footer: '<div class="popover-footer">' +
                    '<div style="text-align:left; font-size:12px;">Placements: \n\
    <a href="#" class=" action-placement">inline</a>\n\
    <a href="#" class=" action-placement">topLeftCorner</a>\n\
    <a href="#" class=" action-placement">topLeft</a>\n\
    <a href="#" class=" action-placement">top</a>\n\
    <a href="#" class=" action-placement">topRight</a>\n\
    <a href="#" class=" action-placement">topRightCorner</a>\n\
    <a href="#" class=" action-placement">rightTop</a>\n\
    <a href="#" class=" action-placement">right</a>\n\
    <a href="#" class=" action-placement">rightBottom</a>\n\
    <a href="#" class=" action-placement">bottomRightCorner</a>\n\
    <a href="#" class=" active action-placement">bottomRight</a>\n\
    <a href="#" class=" action-placement">bottom</a>\n\
    <a href="#" class=" action-placement">bottomLeft</a>\n\
    <a href="#" class=" action-placement">bottomLeftCorner</a>\n\
    <a href="#" class=" action-placement">leftBottom</a>\n\
    <a href="#" class=" action-placement">left</a>\n\
    <a href="#" class=" action-placement">leftTop</a>\n\
    </div><hr></div>'
                }
            }).data('iconpicker').show();
        }).trigger('click');


        // Events sample:
        // This event is only triggered when the actual input value is changed
        // by user interaction
        $('.icp').on('iconpickerSelected', function (e) {
            $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
                e.iconpickerInstance.options.iconBaseClass + ' ' +
                e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
        });
    });
</script>
<!-- End fontawesome-iconpicker JS -->

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('article-ckeditor-description-course');
</script>

<script>
    // For Confirm password
    var password = document.getElementById("password")
        , password_confirmation = document.getElementById("password_confirmation");

    function validatePassword() {
        if (password.value != password_confirmation.value) {
            password_confirmation.setCustomValidity("Passwords Don't Match");
        } else {
            password_confirmation.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    password_confirmation.onkeyup = validatePassword;
</script>
<script>
    // For Confirm Email
    var new_email = document.getElementById("new_email")
        , confirm_new_email = document.getElementById("confirm_new_email");

    function validatePassword() {
        if (new_email.value != confirm_new_email.value) {
            confirm_new_email.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_new_email.setCustomValidity('');
        }
    }

    new_email.onchange = validatePassword;
    confirm_new_email.onkeyup = validatePassword;
</script>

</body>

<!-- Mirrored from www.ansonika.com/udema/admin_section/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 21:24:22 GMT -->
</html>