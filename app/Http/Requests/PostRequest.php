<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'=>'required|min:3|max:100',
            'description'=>'required|min:10|max:500',
            'article'=>'required|min:10|max:20000',
            'img'=>'mimes:jpeg,png,webp|max:10000',
        ];
    }
}
