<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreUserRequest
 * @property string first_name
 * @property string last_name
 * @property string patronymic
 * @property string email
 * @property int city_id
 * @package App\Http\Requests
 */
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
        $rules = [
            'first_name' => 'string|min:1|max:255',
            'last_name' => 'string|min:1|max:255',
            'patronymic' => 'string|min:1|max:255',
            'email' => 'email|unique:users,email',
            'city_id' => 'exists:cities,id'
        ];

        return array_map(fn(string $rule) => 'required|' . $rule, $rules);
    }

    public function getDto(): StoreUserDto
    {

    }
}
