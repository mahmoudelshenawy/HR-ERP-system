
<a href="{{
        url('business-setup/business-branch/'.DB::table('business_branches')
            ->where('id',DB::table('business_administrations')
            ->where('id',DB::table('business_departments')
            ->where('id',$business_department_id)->value('business_administration_id'))
            ->value('business_branche_id'))
            ->value('id'))
    }}">
    <span> {{
            DB::table('business_branches')
         ->where('id',DB::table('business_administrations')
            ->where('id',DB::table('business_departments')
            ->where('id',$business_department_id)->value('business_administration_id'))
            ->value('business_branche_id'))
            ->value('name')
          }}
    </span>
</a>
