<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => "bail|required|string",
            'username' => "bail|required|alpha_num|unique:users,id,:id",
            'email' => "bail|required|email|unique:users,id,:id",
            'phone' => "bail|required|string",
            'address' => "bail|string|required",
            'city' => "bail|string|required",
            "postcode" => "bail|string|required",
        ];
    }
}
