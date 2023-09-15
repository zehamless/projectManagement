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

<!-- init js -->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/pages/flot.init.js') }}"></script>

<!-- Dashboar init js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/pages/dashboard.init.js') }}"></script>

<!-- App js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/app.min.js') }}"></script>


{{-- script load library js --}}
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}">
</script>
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
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}">
</script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}">
</script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>


<!-- Plugin js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/parsleyjs/parsley.min.js') }}"></script>

<!-- Validation init js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/pages/form-validation.init.js') }}"></script>

{{-- select 2 --}}

<script>
    $(document).ready(function(){
        $('#roles').select2({
        });
    });
</script>


@yield('pageScript')