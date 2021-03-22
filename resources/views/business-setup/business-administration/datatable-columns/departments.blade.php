<td>
    <a href="#" class="btn add-btn text-center  " style="min-width: 70px">
        {{__('business-setup.Departments') ." : "}}
        {{DB::table('business_departments')->where('business_administration_id',$id)->count()}}
    </a>

</td>
