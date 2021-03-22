@if ($message = Session::get('success'))
    <script>
        $.notify('{{$message}}','success');
    </script>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block flashMessage">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <script>
        $.notify('{{$message}}','error');
    </script>
@endif




@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block flashMessage">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($errors->any())

  @foreach ($errors->all() as $error)
      <script>
          $.notify('{{$error}}',{
              type:'error',
              layout : 'top',
              timeout : 2000,
              killer:true
          });
      </script>
 @endforeach

@endif

