<a href="#">
    <span>{{DB::table('business_administrations')->where('id', DB::table('business_departments')->where('id',$business_department_id )->value('business_administration_id'))->value('name')}}</span>
</a>
