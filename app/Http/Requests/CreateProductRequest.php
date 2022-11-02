<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function authorize()
    {
        return isAdmin(auth()->user());
    }

    public function message()
    {
        return [
            'title:min' => 'Title should me longer than 3 characters',
            'title:max' => 'Title should me shorter than 255 characters',
            'description:min' => 'Description should me longer than 3 characters',
            'short_description:min' => 'Short description should me longer than 3 characters',
            'short_description:max' => 'Short description should me shorter than 150 characters',
            'SKU:max' => 'SKU should me shorter than 30 characters',
            'SKU:min' => 'SKU should me longer than 3 characters',
            'discount:min' => 'Discount cannot be lower than 0',
            'discount:max' => 'Discount cannot be higher than 0',
            'in_stock:min' => 'In stock cannot be lower than 0',


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
            'SKU' => ['required', 'string', 'min:2', 'max:35', 'unique:products'],
            'price' => ['required', 'numeric'],
            'discount' => ['required', 'numeric', 'min:0', 'max:99'],
            'in_stock' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'numeric'],
            'thumbnail' => ['required', 'image:png,jpg,jpeg'],
            'image.*' => ['image:png,jpg,jpeg']
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.title'] = 'string';
            $rules[$locale . '.description'] = 'string';
            $rules[$locale . '.short_description'] = 'string';
        }
        return $rules;
    }
}
