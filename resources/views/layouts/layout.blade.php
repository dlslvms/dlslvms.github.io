<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','DLSL VMS')}}</title>
        
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{URL::asset('../vendor/bootstrap/css/bootstrap.min.css')}}">
        <!-- MetisMenu CSS -->
        <link rel="stylesheet" href="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.3/metisMenu.min.css')}}">
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="{{URL::asset('../vendor/datatables-plugins/dataTables.bootstrap.css')}}">
        <!-- DataTables Responsive CSS -->
        <link rel="stylesheet" href="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.9/metisMenu.min.css')}}">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{URL::asset('../dist/css/sb-admin-2.css')}}">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css')}}">

    </head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500');
    </style>
<body>
    
    <div id="wrapper">
        @include('inc.header')
        @include('inc.sidebar')
        @yield('content')
    </div>  

    <!-- jQuery -->
    <script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
    <script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('../vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.3/metisMenu.min.js')}}"></script>
    <!-- DataTables JavaScript -->
    <script src="{{URL::asset('../vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('../vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('../vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{URL::asset('../dist/js/sb-admin-2.js')}}"></script>
    <script src="{{URL::asset('../dist/js/user.js')}}"></script>
    <!-- Date Picker JavaScript -->
    <script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js')}}"></script>
    <script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js')}}"></script>

    <script src="{{URL::asset('https://www.gstatic.com/charts/loader.js')}}"></script>
    @yield('scripts')
</body>
</html>