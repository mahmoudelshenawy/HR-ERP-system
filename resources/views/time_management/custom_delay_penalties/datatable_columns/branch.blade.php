
{{-- <h2 class="table-avatar">
    <a href="{{url('business-setup/business-branch/'.$branch_id)}}" class="avatar">
        @if(DB::table('business_branches')->where('id',$branch_id )->value('logo') )
            <img alt="" src="{{asset('uploads/files/branches'.DB::table('business_branches')->where('id',$branch_id )->value('name').'/images/'.DB::table('business_branches')->where('id',$branch_id )->value('logo') )}}">@else
            <img alt="" src="{{asset('img/ArSoftware..gif')}}">
        @endif
    </a>
    <a href="{{url('business-setup/business-branch/'.$branch_id)}}">  {{DB::table('business_branches')->where('id',$branch_id )->value('name') }}
    </a>
</h2>
 --}}
