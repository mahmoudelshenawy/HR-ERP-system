<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Arabian HR - Human Resource Management System">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Arabian Software Co">
        <meta name="robots" content="noindex, nofollow">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{env('APP_NAME')}}</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.png')}}">

        <!-- Bootstrap CSS -->
        @if(App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset(App::getLocale().'/plugins/bootstrap-rtl/css/bootstrap.min.css')}}">
         @else
            <link rel="stylesheet" href="{{asset(App::getLocale().'/css/bootstrap.min.css')}}">
         @endif
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset(App::getLocale().'/css/font-awesome.min.css')}}">

		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{asset(App::getLocale().'/css/line-awesome.min.css')}}">

        	<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{asset(App::getLocale().'/css/select2.min.css')}}">

		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{asset(App::getLocale().'/css/bootstrap-datetimepicker.min.css')}}">

		<!-- Calendar CSS -->
		<link rel="stylesheet" href="{{asset(App::getLocale().'/css/fullcalendar.min.css')}}">

        <!-- Tagsinput CSS -->
		<link rel="stylesheet" href="{{asset(App::getLocale().'/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

		<!-- Datatable CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.1.1/css/searchPanes.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.0.0/css/searchBuilder.dataTables.min.css">
        <link rel="stylesheet" href="{{asset(App::getLocale().'/css/dataTables.bootstrap4.min.css')}}">

		<!-- Chart CSS -->
		<link rel="stylesheet" href="{{asset(App::getLocale().'/plugins/morris/morris.css')}}">

		<!-- Summernote CSS -->
		<link rel="stylesheet" href="{{asset(App::getLocale().'/plugins/summernote/dist/summernote-bs4.css')}}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset(App::getLocale().'/css/style.css')}}">

        <img src="https://www.countryflags.io/be/flat/64.png">
        <img src="https://www.countryflags.io/be/shiny/64.png">
        @yield('css')
        <style>
            li.select2-results__option{
                min-height: 44px; !important;

            }.select2-selection--single{
                 min-height: 44px; !important;
             }
            .select2-container{
                min-height: 44px; !important;
            }
        </style>

    </head>
