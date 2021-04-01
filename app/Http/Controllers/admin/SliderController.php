<?php

namespace App\Http\Controllers\admin;

use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Slider::orderBy('id', 'asc')->paginate(10);
        
        // set page and title ------------------
        $page  = 'slider.list';
        $title = 'Slider list';
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
        $page  = 'slider.add';
        $title = 'Add Slider';
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
            'record.title'      => 'required|string'
        ];
        
        $messages = [
            'record.title'  => 'Please Enter Title.',
        ];
        
        $request->validate( $rules, $messages );
        
        $record           = new Slider;
        $input            = $request->record;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/slider/';
            $name = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name, 72);
            $record['image'] = $name;
        }
        $record->fill($input);
        if ($record->save()) {
            return redirect(url(env('ADMIN_DIR').'/slider'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(url(env('ADMIN_DIR').'/slider'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Slider $slider)
    {
        $editData =  ['record'=>$slider->toArray()];
        $request->replace($editData);
        //send to view
        $request->flash();
    
        // set page and title ------------------
        $page = 'slider.edit';
        $title = 'Edit Slider';
        $data = compact('page', 'title', 'slider');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $rules = [
            'record'            => 'required|array',
            'record.title'      => 'required|string'
        ];
        $messages = [
            'record.name'  => 'Please Enter Name.'
        ];
        $request->validate( $rules, $messages );
      
        $record           = Slider::find($slider->id);
        $input            = $request->record;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/slider/';
            $name = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name, 72);
            $record['image'] = $name;
        }
        $record->fill($input);

        if ($record->save()) {
            return redirect(url(env('ADMIN_DIR').'/slider'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
