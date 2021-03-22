<a class=" btn-sm btn-outline-info" href="#" data-toggle="modal" data-target="#view_absence_penalty{{$id}}"><i class="fa fa-id-card " ></i> </a>
<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_absence_penalty{{$id}}"><i class="fa fa-trash " ></i> </a>


@include('time_management.absence_penalties.delete')
@include('time_management.absence_penalties.view')
<script>
    $(".js-example-matcher-start").select2({
        width: '100%',
        minHeight:'100%',
        lineHeight:'44px',
    });
    $('.datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: 'en'
    });
</script>
