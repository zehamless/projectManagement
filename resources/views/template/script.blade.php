{{-- backup --}}
<script src="https://kit.fontawesome.com/031855bb65.js" crossorigin="anonymous"></script>

<!-- Vendor -->
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/feather-icons/feather.min.js') }}"></script>

<!-- knob plugin -->
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

<!--Charts-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/morris.js06/morris.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/raphael/raphael.min.js') }}"></script>

<!-- Dashboar init js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/pages/dashboard.init.js') }}"></script>

<!-- App js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/app.min.js') }}"></script>


{{-- script load library js --}}
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}">
</script>
<script
    src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script
    src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}">
</script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
</script>
<script
    src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}">
</script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}">
</script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}">
</script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}">
</script>
<script
    src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}">
</script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}">
</script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>


<!-- Plugin js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/parsleyjs/parsley.min.js') }}"></script>

<!-- Validation init js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/pages/form-validation.init.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/pages/sweet-alerts.init.js') }}"></script>


<!-- Sweet Alerts js -->
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>


<!-- Plugins js for file upload-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/dropify/js/dropify.min.js') }}"></script>

<!-- Init js for file upload-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/pages/form-fileuploads.init.js') }}"></script>
<script src="
https://cdn.jsdelivr.net/npm/attrchange@1.0.1/attrchange.min.js
"></script>

{{-- Script buat tanggal --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr('.datepicker', {
            enableTime: false, // Hapus ini jika ingin memungkinkan input waktu juga
            dateFormat: "Y-m-d",
        });
    });
</script>

{{-- Script buat ubah format uang --}}
<script>
    $(document).ready(function() {
        $('.rupiah').each(function() {
            var angka = parseFloat($(this).text());
            if (!isNaN(angka)) {
                var formatRupiah = angka.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&.');
                $(this).text('Rp ' + formatRupiah);
            }
        });
    });
</script>


{{-- script untuk manggil alert jika berhasil create/edit --}}
<script>
    var alertSuccess = document.getElementById('success-alert');

    if (alertSuccess) {
        $(document).ready(function() {
            Swal.fire({
                title: "Complete!",
                text: "{{ session('success') }}",
                icon: "success",
            });
        });
    } else {

    }
</script>

{{-- script untuk manggil alert jika tidak ada error --}}
<script>
    var alertSuccess = document.getElementById('error-alert');

    if (alertSuccess) {
        $(document).ready(function() {
            Swal.fire({
                title: "Ooops..",
                text: "{{ session('success') }}",
                icon: "error",
            });
        });
    } else {

    }
</script>

<script>
    const body = document.querySelector("body");

    $(document).ready(function() {
        $(".button-menu-mobile").on('click', function() {
            $("body").addClass("sidebar-enable");
            body.setAttribute("data-leftbar-size", "default");
        });
    });
</script>

{{-- Script ubah angka jadi persentase --}}
<script>
    $(document).ready(function() {
        // Mengambil elemen dengan class "persentasiAngka"
        var $persentasiAngka = $('.persentasiAngka');

        // Mengubah teks angka menjadi persentase desimal
        $persentasiAngka.each(function() {
            var angka = parseFloat($(this).text());
            if (!isNaN(angka)) {
                // Menggunakan toFixed untuk memformat angka menjadi 1 angka desimal
                var persentase = angka % 1 === 0 ? angka.toFixed(0) : angka.toFixed(1);
                $(this).text(persentase + '%');
            }
        });
    });
</script>


{{-- <script>
    var sidebar = document.getElementsByClassName('sidebar-enable')

    $('body').on('sidebar-enable', function() {
        // do stuff
        if(sidebar){
        $(document).ready(function () {
            $(".button-menu-mobile").on('click', function () {
                $("body").removeClass("sidebar-enable");
            });
            console.log('clicked');
        });
    }
    });



</script> --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#loading-indicator').hide();
        $(document).on('ajaxStart', function() {
            $('#loading-indicator').show();
        });

        $(document).on('ajaxStop', function() {
            $('#loading-indicator').hide();
        });
    });
</script>

@yield('pageScript')
