<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Faq::orderBy('id', 'asc')->paginate(10);
        
        // set page and title ------------------
        $page  = 'faq.list';
        $title = 'Faq list';
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
        $page  = 'faq.add';
        $title = 'Add Faq';
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
        
        $record           = new Faq;
        $input            = $request->record;

        $record->fill($input);
        if ($record->save()) {
            return redirect(url(env('ADMIN_DIR').'/faq'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(url(env('ADMIN_DIR').'/faq'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Faq $faq)
    {
        $editData =  ['record'=>$faq->toArray()];
        $request->replace($editData);
        //send to view
        $request->flash();
    
        // set page and title ------------------
        $page = 'faq.edit';
        $title = 'Edit Faq';
        $data = compact('page', 'title', 'faq');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
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
      
        $record           = Faq::find($faq->id);
        $input            = $request->record;
        $record->fill($input);

        if ($record->save()) {
            return redirect(url(env('ADMIN_DIR').'/faq'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
