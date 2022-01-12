<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
        //dd($this->employee);
        return [
            'name' => 'required',
            'email' => ['required', 'email:rfc,dns', Rule::unique('employees')->ignore($this->employee)], 
            'photo' => 'file|mimes:jpg,jpeg,png|max:5120',
            'designation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'photo.max' => 'The photo must not be greater than 5MB.'
        ];
    }
}
