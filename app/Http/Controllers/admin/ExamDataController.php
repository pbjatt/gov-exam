<?php

namespace App\Http\Controllers\admin;

use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Model\Examreleteddate;
use App\Model\Age;
use App\Model\Eligibility;
use App\Model\Qualification;
use App\Model\Syllabus;
use App\Model\Exam_category;
use App\Model\ExamNotification;
use Illuminate\Http\Request;

class ExamDataController extends Controller
{
    public function index()
    {
        $lists = ExamNotification::orderBy('id', 'desc')->with('exam', 'examreleteddate', 'eligibility')->paginate(10);

        // set page and title ------------------
        $page  = 'examdata.list';
        $title = 'Exam Notification Details list';
        $data  = compact('page', 'title', 'lists');

        return view('backend.layout.master', $data);
    }

    public function create()
    {
        $examnotification = ExamNotification::orderBy('id', 'desc')->get();
        $examnotificationArr  = ['' => 'Select Exam Notification'];
        if (!$examnotification->isEmpty()) {
            foreach ($examnotification as $cat) {
                $examnotificationArr[$cat->id] = $cat->title;
            }
        }

        $eligibility = Qualification::orderBy('id', 'desc')->get();
        $eligibilityArr  = ['' => 'Select Eligibility'];
        if (!$eligibility->isEmpty()) {
            foreach ($eligibility as $cat) {
                $eligibilityArr[$cat->id] = $cat->title;
            }
        }

        $syllabus = Syllabus::orderBy('id', 'desc')->get();
        $syllabusArr  = ['' => 'Select Syllabus'];
        if (!$syllabus->isEmpty()) {
            foreach ($syllabus as $cat) {
                $syllabusArr[$cat->id] = $cat->title;
            }
        }

        // set page and title ------------------
        $page  = 'examdata.add';
        $title = 'Add Exam Notification Details';
        $data  = compact('page', 'title', 'examnotificationArr', 'eligibilityArr', 'syllabusArr');

        // return data to view
        return view('backend.layout.master', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'record.examnotification_id'  => 'required',
        ];

        $messages = [
            'record.examnotification_id'  => 'Please Select Exam Notification.',
        ];

        $request->validate($rules, $messages);

        $record1           = new Examreleteddate;
        $input1            = $request->record1;
        $input['examnotification_id'] = $request->record['examnotification_id'];
        $record1->fill($input1);
        $record1->save();

        $record2           = new Eligibility;
        $input2            = $request->record2;
        $input2['examnotification_id'] = $request->record['examnotification_id'];
        $record2->fill($input2);
        $record2->save();

        $record3           = new Eligibility;
        $input3            = $request->record3;
        $input3['examnotification_id'] = $request->record['examnotification_id'];
        $record3->fill($input3);
        $record3->save();

        return redirect(route('admin.examdata.index'))->with('success', 'Success! New record has been added.');
    }

    public function show($examnotification)
    {
        $lists = ExamNotification::with('exam', 'examreleteddate', 'eligibility')->findOrFail($examnotification);

        // set page and title ------------------
        $page = 'examdata.single';
        $title = 'Exam Notification Details';
        $data = compact('page', 'title', 'lists');

        return view('backend.layout.master', $data);
    }

    public function edit(Request $request, $examnotification)
    {
        $edit = ExamNotification::with('exam', 'examreleteddate', 'eligibility')->findOrFail($examnotification);

        $examreleteddate = $edit->examreleteddate;
        $eligibility = $edit->eligibility;

        $editData =  ['record' => $examreleteddate->toArray(), 'record1' => $examreleteddate->toArray(), 'record2' => $eligibility->toArray()];
        // dd($editData);
        $request->replace($editData);
        //send to view
        $request->flash();

        $examnotification = ExamNotification::orderBy('id', 'desc')->get();
        $examnotificationArr  = ['' => 'Select Exam Notification'];
        if (!$examnotification->isEmpty()) {
            foreach ($examnotification as $cat) {
                $examnotificationArr[$cat->id] = $cat->title;
            }
        }

        $eligibility = Qualification::orderBy('id', 'desc')->get();
        $eligibilityArr  = ['' => 'Select Eligibility'];
        if (!$eligibility->isEmpty()) {
            foreach ($eligibility as $cat) {
                $eligibilityArr[$cat->id] = $cat->title;
            }
        }

        $syllabus = Syllabus::orderBy('id', 'desc')->get();
        $syllabusArr  = ['' => 'Select Syllabus'];
        if (!$syllabus->isEmpty()) {
            foreach ($syllabus as $cat) {
                $syllabusArr[$cat->id] = $cat->title;
            }
        }

        // set page and title ------------------
        $page = 'examdata.edit';
        $title = 'Edit Exam Notification Details';
        $data = compact('page', 'title', 'edit', 'examnotificationArr', 'eligibilityArr', 'syllabusArr');

        return view('backend.layout.master', $data);
    }

    public function update(Request $request, $examnotification)
    {
        $rules = [
            'record.examnotification_id'  => 'required',
        ];

        $messages = [
            'record.examnotification_id'  => 'Please Select Exam Notification.',
        ];

        $request->validate($rules, $messages);

        $data = ExamNotification::with('exam', 'examreleteddate', 'eligibility')->findOrFail($examnotification);

        $record1           = $data->examreleteddate;
        $input1            = $request->record1;
        $record1->fill($input1);
        $record1->save();

        $record2           = $data->eligibility;
        $input2            = $request->record2;
        $record2->fill($input2);
        $record2->save();

        return redirect(route('admin.examdata.index'))->with('success', 'Success! Record has been edided');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamNotification $examnotification)
    {
        $examnotification->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
