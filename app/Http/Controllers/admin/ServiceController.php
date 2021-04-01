<?php

namespace App\Http\Controllers\admin;

use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Service::orderBy('id', 'asc')->paginate(10);
        
        // set page and title ------------------
        $page  = 'service.list';
        $title = 'Service list';
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
        $page  = 'service.add';
        $title = 'Add Service';
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
        
        $record           = new Service;
        $input            = $request->record;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/service/';
            $name = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name, 72);
            $record['image'] = $name;
        }
        $record->fill($input);
        if ($record->save()) {
            return redirect(url(env('ADMIN_DIR').'/service'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(url(env('ADMIN_DIR').'/service'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Service $service)
    {
        $editData =  ['record'=>$service->toArray()];
        $request->replace($editData);
        //send to view
        $request->flash();
    
        // set page and title ------------------
        $page = 'service.edit';
        $title = 'Edit Service';
        $data = compact('page', 'title', 'service');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
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
      
        $record           = Service::find($about->id);
        $input            = $request->record;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/service/';
            $name = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name, 72);
            $record['image'] = $name;
        }
        $record->fill($input);

        if ($record->save()) {
            return redirect(url(env('ADMIN_DIR').'/service'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
