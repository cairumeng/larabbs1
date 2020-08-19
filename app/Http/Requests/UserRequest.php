<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * $ARG1 - looking in this table
     * $ARG2 - checking against this column. Defaults to validation key (eq: email)
     * $ARG3 - Aditional WHERE NOT value.
     * $ARG4 - Aditional WHERE NOT field. Defaults to Primary Key
     * $ARG5 - Aditional WHERE field 1 - Aditional WHERE value.
     * 
     */
    public function rules()
    {

        return [
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|    unique:users,name,' . Auth::id(),
            'email' => 'email',
            'introduction' => 'max:80'
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'The identifier name is already taken, please choose another one',
            'name.regex' => 'Use only letters, numbers and the underscore character in identifier name',
            'name.between' => 'The identifier name must be between 3 to 25 characters.',
            'name.required' => 'The identifier name could not be empty',
        ];
    }
}
