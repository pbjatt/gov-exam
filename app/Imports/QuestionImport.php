<?php

namespace App\Imports;

use App\Model\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Str;

class QuestionImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable, SkipsFailures, SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $category = request()->category_id;
        $guardData = Auth::guard()->user()->id;
        $question = new Question([
            'question'     => $row['question'],
            'option_1'     => $row['option_1'],
            'option_2'     => $row['option_2'],
            'option_3'     => $row['option_3'],
            'option_4'     => $row['option_4'],
            'option_5'     => $row['option_5'],
            'correct_answer'     => $row['correct_answer'],
            'difficulty'     => $row['difficulty'],
        ]);
        $truncated = Str::limit($question->question, 150);
        $slug = Str::slug($truncated. '-' . $guardData, '-');
        $question->slug = $slug;
        $question->category_id = $category;
        $question->user_id = $guardData;
        return $question;
    }

    /**
     * Get the validation rules that apply to the upload file.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'question' => 'unique:questions,question',
            'difficulty' => Rule::in(['Easy', 'Medium', 'Hard'])
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'question.unique' => 'Question alredy Exist',
        ];
    }
}
