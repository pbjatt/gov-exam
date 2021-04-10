<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'blog.blog_title' => 'required|unique:blogs,blog_title',
            'blog.blog_desc' => 'required',
            'blog_image' => 'required|max:2048|mimes:jpeg,jpg,png,gif',
            'blog_attachment' => 'nullable|max:2048|mimes:pdf',
            'blog.category_id' => 'required',
            'blog.blog_seotitle' => 'nullable',
            'blog.blog_seokeyword' => 'nullable',
            'blog.blog_seodesc' => 'nullable'
        ];
    }
}
