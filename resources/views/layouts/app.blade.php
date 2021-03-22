<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{app()->getLocale() == 'ar' ? 'rtl': 'ltr'}}">
  <head>
    @include('layouts.partials.head')
      <style>
        .page-wrapper{
        min-height: 625px;
        padding-top: 0px  }
      </style>
  </head>
  <body >
        @include('layouts.partials.nav')
        @include('layouts.partials.header')
        @yield('content')
        @include('layouts.partials.footer-scripts')
        @include('layouts.partials.flash-messages')
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        @stack('scripts')
        <script>
      $(document).ready(function(){
          $('.dt-buttons').addClass('btn-group inline-block')
          $('.dataTables_filter').addClass('form-group  inline-block')
          $('.dataTables_filter label input').addClass('form-control form-control-md')
          $('.dataTables_filter label input').removeClass('form-control-sm')
          $('.dataTables_length').insertAfter('table')
          $('.dataTables_length select').addClass(' datatable_columns-secondary')
          $('.dataTables_length select').removeClass('custom-select')
          $('button').removeClass('dt-button')
      })
  </script>
  @yield('js_2')
  </body>
</html>
