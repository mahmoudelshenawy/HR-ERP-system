
<a href="{{url('business-setup/business-branch/'.DB::table('business_branches')->where('id',DB::table('business_administrations')->where('id',$business_administration_id)->value('business_branche_id'))->value('id'))}}">
    <span style="color: #a71d2a">{{DB::table('business_branches')->where('id',DB::table('business_administrations')->where('id',$business_administration_id)->value('business_branche_id'))->value('name')}}</span>
</a>
