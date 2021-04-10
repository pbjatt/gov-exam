<?php

namespace App\Imports;

use App\Model\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionImport implements ToModel, WithHeadingRow
{
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
        $question->category_id = $category;
        $question->user_id = $guardData;
        return $question;
    }
}
