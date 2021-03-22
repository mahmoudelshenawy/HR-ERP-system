
<h2 class="table-avatar">
    <a href="{{url('business-setup/business-branch/'.$id)}}" class="avatar">
        @if($logo)
            <img alt="" src="{{asset('uploads/files/branches'.$name.'/images/'.$logo)}}">@else
            <img alt="" src="{{asset('img/ArSoftware..gif')}}">
        @endif
    </a>
    <a href="{{url('business-setup/business-branch/'.$id)}}">  {{$name}}
        <span style="color: #ff9b44">{{$email ?$email:''}} </span>
        <span style="color: #721c24">{{( $phone ? $phone:'')}}</span>
    </a>
</h2>

