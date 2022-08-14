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
            'title'   => 'required|max:50|min:15|string',
            'slug'    => 'required|max:50',
            'excerpt' => 'required|max:150',
            'cover'   => 'required|mimes:png,jpg,jpeg',
            'body'    => 'required|max:2000|min:200',
            'category_id' => 'required|integer',
            'status' => 'required|string',
            'tags' => 'required|string'
        ];
    }
}
