<?php

namespace App\Http\Controllers\admin;

use App\Model\Qualification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Qualification::orderBy('id', 'desc')->paginate(10);
    
        // set page and title ------------------
        $page  = 'qualification.list';
        $title = 'Qualification list';
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
        $lists = Qualification::orderBy('id', 'desc')->get();
      
        // set page and title ------------------
        $page  = 'qualification.add';
        $title = 'Add Qualification';
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
            'record.title'   => 'required|string',
        ];
        
        $messages = [
            'record.title'  => 'Please Enter Title.'
        ];
        
        $request->validate( $rules, $messages );
        
        $record           = new Qualification;
        $input            = $request->record;

        $input['slug']    = $input['slug'] == '' ? Str::slug($input['title'], '-'):$input['slug'];
        $record->fill($input);
        
        if ($record->save()) {
            return redirect(route('admin.qualification.index'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(route('admin.qualification.index'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function show(Qualification $qualification)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Qualification $qualification)
    {
        $edit     =  Qualification::find($qualification->id);
        $editData =  ['record'=>$edit->toArray()];

        $request->replace($editData);
        //send to view
        $request->flash();

        $lists = Qualification::orderBy('id', 'desc')->get();        
        
        // set page and title ------------------
        $page = 'qualification.edit';
        $title = 'Edit Qualification';
        $data = compact('page', 'title','edit');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qualification $qualification)
    {
        // $record           = Qualification::find($qualification->id);
        $input            = $request->record;    
        
        $input['slug']    = $input['slug'] == '' ? Str::slug($input['title'], '-'):$input['slug'];
        $qualification->fill($input);   
        if ($qualification->save()) {
            return redirect(route('admin.qualification.index'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qualification $qualification)
    {
        $qualification->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
