<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Syllabus;
use App\Model\Exam_category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Syllabus::with('exam_category')->paginate(10);

        // set page and title ------------------
        $page  = 'syllabus.list';
        $title = 'Syllabus list';
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
        $lists = Syllabus::orderBy('id', 'desc')->get();

        $examcategory = Exam_category::orderBy('id', 'desc')->get();
        $examcategoryArr  = ['' => 'Select Exam Category'];
        if (!$examcategory->isEmpty()) {
            foreach ($examcategory as $cat) {
                $examcategoryArr[$cat->id] = $cat->title;
            }
        }

        // set page and title ------------------
        $page  = 'syllabus.add';
        $title = 'Add Syllabus';
        $data  = compact('page', 'title', 'lists', 'examcategoryArr');
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
            'record.title'   => 'required|string',
        ];

        $messages = [
            'record.title'  => 'Please Enter Title.'
        ];

        $request->validate($rules, $messages);

        $record           = new Syllabus;
        $input            = $request->record;

        $input['slug']    = $input['slug'] == '' ? Str::slug($input['title'], '-') : $input['slug'];
        $record->fill($input);

        if ($record->save()) {
            return redirect(route('admin.syllabus.index'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(route('admin.syllabus.index'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function show(Syllabus $syllabus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Syllabus $syllabu)
    {
        $edit     =  $syllabu;
        $editData =  ['record' => $edit->toArray()];

        $request->replace($editData);
        //send to view
        $request->flash();

        $examcategory = Exam_category::orderBy('id', 'desc')->get();
        $examcategoryArr  = ['' => 'Select Exam Category'];
        if (!$examcategory->isEmpty()) {
            foreach ($examcategory as $cat) {
                $examcategoryArr[$cat->id] = $cat->title;
            }
        }

        // set page and title ------------------
        $page = 'syllabus.edit';
        $title = 'Edit syllabus';
        $data = compact('page', 'title', 'edit', 'examcategoryArr');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Syllabus $syllabu)
    {
        $input            = $request->record;
        // dd($input);
        $input['slug']    = $input['slug'] == '' ? Str::slug($input['title'], '-') : $input['slug'];
        $syllabu->fill($input);
        if ($syllabu->save()) {
            return redirect(route('admin.syllabus.index'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syllabus $syllabu)
    {
        $syllabu->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
