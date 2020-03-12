<?php

namespace App\Http\Requests;

use App\Dto\UsersIndexDto;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UsersIndexRequest
 * @property int $cityId
 * @property string $name   Строка поиска по ФИО
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
            'cityId' => 'integer|exists:cities,id|nullable',
            'name' => 'string|nullable'
        ];
    }

    public function getDto(): UsersIndexDto
    {
        return new UsersIndexDto($this->name, $this->cityId);
    }
}
