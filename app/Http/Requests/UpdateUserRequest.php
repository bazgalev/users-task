<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateUserRequest
 * @property string first_name
 * @property string last_name
 * @property string patronymic
 * @property string email
 * @property int city_id
 * @package App\Http\Requests
 */
class UpdateUserRequest extends FormRequest
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
            'first_name' => 'string|min:1|max:255',
            'last_name' => 'string|min:1|max:255',
            'patronymic' => 'string|min:1|max:255',
            'email' => 'email|unique:users,email,' . $this->email,
            'city_id' => 'exists:cities,id'
        ];
    }
}
