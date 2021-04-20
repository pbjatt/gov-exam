<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrentAffairCategoryRequest;
use App\Http\Requests\UpdateCurrentAffairCategoryRequest;
use App\Model\CurrentAffairCategory;
use Illuminate\Http\Request;

class CurrentAffairCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentaffaircategory = CurrentAffairCategory::orderBy('id', 'desc')->get();

        // set page and title ------------------
        $page  = 'currentaffairs.category.index';
        $title = 'Current Affair Category list';
        $data  = compact('page', 'title', 'currentaffaircategory');

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
        $page  = 'currentaffairs.category.category';
        $title = 'Current Affair Category Add';
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
    public function store(CurrentAffairCategoryRequest $request)
    {        
        $currentaffaircategory = new CurrentAffairCategory($request->currentaffaircategory);

        $currentaffaircategory->save();

        return redirect(route('admin.currentaffaircategory.index'))->with('success', 'Current Affair Category successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CurrentAffairCategory  $currentaffaircategory
     * @return \Illuminate\Http\Response
     */
    public function show(CurrentAffairCategory $currentaffaircategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CurrentAffairCategory  $currentaffaircategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrentAffairCategory $currentaffaircategory, Request $request)
    {
        $edit     =  $currentaffaircategory;

        $editData =  ['currentaffaircategory' => $edit->toArray()];
        $request->replace($editData);
        //send to view
        $request->flash();

        // set page and title ------------------
        $page  = 'currentaffairs.category.category';
        $title = 'Current Affair Category Edit';
        $data  = compact('page', 'title', 'currentaffaircategory');

        // return data to view
        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CurrentAffairCategory  $currentaffaircategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrentAffairCategoryRequest $request, CurrentAffairCategory $currentaffaircategory)
    {
        $currentaffaircategories = $request->currentaffaircategory;

        $currentaffaircategory->update($currentaffaircategories);

        return redirect(route('admin.currentaffaircategory.index'))->with('success', 'Current Affair Category successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CurrentAffairCategory  $currentaffaircategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrentAffairCategory $currentaffaircategory)
    {
        $currentaffaircategory->delete();
        return redirect()->back()->with('success', 'Success! Current Affair Category has been deleted');
    }
}
