<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->route('category') && $this->user()->can('update', $this->route('category'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->route('category')->id);
        return [
            'name' => 'required|string|unique:categories,name,'.$this->route('category')->id.',id|max:255',
            'slug' => 'required|string|unique:categories,slug,'.$this->route('category')->id.',id|max:255',
            'description' => 'nullable|string|max:1000',
        ];
    }
}
