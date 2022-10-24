<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'string|nullable',
            'phone' => 'string|nullable',
            'email' => 'email|nullable',
            'logo' => 'nullable|image|mimes: jpeg,png,jpg,gif,svg|max:2048',
            'favico' => 'nullable|image|mimes: jpeg,png,jpg,gif,svg|max:2048',
            'facebook' => 'string|nullable',
            'instagram' => 'string|nullable',
            'twitter' => 'string|nullable',
            'youtube' => 'string|nullable',
            'tiktok' => 'string|nullable',
        ];
    }
}
