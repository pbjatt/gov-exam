<?php

namespace App\Http\Controllers;

use App\Model\Exam_category;
use App\Model\ExamNotification;
use App\Model\Question;
use App\Model\Setting;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function question(Request $request)
    {
        //Exam Notification
        $notification = ExamNotification::get();

        // Category Array
        $questioncategory = Exam_category::orderBy('id', 'desc')->get();
        $examcategoryArr  = ['' => 'Select category'];
        if (!$questioncategory->isEmpty()) {
            foreach ($questioncategory as $cat) {
                $examcategoryArr[$cat->id] = $cat->title;
            }
        }

        $difficulty  = [
            'Easy' => 'Easy',
            'Medium' => 'Medium',
            'Hard' => 'Hard'
        ];

        $setting = Setting::first();

        if ($request->ajax()) {

            $question = Question::latest();

            if ($request->category_id != '') {
                $question->where('category_id', $request->category_id);
            }

            $question = $question->paginate(25);
            $data = compact('setting', 'notification', 'question', 'examcategoryArr');
            return view('frontend.template.question', $data)->render();
        } else {

            $question = Question::latest();

            if ($request->category_id != '') {
                $question->where('category_id', $request->category_id);
            }

            $question = $question->paginate(25);
            $data = compact('setting', 'notification', 'question', 'examcategoryArr', 'difficulty');
            return view('frontend.inc.question', $data);
        }
    }

    public function questionsearch(Request $request)
    {
        $question = Question::latest();

        if ($request->category_id != '') {
            $question->where('category_id', $request->category_id);
        }

        $question = $question->paginate(25);

        $ca_list = view('frontend.template.question', compact('question'))->render();

        return response()->json($ca_list, 200);
    }

    public function questiondetail($slug)
    {
        // Category Array
        $questioncategory = Exam_category::orderBy('id', 'desc')->get();
        $examcategoryArr  = ['' => 'Select category'];
        if (!$questioncategory->isEmpty()) {
            foreach ($questioncategory as $cat) {
                $examcategoryArr[$cat->id] = $cat->title;
            }
        }

        $difficulty  = [
            'Easy' => 'Easy',
            'Medium' => 'Medium',
            'Hard' => 'Hard'
        ];

        $question = Question::where('slug', $slug)->first();

        $releted = Question::with('user', 'category')->where('category_id', $question->category_id)->whereNotIn('id', [$question->id])->get();

        $data = compact('question', 'releted', 'examcategoryArr', 'difficulty');
        return view('frontend.inc.questiondetail', $data);
    }
}
