{{-- lokasi file header ada di "/views/template/header.blade.php" --}}
{{-- @include('template.header') --}}


{{-- isi main konten dinamis --}}
{{-- @yield('content') --}}


{{-- lokasi file header ada di "/views/template/footer.blade.php" --}}
{{-- @include('template.footer') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.header')
</head>

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid"
    data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default'
    data-sidebar-user='true'>

    <!-- Begin page -->
    <div id="wrapper">
        @include('template.navbar')
        @yield('content')
        @include('template.footer')    
    {{-- tutup div wrapper ada di file footer.blade.php --}}
    </div>
    @include('template.script')
</body>


</html>