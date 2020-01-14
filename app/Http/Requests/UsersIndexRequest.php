<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UsersIndexRequest
 * @property int $cityId
 * @property string $name
 * @package App\Http\Requests
 */
class UsersIndexRequest extends FormRequest
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
            'cityId' => 'integer|exists:cities,id',
            'name' => 'string'
        ];
    }
}
