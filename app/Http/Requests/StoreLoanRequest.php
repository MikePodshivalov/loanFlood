<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:4', 'max:255'],
            'group' => ['max:255'],
            'inn' => ['required', 'min:10', 'max:12'],
            'type' => Rule::in(['ВКЛ', 'НКЛ', 'БГ', 'ЛБГ', 'Разное']),
            'amount' => ['nullable', 'max:5000', 'numeric'],
            'creator' => ['required', 'max:255'],
            'path-zs' => ['nullable', 'max:255'],
            'path-pd' => ['nullable', 'max:255'],
            'tags' => ['nullable', 'max:255'],
            'description' => ['nullable'],
        ];
    }

    public function prepareForValidation()
    {
        $this->booleanFieldValidation('pledge');
        $this->booleanFieldValidation('pd');
    }

    private function booleanFieldValidation(string $field) {
        if(empty($this->request->get($field))) {
            $this->request->set($field, null);
        } else {
            $this->request->set($field, 1);
        }
    }
}
