<a href="{{url('business-setup/business-administration/')}}" >
    <span>{{DB::table('business_administrations')->where('id',$business_administration_id)->value('name')}}</span>
</a>
