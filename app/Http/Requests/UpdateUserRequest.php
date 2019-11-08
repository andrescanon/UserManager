<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->route('user'));;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:2',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'email' => [
                'required',
                'min:2',
                'email',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'role' => 'required|exists:roles,slug',
            'password'  => 'sometimes|required|confirmed|min:6',
        ];
    }
}
