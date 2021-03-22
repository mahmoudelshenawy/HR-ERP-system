<h2>
    {{ DB::table('business_branches')->where('id',$new_branch)->value('name') }}
</h2>