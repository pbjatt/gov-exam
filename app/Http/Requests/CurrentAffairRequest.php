<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CurrentAffairRequest extends FormRequest
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
            'currentaffair.title' => [
                'required',
                Rule::unique('current_affairs', 'title')->where(function ($q) {
                    $q->where('user_id', '!=', $this->user());
                })
            ],
            'image' => 'required|max:2048|mimes:jpeg,jpg,png,gif',
            'currentaffair.category_id' => 'required',
        ];
    }
}
