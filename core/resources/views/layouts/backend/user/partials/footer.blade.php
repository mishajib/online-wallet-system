<script src="{{ asset('assets/backend/bootstrap-4/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/backend/bootstrap-4/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/backend/bootstrap-4/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/backend/dropify/js/dropify.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('layouts.errors')
@include('layouts.success')
@include('layouts.error')
<script>
    $(document).ready(function() {
        $('#select2').select2({
            allowClear: true,
        });

        $('#dropify').dropify();


        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    });
</script>
</body>
</html>
