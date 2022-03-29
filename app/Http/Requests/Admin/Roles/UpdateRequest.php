<?php

namespace App\Http\Requests\Admin\Roles;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pretty_name' => 'required|unique:roles,pretty_name,' . $this->role->id . ',id,guard_name,admin',
            'permissions' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'pretty_name.required' => 'This field is required',
            'pretty_name.unique'   => 'This role already exists',
            'permissions.required' => 'Please select at least one permission',
        ];
    }
}
