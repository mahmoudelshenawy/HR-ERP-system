<h2>
    {{ DB::table('business_jobs')->where('id',$new_job)->value('name') }}
</h2>