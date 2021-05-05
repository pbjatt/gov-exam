<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question.question' => 'required',
            'question.option_1' => 'required',
            'question.option_2' => 'required',
            'question.correct_answer' => 'required',
            'question.difficulty' => 'required',
            'question.category_id' => 'required',
            'question.description'
        ];
    }
}
