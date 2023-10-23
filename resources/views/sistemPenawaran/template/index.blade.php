{{-- lokasi file header ada di "/views/template/header.blade.php" --}}
{{-- @include('template.header') --}}


{{-- isi main konten dinamis --}}
{{-- @yield('content') --}}


{{-- lokasi file header ada di "/views/template/footer.blade.php" --}}
{{-- @include('template.footer') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    @include('sistemPenawaran.template.header')
</head>

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light"
    data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'
    onclick="">

    {{-- loading page --}}
    <div id="loading-indicator">
        <div class="d-flex justify-content-center loader">
            <div class="loader-child" role="status"></div>
        </div>
    </div>
    {{-- end loading page --}}


    <!-- Begin page -->
    <div id="wrapper">
        @include(' sistemPenawaran.template.navbar')

        @yield('content')
        
        @include('sistemPenawaran.template.footer')
    </div>
    @include('sistemPenawaran.template.script')
</body>


</html>
