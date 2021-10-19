<script src="/script/jquery-3.5.1.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/script/script.js"></script>
<script src="/script/floating-wpp.min.js"></script>
<script>
    $("#myDiv").floatingWhatsApp({
    phone: "6281297135155",
    popupMessage: "Aada yang bisa saya bantu?",
    showPopup: true,
    // autoOpenTimeout: 3000,
    });
</script>
<script>
    $("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });
</script>