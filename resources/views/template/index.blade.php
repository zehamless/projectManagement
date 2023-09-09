{{-- lokasi file header ada di "/views/template/header.blade.php" --}}
@include('template.header')


{{-- isi main konten dinamis --}}
@yield('content') 


{{-- lokasi file header ada di "/views/template/footer.blade.php" --}}
@include('template.footer')      