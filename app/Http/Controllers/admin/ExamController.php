<?php

namespace App\Http\Controllers\admin;

use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Model\Exam;
use App\Model\Age;
use App\Model\Qualification;
use App\Model\Exam_category;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    public function index()
    {
        $lists = Exam::orderBy('id', 'desc')->paginate(10);

        // set page and title ------------------
        $page  = 'exam.list';
        $title = 'Exam list';
        $data  = compact('page', 'title', 'lists');

        // return data to view
        return view('backend.layout.master', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lists = Exam::orderBy('id', 'desc')->get();

        $examcategory = Exam_category::orderBy('id', 'desc')->get();
        $examcategoryArr  = ['' => 'Select category'];
        if (!$examcategory->isEmpty()) {
            foreach ($examcategory as $cat) {
                $examcategoryArr[$cat->id] = $cat->title;
            }
        }
        $age = Age::orderBy('id', 'desc')->get();
        $ageArr  = ['' => 'Select Age'];
        if (!$age->isEmpty()) {
            foreach ($age as $cat) {
                $ageArr[$cat->id] = $cat->age;
            }
        }
        $qualification = Qualification::orderBy('id', 'desc')->get();
        $qualificationArr  = ['' => 'Select Qualification'];
        if (!$qualification->isEmpty()) {
            foreach ($qualification as $cat) {
                $qualificationArr[$cat->id] = $cat->title;
            }
        }

        // set page and title ------------------
        $page  = 'exam.add';
        $title = 'Add Exam';
        $data  = compact('page', 'title', 'lists', 'examcategoryArr', 'ageArr', 'qualificationArr');

        // return data to view
        return view('backend.layout.master', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'record'        => 'required|array',
            'record.name'  => 'required|string',
            'record.short_description'  => 'max:870|min:600',
        ];

        $messages = [
            'record.name'  => 'Please Enter Name.',
            'image'  => 'Please Select Image'
        ];

        $request->validate($rules, $messages);

        $record           = new Exam;
        $input            = $request->record;
        $input['slug']    = $input['slug'] == '' ? Str::slug($input['name'], '-') : $input['slug'];

        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/exam/';
            $name = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 72);
            $input['image'] = $name;
        }

        $record->fill($input);
        $record->save();

        return redirect(route('admin.exam.index'))->with('success', 'Success! New record has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        $lists = Exam::findOrFail($exam->id);

        // set page and title ------------------
        $page = 'exam.single';
        $title = 'Exam';
        $data = compact('page', 'title', 'lists');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Exam $exam)
    {
        $edit     =  $exam;

        $editData =  ['record' => $edit->toArray()];
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
        $age = Age::orderBy('id', 'desc')->get();
        $ageArr  = ['' => 'Select Age'];
        if (!$age->isEmpty()) {
            foreach ($age as $cat) {
                $ageArr[$cat->id] = $cat->age;
            }
        }
        $qualification = Qualification::orderBy('id', 'desc')->get();
        $qualificationArr  = ['' => 'Select Qualification'];
        if (!$qualification->isEmpty()) {
            foreach ($qualification as $cat) {
                $qualificationArr[$cat->id] = $cat->title;
            }
        }

        // set page and title ------------------
        $page = 'exam.edit';
        $title = 'Edit Exam';
        $data = compact('page', 'title', 'exam', 'examcategoryArr', 'ageArr', 'qualificationArr');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        $rules = [
            'record'        => 'required|array',
            'record.name'  => 'required|string'
        ];

        $messages = [
            'record.name'  => 'Please Enter Name.'
        ];

        $request->validate($rules, $messages);

        $record           = $exam;
        $input            = $request->record;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/exam/';
            $name = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 72);
            $input['image'] = $name;
        }

        $record->fill($input);
        $record->save();

        return redirect(route('admin.exam.index'))->with('success', 'Success! Record has been edided');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
