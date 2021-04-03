<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\NotificationInfo;
use App\Model\ExamNotification;
use App\Model\InfoType;
use Illuminate\Http\Request;
use Image;

class NotificationInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = ExamNotification::with('notificationdetail')->get();

        // set page and title ------------------
        $page  = 'examdata.list';
        $title = 'Exam Notification Details list';
        $data  = compact('page', 'title', 'lists');

        return view('backend.layout.master', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examnotification = ExamNotification::orderBy('id', 'desc')->get();
        $examnotificationArr  = ['' => 'Select Exam Notification'];
        if (!$examnotification->isEmpty()) {
            foreach ($examnotification as $cat) {
                $examnotificationArr[$cat->id] = $cat->title;
            }
        }

        $infotype = InfoType::orderBy('id', 'desc')->get();
        $infotypeArr  = ['' => 'Select Type'];
        if (!$infotype->isEmpty()) {
            foreach ($infotype as $cat) {
                $infotypeArr[$cat->id] = $cat->name;
            }
        }

        // set page and title ------------------
        $page  = 'examdata.add';
        $title = 'Add Exam Notification Details';
        $data  = compact('page', 'title', 'infotypeArr', 'examnotificationArr');

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
            'record.examnotification_id'  => 'required',
        ];

        $messages = [
            'record.examnotification_id'  => 'Please Select Exam Notification.',
        ];

        $request->validate($rules, $messages);

        $record           = new NotificationInfo;
        $input            = $request->record;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/notificationdata/';
            $name = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 72);
            $input['image'] = $name;
        }

        $record->fill($input);
        $record->save();


        return redirect(route('admin.notificationinfo.index'))->with('success', 'Success! New record has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\NotificationInfo  $notificationInfo
     * @return \Illuminate\Http\Response
     */
    public function show($notificationInfo)
    {
        $lists = ExamNotification::with('notificationdetail')->findOrFail($notificationInfo);
        $infodata = NotificationInfo::with('infotype')->where('examnotification_id', $lists->id)->get();
        $lists->infodata = $infodata;
        // dd($lists);
        // set page and title ------------------
        $page = 'examdata.single';
        $title = 'Exam Notification Details';
        $data = compact('page', 'title', 'lists');

        return view('backend.layout.master', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\NotificationInfo  $notificationInfo
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request, $notificationInfo)
    {
        $examnotification = ExamNotification::orderBy('id', 'desc')->get();
        $examnotificationArr  = ['' => 'Select Exam Notification'];
        if (!$examnotification->isEmpty()) {
            foreach ($examnotification as $cat) {
                $examnotificationArr[$cat->id] = $cat->title;
            }
        }

        $edit = ExamNotification::findOrFail($notificationInfo);

        $infodata = NotificationInfo::with('infotype')->where('examnotification_id', $edit->id)->first();
        $infotypeids = NotificationInfo::where('examnotification_id', $edit->id)->get();
        $ids = [];
        foreach ($infotypeids as $it) {
            $ids[] = $it->info_type_id;
        }
        // dd($ids) ;

        $infotype = InfoType::whereIn('id', $ids)->get();
        $infotypeArr  = ['' => 'Select Type'];
        if (!$infotype->isEmpty()) {
            foreach ($infotype as $cat) {
                $infotypeArr[$cat->id] = $cat->name;
            }
        }

        $type = $request->type ?? $infodata->info_type_id;
        // dd($type);

        $info = NotificationInfo::where('info_type_id', $type)->where('examnotification_id', $edit->id)->first();

        $editData =  ['record' => $info->toArray()];
        $request->replace($editData);
        $request->flash();

        // set page and title ------------------
        $page = 'examdata.edit';
        $title = 'Edit Exam Notification Details';
        $data = compact('page', 'title', 'edit', 'examnotificationArr', 'infotypeArr', 'info');

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\NotificationInfo  $notificationInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotificationInfo $notificationInfo)
    {
        $rules = [
            'record.examnotification_id'  => 'required',
        ];

        $messages = [
            'record.examnotification_id'  => 'Please Select Exam Notification.',
        ];

        $request->validate($rules, $messages);

        $input            = $request->record;
        $record = NotificationInfo::where('info_type_id', $input['info_type_id'])->where('examnotification_id', $input['examnotification_id'])->first();

        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/notificationdata/';
            $name = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 72);
            $input['image'] = $name;
        }

        $record->fill($input);

        $record->save();

        return redirect(route('admin.notificationinfo.index'))->with('success', 'Success! Record has been edided');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\NotificationInfo  $notificationInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificationInfo $notificationInfo)
    {
        $notificationInfo->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
