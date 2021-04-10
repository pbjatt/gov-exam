<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Imports\QuestionImport;
use App\Model\Exam_category;
use App\Model\Question;
use App\Model\Setting;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $difficulty  = ['Easy', 'Medium', 'Hard'];

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
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
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

        Excel::import(new QuestionImport, $path);
        return redirect(route('user.question.index'))->with('success', 'Excel Data Imported successfully.');
    }
}
