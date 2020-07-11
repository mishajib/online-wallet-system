<!-- jquery
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/bootstrap.min.js') }}"></script>
<!-- wow JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/wow.min.js') }}"></script>
<!-- price-slider JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/jquery-price-slider.js') }}"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/jquery.meanmenu.js') }}"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/owl.carousel.min.js') }}"></script>
<!-- sticky JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/jquery.sticky.js') }}"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/jquery.scrollUp.min.js') }}"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets/backend/admin/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
<!-- modernizr JS
		============================================ -->
<script src="{{ asset('assets/backend/admin/js/vendor/modernizr-2.8.3.min.js') }}"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/backend/admin/js/metisMenu/metisMenu-active.js') }}"></script>
<!-- sparkline JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/backend/admin/js/sparkline/jquery.charts-sparkline.js') }}"></script>
<!-- calendar JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/calendar/moment.min.js') }}"></script>
<script src="{{ asset('assets/backend/admin/js/calendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/backend/admin/js/calendar/fullcalendar-active.js') }}"></script>
<!-- float JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/backend/admin/js/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/backend/admin/js/flot/curvedLines.js') }}"></script>
<script src="{{ asset('assets/backend/admin/js/flot/flot-active.js') }}"></script>
<!-- plugins JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/plugins.js') }}"></script>
<script src="{{ asset('assets/backend/js/select2.min.js') }}"></script>

<script src="{{ asset('assets/backend/dropify/js/dropify.min.js') }}"></script>
<!-- main JS
    ============================================ -->
<script src="{{ asset('assets/backend/admin/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('layouts.errors')
@include('layouts.success')
@include('layouts.error')

<script>
    $('#select2-single').select2({
        allowClear: true,
    });

    //for deleting item
    function deleteItem(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }

    function giveInterest(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "wan't to give interest to all user",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, give it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('interest-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }

    function loginUser(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, login to this user!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('login-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your session is safe :)',
                    'error'
                )
            }
        })
    }


    function activeUser(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You want't to activate this user!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, activate!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('active-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }

    function deactivateUser(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You wan't deactivate this user!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, deactivate!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('deactive-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }


    $('#dropify').dropify();
</script>

@stack('js')
