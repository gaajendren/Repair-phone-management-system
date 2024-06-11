
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gentc Tech</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

     <script src="https://kit.fontawesome.com/ff3606fe13.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
   
    @if ($_SERVER['REDIRECT_URL'] == '/booking/view' || (isset($booking) && $_SERVER['REQUEST_URI'] === '/edit_booking/' . $booking->id))
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" rel="stylesheet">
       <style>
            .bootstrap-select .dropdown-toggle {
                background-color: white;
                border:1px solid #D1D3E2;
            }
            .bootstrap-select .dropdown-toggle li a {
                color: #D1D3E2; !important;
            }
            .bootstrap-select .dropdown-toggle, 
            .bootstrap-select .dropdown-toggle:focus, 
            .bootstrap-select .dropdown-toggle:hover {
                background-color: white !important;
                color: #6E707E;
            }
        </style>
        
    @endif
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">