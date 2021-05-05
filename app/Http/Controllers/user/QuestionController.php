<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Imports\QuestionImport;
use App\Model\Exam_category;
use App\Model\Question;
use App\Model\Setting;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Validators\ValidationException;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch data from particular user
        $guardData = Auth::guard()->user();
        $question = Question::where('user_id', $guardData->id)->get();

        //for Page title
        $setting = Setting::first();

        // category
        $examcategory = Exam_category::orderBy('id', 'desc')->get();
        $examcategoryArr  = ['' => 'Select category'];
        if (!$examcategory->isEmpty()) {
            foreach ($examcategory as $cat) {
                $examcategoryArr[$cat->id] = $cat->title;
            }
        }

        //
        $difficulty  = ['Easy', 'Medium', 'Hard'];

        // set page and title ------------------
        $page  = 'question.index';
        $title = 'Questions';
        $data  = compact('page', 'title', 'question', 'setting', 'guardData', 'difficulty', 'examcategoryArr');

        // return data to view
        return view('frontend.layout.user.app', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // fetch data from particular user
        $guardData = Auth::guard()->user();

        //for Page title
        $setting = Setting::first();

        $examcategory = Exam_category::orderBy('id', 'desc')->get();
        $examcategoryArr  = ['' => 'Select category'];
        if (!$examcategory->isEmpty()) {
            foreach ($examcategory as $cat) {
                $examcategoryArr[$cat->id] = $cat->title;
            }
        }

        $difficulty  = [
            'Easy' => 'Easy',
            'Medium' => 'Medium',
            'Hard' => 'Hard'
        ];

        // set page and title ------------------
        $page = 'question.question';
        $title = 'Add Question';
        $data = compact('page', 'title', 'examcategoryArr', 'setting', 'guardData', 'difficulty');
        // return data to view

        return view('frontend.layout.user.app', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $userId = Auth::guard()->user()->id;
        // dd($request->question);

        // dd($request->question['correct_answer']);


        $question = new Question($request->question);
        $truncated = Str::limit($request->question['question'], 150);
        $question->slug = Str::slug($truncated . '-' . $userId, '-');

        switch ($request->question['correct_answer']) {
            case '1':
                $question->correct_answer = $request->question['option_1'];
                break;

            case '2':
                $question->correct_answer = $request->question['option_2'];
                break;

            case '3':
                $question->correct_answer = $request->question['option_3'];
                break;

            case '4':
                $question->correct_answer = $request->question['option_4'];
                break;

            case '5':
                $question->correct_answer = $request->question['option_5'];
                break;
        }

        $question->status = 'pending';

        $question->user_id = $userId;

        $question->save();

        return redirect(route('user.question.index'))->with('success', 'Question successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Question $question)
    {
        // fetch data from particular user
        $guardData = Auth::guard()->user();

        //for Page title
        $setting = Setting::first();

        $editData =  ['question' => $question->toArray()];

        for ($i = 1; $i <= 5; $i++) {
            if ($question->{'option_' . $i} == $question->correct_answer) {
                $editData['question']['correct_answer'] = "$i";
            }
        }

        $request->replace($editData);
        //send to view
        $request->flash();

        $examcategory = Exam_category::orderBy('id', 'desc')->get();
        $examcategoryArr  = ['' => 'Select category'];
        if (!$examcategory->isEmpty()) {
            foreach ($examcategory as $cat) {
                $examcategoryArr[$cat->id] = $cat->title;
            }
        }

        $difficulty  = [
            'Easy' => 'Easy',
            'Medium' => 'Medium',
            'Hard' => 'Hard'
        ];

        // set page and title ------------------
        $page = 'question.question';
        $title = 'Edit Question';
        $data = compact('page', 'title', 'examcategoryArr', 'question', 'setting', 'guardData', 'difficulty');
        // return data to view

        return view('frontend.layout.user.app', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $questions = $request->question;

        switch ($request->question['correct_answer']) {
            case '1':
                $questions['correct_answer'] = $request->question['option_1'];
                break;

            case '2':
                $questions['correct_answer'] = $request->question['option_2'];
                break;

            case '3':
                $questions['correct_answer'] = $request->question['option_3'];
                break;

            case '4':
                $questions['correct_answer'] = $request->question['option_4'];
                break;

            case '5':
                $questions['correct_answer'] = $request->question['option_5'];
                break;
        }

        $question->update($questions);

        return redirect(route('user.question.index'))->with('success', 'Question successfully update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->back()->with('success', 'Success! Question has been deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return download file from public path public_path('assets/')
     */
    public function downloadSample()
    {
        $filename = 'questionsamplesheet.xlsx';
        // Get path from storage directory
        $path = public_path('assets/' . $filename);

        // Download file with custom headers
        return response()->download($path, $filename, [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }


    function importExcel(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx',
            'category_id' => 'required'
        ]);

        $path = $request->file('select_file')->getRealPath();


        try {
            $excel = Excel::import(new QuestionImport, $path);
            return redirect(route('user.question.index'))->with('success', 'Excel Data Imported successfully.');
        } catch (ValidationException $e) {
            $failures = $e->failures();

            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }

            $error = 'In '.$failure->row().' row '.$failure->attribute().' column '.implode(",", $failure->errors()).' so please remove the row ';
            return redirect(route('user.question.index'))->with('error', $error);
        }
    }
}
