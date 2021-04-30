<?php

namespace App\Http\Controllers\admin;

use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Model\Age;
use Illuminate\Http\Request;

class AgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lists = Age::orderBy('id', 'asc')->paginate(100);

        // set page and title -------------
        $page  = 'age.list';
        $title = 'Age list';
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
        $page  = 'age.add';
        $title = 'Add Age';
        $data  = compact('page', 'title');

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
            'record'          => 'required|array',
            'record.age'      => 'required'
        ];

        $messages = [
            'record.age'  => 'Please Enter Age.',
        ];

        $request->validate($rules, $messages);

        $record           = new Age;
        $input            = $request->record;

        $record->fill($input);
        if ($record->save()) {
            return redirect(route('admin.age.index'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(route('admin.age.index'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function show(Age $age)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Age $age)
    {
        $editData =  ['record' => $age->toArray()];
        $request->replace($editData);
        //send to view
        $request->flash();

        // set page and title ------------------
        $page = 'age.edit';
        $title = 'Edit Age';
        $data = compact('page', 'title', 'age');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Age $age)
    {
        $rules = [
            'record'          => 'required|array',
            'record.age'      => 'required'
        ];
        $messages = [
            'record.age'  => 'Please Enter Age.'
        ];
        $request->validate($rules, $messages);

        $record           = Age::find($age->id);
        $input            = $request->record;
        $record->fill($input);

        if ($record->save()) {
            return redirect(route('admin.age.index'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function destroy(Age $age)
    {

        $age->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
