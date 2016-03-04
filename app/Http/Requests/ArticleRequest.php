<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            'title' => 'required|min:3',
            'body' => 'required',
            'publish_at' =>'required|date',
            'tag_list' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'A turtle is required Ahahahah',
            'body.required'  => 'A message is required',
        ];
    }
}
