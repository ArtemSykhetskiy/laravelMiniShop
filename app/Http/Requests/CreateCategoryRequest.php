<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return isAdmin(auth()->user());
    }

    public function messages()
    {
        return [
            'name:min' => 'Name must be longer than 3 characters' ,
            'name:max' => 'Name must be shorter than 50 characters',
            'description:min' => 'Description must be longer than 3 characters',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'en.name' => 'required',
            'en.description' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.name'] = 'string';
            $rules[$locale . '.description'] = 'string';
        }

        return $rules;
    }
}
