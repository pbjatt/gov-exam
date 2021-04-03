<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\InfoType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InfoTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = InfoType::orderBy('id', 'desc')->get();

        // set page and title ------------------
        $page  = 'infotype.list';
        $title = 'InfoType list';
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
        $lists = InfoType::orderBy('id', 'desc')->get();

        // set page and title ------------------
        $page  = 'infotype.add';
        $title = 'Add InfoType';
        $data  = compact('page', 'title', 'lists');

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
            'record.name'   => 'required|string',
        ];

        $messages = [
            'record.name'  => 'Please Enter Name.'
        ];

        $request->validate($rules, $messages);

        $record           = new InfoType;
        $input            = $request->record;

        $input['slug']    = Str::slug($input['name'], '-');
        $record->fill($input);

        if ($record->save()) {
            return redirect(route('admin.infotype.index'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(route('admin.infotype.index'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\InfoType  $infoType
     * @return \Illuminate\Http\Response
     */
    public function show(InfoType $infotype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\InfoType  $infoType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InfoType $infotype)
    {
        $edit     =  $infotype;
        $editData =  ['record' => $edit->toArray()];

        $request->replace($editData);
        //send to view
        $request->flash();

        // set page and title ------------------
        $page = 'infotype.edit';
        $title = 'Edit InfoType';
        $data = compact('page', 'title', 'edit');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\InfoType  $infotype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoType $infotype)
    {
        $record           = $infotype;
        $input            = $request->record;

        $input['slug']    = Str::slug($input['name'], '-');
        $record->fill($input);
        if ($record->save()) {
            return redirect(route('admin.infotype.index'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\InfoType  $infotype
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoType $infotype)
    {
        $infoType->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
