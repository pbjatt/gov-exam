<?php

namespace App\Http\Controllers\admin;

use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\Aboutus;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Aboutus::orderBy('id', 'asc')->paginate(10);
        
        // set page and title ------------------
        $page  = 'aboutus.list';
        $title = 'About Us list';
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
        $page  = 'aboutus.add';
        $title = 'Add About Us';
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
        
        $record           = new Aboutus;
        $input            = $request->record;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/aboutus/';
            $name = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name, 72);
            $record['image'] = $name;
        }
        $record->fill($input);
        if ($record->save()) {
            return redirect(url(env('ADMIN_DIR').'/aboutus'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(url(env('ADMIN_DIR').'/aboutus'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function show(Aboutus $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Aboutus $about)
    {
        $editData =  ['record'=>$about->toArray()];
        $request->replace($editData);
        //send to view
        $request->flash();
    
        // set page and title ------------------
        $page = 'aboutus.edit';
        $title = 'Edit About Us';
        $data = compact('page', 'title', 'about');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aboutus $about)
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
      
        $record           = Aboutus::find($about->id);
        $input            = $request->record;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/aboutus/';
            $name = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name, 72);
            $record['image'] = $name;
        }
        $record->fill($input);

        if ($record->save()) {
            return redirect(url(env('ADMIN_DIR').'/aboutus'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aboutus $about)
    {
        $about->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
