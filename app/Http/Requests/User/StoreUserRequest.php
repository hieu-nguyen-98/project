<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\UserRole;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'unique:users,name'],
            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => ['required', Rule::in(UserRole::getListRoleAccept())],
            'image' => 'required',
        ];
    }
}
