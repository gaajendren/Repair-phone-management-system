<!DOCTYPE html>
<html lang="en">

@include('partials/header')

<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

    
        @if(session('success'))
        <script> alert("Successfully Booked!!"); </script>
        @endif

   

   @include('partials/top_navbar')
   @include('partials/carousell')
   @include('partials/about')
   @include('partials/service')
   @include('partials/footer')

  






