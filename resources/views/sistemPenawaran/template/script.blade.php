{{-- backup --}}
<script src="https://kit.fontawesome.com/031855bb65.js" crossorigin="anonymous"></script>

<!-- Vendor -->
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('templateAdmin/Admin/dist/assets/libs/feather-icons/feather.min.js') }}"></script>

<!-- Dashboar init js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/pages/dashboard.init.js') }}"></script>

<!-- App js-->
<script src="{{ asset('templateAdmin/Admin/dist/assets/js/app.min.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/attrchange@1.0.1/attrchange.min.js"></script>

<script>
    const body = document.querySelector("body");

    $(document).ready(function() {
        $(".button-menu-mobile").on('click', function() {
            $("body").addClass("sidebar-enable");
            body.setAttribute("data-leftbar-size", "default");
        });
    });
</script>


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
