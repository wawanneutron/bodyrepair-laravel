<script src="{{ url('/script/jquery-3.5.1.min.js') }}"></script>
<script src="{{ url('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('/script/script.js') }}"></script>
<script src="{{ url('/script/floating-wpp.min.js') }}"></script>
<script src="{{ url('/assets-admin/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script>
    $("#myDiv").floatingWhatsApp({
        phone: "6281297135155",
        popupMessage: "Aada yang bisa saya bantu?",
        showPopup: true,
        // autoOpenTimeout: 3000,
    });
</script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    @if (session()->has('success'))
        swal({
        type: "success",
        icon: "success",
        title: "BERHASIL!",
        text: "{{ session('success') }}",
        timer: 1500,
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
