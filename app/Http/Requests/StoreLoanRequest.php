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
            'initiator' => ['required', 'min:2', 'max:20'],
            'type' => Rule::in(config('loanproduct')),
            'amount' => ['nullable', 'max:10000', 'numeric'],
            'creator' => ['required', 'max:255'],
            'pathZS' => ['nullable', 'max:255'],
            'pathUKK' => ['nullable', 'max:255'],
            'pathIAB' => ['nullable', 'max:255'],
            'pathPD' => ['nullable', 'max:255'],
            'zs' => ['nullable', 'max:1'],
            'ukk' => ['nullable', 'max:1'],
            'iab' => ['nullable', 'max:1'],
            'pd' => ['nullable', 'max:1'],
            'description' => ['nullable'],
        ];
    }

    public function prepareForValidation()
    {
        $this->booleanFieldValidation('zs');
        $this->booleanFieldValidation('iab');
        $this->booleanFieldValidation('ukk');
        $this->booleanFieldValidation('pd');
    }

    private function booleanFieldValidation(string $field) {
        if(empty($this->request->get($field))) {
            $this->request->set($field, null);
        } else {
            $this->request->set($field, 1);
        }
    }

    public function getTagsFromRequest()
    {
        $tags = collect(explode(',', $this['tags']))->keyBy(function ($item) {
            return $item;
        });
        return $tags;
    }
}
