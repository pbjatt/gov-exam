<?php

namespace App\Http\Controllers\admin;

use Image;
use App\Model\ExamNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Model\Exam;

class ExamNotificationController extends Controller
{
    public function master()
    {
        // set page and title ------------------
        $page  = 'examnotification.master';
        $title = 'Exam Notifcation Master';
        $data  = compact('page', 'title');

        // return data to view
        return view('backend.layout.master', $data);
    }

    public function submaster()
    {
        // set page and title ------------------
        $page  = 'examnotification.submaster';
        $title = 'Exam Notifcation Sub Master';
        $data  = compact('page', 'title');

        // return data to view
        return view('backend.layout.master', $data);
    }

    public function index()
    {
        $lists = ExamNotification::orderBy('id', 'desc')->with('exam')->paginate(10);

        // set page and title ------------------
        $page  = 'examnotification.list';
        $title = 'Exam Notifcation list';
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
        $exam = Exam::orderBy('id', 'desc')->get();
        $examArr  = ['' => 'Select Exam'];
        if (!$exam->isEmpty()) {
            foreach ($exam as $cat) {
                $examArr[$cat->id] = $cat->name;
            }
        }

        $typeArr  = [
            ''  => 'Select Type',
            'true' => 'true',
            'false' => 'false'
        ];

        // set page and title ------------------
        $page  = 'examnotification.add';
        $title = 'Add Exam';
        $data  = compact('page', 'title', 'examArr', 'typeArr');

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
            'record'            => 'required|array',
            'record.title'      => 'required|string',
            'record.exam_id'    => 'required',
        ];

        $messages = [
            'record.title'      => 'Please Enter Title.',
            'record.exam_id'    => 'Please Select Exam.',
        ];

        $request->validate($rules, $messages);

        $record           = new ExamNotification;
        $input            = $request->record;
        $input['slug']    = $input['slug'] == '' ? Str::slug($input['title'], '-') : $input['slug'];

        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/examnotification/';
            $name = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 72);
            $input['image'] = $name;
        }

        $record->fill($input);
        $record->save();

        return redirect(route('admin.examnotification.index'))->with('success', 'Success! New record has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExamNotification  $examNotification
     * @return \Illuminate\Http\Response
     */
    public function show(ExamNotification $examNotification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExamNotification  $examNotification
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ExamNotification $examnotification)
    {
        $edit     =  $examnotification;
        $editData =  ['record' => $edit->toArray()];
        $request->replace($editData);
        $request->flash();

        $exam = Exam::orderBy('id', 'desc')->get();
        $examArr  = ['' => 'Select Exam'];
        if (!$exam->isEmpty()) {
            foreach ($exam as $cat) {
                $examArr[$cat->id] = $cat->name;
            }
        }

        $typeArr  = [
            ''  => 'Select Type',
            'true' => 'true',
            'false' => 'false'
        ];

        // set page and title ------------------
        $page = 'examnotification.edit';
        $title = 'Edit Exam Notification';
        $data = compact('page', 'title', 'examArr', 'examnotification', 'typeArr');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExamNotification  $examNotification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamNotification $examnotification)
    {
        $rules = [
            'record'            => 'required|array',
            'record.title'      => 'required|string',
            'record.exam_id'    => 'required',
        ];

        $messages = [
            'record.title'      => 'Please Enter Title.',
            'record.exam_id'    => 'Please Select Exam.',
        ];

        $request->validate($rules, $messages);

        $record           = $examnotification;
        $input            = $request->record;


        $input['slug']    = $input['slug'] == '' ? Str::slug($input['title'], '-') : $input['slug'];

        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/examnotification/';
            $name = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 72);
            $input['image'] = $name;
        }

        $record->fill($input);
        $record->save();

        return redirect(route('admin.examnotification.index'))->with('success', 'Success! Record has been edided');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExamNotification  $examNotification
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamNotification $examnotification)
    {
        $examnotification->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
