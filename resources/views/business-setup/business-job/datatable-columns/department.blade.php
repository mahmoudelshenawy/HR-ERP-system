<a href="#">
    <span>{{ DB::table('business_departments')->where('id',$business_department_id )->value('name')}}</span>
</a>
