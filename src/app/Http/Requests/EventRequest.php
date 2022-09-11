<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'eventTitle' => 'required|min:5|max:100',
            'eventText' => 'required|min:5',
        ];
    }

    public function attributes()
    {
        return [
            'eventTitle' => 'Заголовок',
            'eventText' => 'Текст',
        ];
    }

    public function messages()
    {
        return [
            'eventTitle.required' => 'Поле заголовок является обязательным',
            'eventText.required' => 'Поле текст является обязательным',
        ];
    }
}
