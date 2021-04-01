<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Exam_category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExamCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Exam_category::orderBy('id', 'desc')->paginate(10);

        // set page and title ------------------
        $page  = 'category.list';
        $title = 'Category list';
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
        $lists = Exam_category::orderBy('id', 'desc')->get();
        // dd($lists);
        $parentArr  = ['' => 'Select Parent category'];
        if (!$lists->isEmpty()) {
            foreach ($lists as $pcat) {
                $parentArr[$pcat->id] = $pcat->title;
            }
        }

        // set page and title ------------------
        $page  = 'category.add';
        $title = 'Add Category';
        $data  = compact('page', 'title', 'lists', 'parentArr');

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

        $record           = new Exam_category;
        $input            = $request->record;

        $input['slug']    = $input['slug'] == '' ? Str::slug($input['title'], '-') : $input['slug'];
        $record->fill($input);

        if ($record->save()) {
            return redirect(route('admin.examcategory.index'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(route('admin.examcategory.index'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam_category  $exam_category
     * @return \Illuminate\Http\Response
     */
    public function show(Exam_category $exam_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam_category  $exam_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $exam_category)
    {
        $edit     =  Exam_category::find($exam_category);
        $editData =  ['record' => $edit->toArray()];

        $request->replace($editData);
        //send to view
        $request->flash();

        $lists = Exam_category::orderBy('id', 'desc')->get();

        $parentArr  = ['' => 'Select Parent category'];
        if (!$lists->isEmpty()) {
            foreach ($lists as $pcat) {
                $parentArr[$pcat->id] = $pcat->title;
            }
        }

        // set page and title ------------------
        $page = 'category.edit';
        $title = 'Edit Category';
        $data = compact('page', 'title', 'edit', 'parentArr');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam_category  $exam_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $exam_category)
    {
        $record           = Exam_category::find($id);
        $input            = $request->record;

        $input['slug']    = $input['slug'] == '' ? Str::slug($input['title'], '-') : $input['slug'];
        $record->fill($input);
        if ($record->save()) {
            return redirect(route('admin.examcategory.index'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam_category  $exam_category
     * @return \Illuminate\Http\Response
     */
    public function destroy($exam_category)
    {
        $exam_category           = Exam_category::find($exam_category);
        $exam_category->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->sub_chk;

        Exam_category::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Success! Select record(s) have been deleted');
    }
}
