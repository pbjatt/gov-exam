<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrentAffairRequest;
use App\Model\CurrentAffair;
use App\Model\CurrentAffairCategory;
use Illuminate\Support\Str;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class CurrentAffairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // fetch data from particular user
        $guardData = Auth::guard()->user();

        //for Page title
        $setting = Setting::first();

        // Category Array
        $currentaffaircategory = CurrentAffairCategory::orderBy('id', 'desc')->get();
        $currentaffaircategoryArr  = ['' => 'Select category'];
        if (!$currentaffaircategory->isEmpty()) {
            foreach ($currentaffaircategory as $cat) {
                $currentaffaircategoryArr[$cat->id] = $cat->title;
            }
        }

        //Year Array
        $yearArr  = ['' => 'Select year'];
        for ($i = date('Y'); $i > 1947; $i--) {
            $yearArr[$i] = $i;
        }

        //Month Array
        $monthArr  = ['' => 'Select Month', '01' => 'Jan.', '02' => 'Feb.', '03' => 'Mar.', '04' => 'Apr.', '05' => 'May', '06' => 'Jun.', '07' => 'Jul.', '08' => 'Aug.', '09' => 'Sep.', '10' => 'Oct.', '11' => 'Nov.', '12' => 'Dec.'];

        //Date Array
        $dayArr  = ['' => 'Select day'];
        for ($i = 1; $i <= 31; $i++) {
            $dayArr[$i] = $i;
        }

        $currentaffair = CurrentAffair::where('user_id', $guardData->id)->filter()->paginate(5);

        // set page and title ------------------
        $page  = 'currentaffairs.index';
        $title = 'Current Affair';

        $data = compact('page', 'title', 'setting', 'currentaffair', 'currentaffaircategoryArr', 'yearArr', 'monthArr', 'dayArr', 'guardData');

        return view('backend.layout.master', $data);
    }

    public function ajax(Request $request)
    {
        // fetch data from particular user
        $guardData = Auth::guard()->user();

        $currentaffair = CurrentAffair::latest();
        if ($request->year != '') {
            $currentaffair->where('year', $request->year);
        }
        if ($request->month != '') {
            $currentaffair->where('month', $request->month);
        }
        if ($request->day != '') {
            $currentaffair->where('day', $request->day);
        }
        if ($request->category_id != '') {
            $currentaffair->where('category_id', $request->category_id);
        }

        $currentaffair = $currentaffair->get();

        return response()->json($currentaffair, 200);
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

        // Category Array
        $currentaffaircategory = CurrentAffairCategory::orderBy('id', 'desc')->get();
        $currentaffaircategoryArr  = ['' => 'Select category'];
        if (!$currentaffaircategory->isEmpty()) {
            foreach ($currentaffaircategory as $cat) {
                $currentaffaircategoryArr[$cat->id] = $cat->title;
            }
        }

        // set page and title ------------------
        $page  = 'currentaffairs.currentaffairs';
        $title = 'Add Current Affair';
        $data  = compact('page', 'title', 'setting', 'currentaffaircategoryArr', 'guardData');

        // return data to view
        return view('backend.layout.master', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrentAffairRequest $request)
    {
        $userId = Auth::guard()->user()->id;

        $currentaffair = new CurrentAffair($request->currentaffair);
        $currentaffair->slug = Str::slug($request->currentaffair['title'], '-');

        $currentaffair->user_id = $userId;

        if (!file_exists(public_path('storage/currentaffair/'))) {
            mkdir(public_path('storage/currentaffair/'), 666, true);
        }

        // $img = Str::slug($request->currentaffair['title'] . '-');

        if ($request->hasFile('image')) {

            $image       = $request->file('image');
            // $filename    = $image->getClientOriginalName();
            $name = time() . $currentaffair->slug . '.' . $image->getClientOriginalExtension();
            // $name = time() . $img . '.' . $image->getClientOriginalExtension();

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('storage/currentaffair/' . $name));

            $currentaffair->image = $name;
        }

        $currentaffair->year = date('Y');
        $currentaffair->month = date('m');
        $currentaffair->day = date('d');

        $currentaffair->save();

        return redirect(route('admin.currentaffair.index'))->with('success', 'Current Affair successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CurrentAffair  $currentaffair
     * @return \Illuminate\Http\Response
     */
    public function show(CurrentAffair $currentaffair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CurrentAffair  $currentaffair
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,  CurrentAffair $currentaffair)
    {
        // fetch data from particular user
        $guardData = Auth::guard()->user();

        //for Page title
        $setting = Setting::first();

        $editData =  ['currentaffair' => $currentaffair->toArray()];
        $request->replace($editData);
        //send to view
        $request->flash();

        // Category Array
        $currentaffaircategory = CurrentAffairCategory::orderBy('id', 'desc')->get();
        $currentaffaircategoryArr  = ['' => 'Select category'];
        if (!$currentaffaircategory->isEmpty()) {
            foreach ($currentaffaircategory as $cat) {
                $currentaffaircategoryArr[$cat->id] = $cat->title;
            }
        }

        // set page and title ------------------
        $page = 'currentaffairs.currentaffairs';
        $title = 'Edit Current Affair';
        $data = compact('page', 'title', 'currentaffaircategoryArr', 'currentaffair', 'setting', 'guardData');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CurrentAffair  $currentaffair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CurrentAffair $currentaffair)
    {
        $slug = $currentaffair->slug;
        $currentaffairs = $request->currentaffair;

        if (!file_exists(public_path('storage/currentaffair/'))) {
            mkdir(public_path('storage/currentaffair/'), 666, true);
        }

        $img = Str::slug($request->currentaffair['title'] . '-');

        if ($request->hasFile('image')) {

            if (file_exists(public_path('storage/currentaffair/' . $currentaffair->image))) {
                unlink(public_path('storage/currentaffair/' . $currentaffair->image));
            }
            $image       = $request->file('image');
            $name = time() . $slug . '.' . $image->getClientOriginalExtension();
            // $name = time() . $img . '.' . $image->getClientOriginalExtension();

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('storage/currentaffair/' . $name));

            $currentaffair->image = $name;
        }

        $currentaffair->update($currentaffairs);

        return redirect(route('admin.currentaffair.index'))->with('success', 'Current Affair successfully update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CurrentAffair  $currentaffair
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrentAffair $currentaffair)
    {
        if (!empty($currentaffair->image)) {
            if (file_exists(public_path('storage/currentaffair/' . $currentaffair->image))) {
                unlink(public_path('storage/currentaffair/' . $currentaffair->image));
            }
        }
        $currentaffair->delete();
        return redirect()->back()->with('success', 'Success! Current Affair has been deleted');
    }
}
