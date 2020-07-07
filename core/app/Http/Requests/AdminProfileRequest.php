<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileRequest extends FormRequest
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
        switch ($this->method()) {
            case 'PUT':
                $rules = [
                    "name" => "bail|required|string",
                    "username" => "bail|string|unique:users,id,:id",
                    "email" => "bail|required|email|unique:users,id,:id",
                    'slug' => "nullable",
                ];
                break;
            default:
                $rules = [
                    "name" => "bail|required|string",
                    "username" => "bail|string|unique:users",
                    "email" => "bail|required|email|unique:users",
                    'slug' => "nullable",
                ];
                break;
        }
        return $rules;
    }
}
