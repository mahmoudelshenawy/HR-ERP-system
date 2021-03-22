<a href="{{url('business-setup/business-branch/'.$business_branche_id )}}">
    <span>{{ DB::table('business_branches')->where('id',$business_branche_id )->value('name') }}</span>
</a>
