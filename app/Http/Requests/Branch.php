<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Branch extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($id)
    {
        return [
            'type_id' => 'Required',
            'name' => 'Required|max:255|unique:business_branches,name,' . $id,
            'phone' => 'nullable|Numeric|Unique:business_branches,phone,' . $id,
            'email' => 'nullable|Email|Unique:business_branches,email,' . $id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=300,max_height=300',
            'document' => 'nullable|file',
        ];
    }
}
