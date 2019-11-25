<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /**
         * By default it returns false, change it to
         * something like this if u are checking authentication
         *
         * this for UpdateCategory class authorize function:
         */
        return $this->user()->can('create', Category::class);
        // $category = Category::find($this->route('category'));
        // return $category && $this->user()->can('update', $category);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:categories|max:255',
            'slug' => 'nullable|string|unique:categories|max:255',
            'description' => 'nullable|string|max:500',
        ];
    }
}
