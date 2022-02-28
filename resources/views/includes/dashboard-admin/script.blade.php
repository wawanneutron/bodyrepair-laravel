<script src="{{ url('/assets-admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('/assets-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('/assets-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('/assets-admin/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ url('/assets-admin/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('/assets-admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('/assets-admin/js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ url('/assets-admin/vendor/select2/select2.min.js') }}"></script>
<!-- sweetalert -->
<script src="{{ url('/assets-admin/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script>
    @if (session()->has('success'))
        swal({
        type: "success",
        icon: "success",
        title: "BERHASIL!",
        text: "{{ session('success') }}",
        // timer: 1500,
        showConfirmButton: false,
        showCancelButton: false,
        buttons: false,
        });
    @elseif(session()->has('error'))
        swal({
        type: "error",
        icon: "error",
        title: "GAGAL!",
        text: "{{ session('error') }}",
        timer: 1500,
        showConfirmButton: false,
        showCancelButton: false,
        buttons: false,
        });
    @endif
</script>
