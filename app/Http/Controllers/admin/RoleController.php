<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Role::orderBy('id', 'asc')->paginate(10);
        
        // set page and title ------------------
        $page  = 'role.list';
        $title = 'Role list';
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
        $page  = 'role.add';
        $title = 'Add Role';
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
            'record.name'       => 'required|string'
        ];
        
        $messages = [
            'record.name'  => 'Please Enter Name.',
        ];
        
        $request->validate( $rules, $messages );
        
        $record           = new Role;
        $input            = $request->record;

        $record->fill($input);
        if ($record->save()) {
            return redirect(url(env('ADMIN_DIR').'/role'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(url(env('ADMIN_DIR').'/role'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Role $role)
    {
        $editData =  ['record'=>$role->toArray()];
        $request->replace($editData);
        //send to view
        $request->flash();
    
        // set page and title ------------------
        $page = 'role.edit';
        $title = 'Edit Role';
        $data = compact('page', 'title', 'role');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $rules = [
            'record'        => 'required|array',
            'record.name'  => 'required|string'
        ];
        $messages = [
            'record.name'  => 'Please Enter Name.'
        ];
        $request->validate( $rules, $messages );
      
        $record           = Role::find($role->id);
        $input            = $request->record;
        $record->fill($input);

        if ($record->save()) {
            return redirect(url(env('ADMIN_DIR').'/role'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
