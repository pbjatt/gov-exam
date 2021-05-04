<?php

namespace App\Http\Controllers\admin;

use Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Setting;
use App\Model\User;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = User::whereNotIn('role_id', [1])->paginate(100);

        $page = 'setting.userlist';
        $title = 'Users';
        $data = compact('page', 'title', 'lists');
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
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
    	$setting 	= Setting::find(1);
        // $editData =  $setting->toArray();
        $editData =  ['record' => $setting->toArray()];
        $request->replace($editData);
        //send to view
        $request->flash();
    	// dd($editData);
        // set page and title ------------------
        $page = 'setting.edit';
        $title = 'Setting';
        $data = compact('page', 'title', 'setting');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $setting 			= Setting::find(1);
        $record 		    = $request->record;

        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/logo/';
            $name = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name, 72);
            $record->logo = $name;
        }
        if ($request->hasFile('favicon')) {
            $file = $request->favicon;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/favicon/';
            $name1 = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name1, 72);
            $record->favicon = $name1;
        }
        $setting->fill($record);

        if ($setting->save()) {
            return redirect(url(env('ADMIN_DIR').'/setting'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
