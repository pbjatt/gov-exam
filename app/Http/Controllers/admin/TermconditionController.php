<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\Termcondition;

class TermconditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Termcondition::orderBy('id', 'asc')->paginate(10);
        
        // set page and title ------------------
        $page  = 'termcondition.list';
        $title = 'Term & Condition list';
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
        // set page and title ------------------
        $page  = 'termcondition.add';
        $title = 'Add Term & Condition';
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
            'record'            => 'required|array',
            'record.title'      => 'required|string',
            'record.description'=> 'required'
        ];
        
        $messages = [
            'record.name'  => 'Please Enter Title.',
        ];
        
        $request->validate( $rules, $messages );
        
        $record           = new Termcondition;
        $input            = $request->record;

        $record->fill($input);
        if ($record->save()) {
            return redirect(url(env('ADMIN_DIR').'/termcondition'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(url(env('ADMIN_DIR').'/termcondition'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\termcondition  $termcondition
     * @return \Illuminate\Http\Response
     */
    public function show(Termcondition $termcondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\termcondition  $termcondition
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Termcondition $termcondition)
    {
        $editData =  ['record'=>$termcondition->toArray()];
        $request->replace($editData);
        //send to view
        $request->flash();
    
        // set page and title ------------------
        $page = 'termcondition.edit';
        $title = 'Edit Term & Condition';
        $data = compact('page', 'title', 'termcondition');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\termcondition  $termcondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Termcondition $termcondition)
    {
        $rules = [
            'record'            => 'required|array',
            'record.title'      => 'required|string',
            'record.description'=> 'required'
        ];
        $messages = [
            'record.name'  => 'Please Enter Name.'
        ];
        $request->validate( $rules, $messages );
      
        $record           = Termcondition::find($termcondition->id);
        $input            = $request->record;
        $record->fill($input);

        if ($record->save()) {
            return redirect(url(env('ADMIN_DIR').'/termcondition'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\termcondition  $termcondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Termcondition $termcondition)
    {
        $termcondition->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
