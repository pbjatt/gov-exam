<?php

namespace App\Http\Controllers\admin;

use Auth;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Operator;
use App\Model\User;
use App\Model\Role;
use App\Model\Shop;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopertor = Operator::where('user_id', Auth::guard()->user()->id)->first();
        $shopData = Shop::find($shopertor->shop_id);

        $lists = Operator::where('shop_id', $shopData->id)->whereNotIn('role_id', [3])->orderBy('id', 'desc')->with('role','user')->paginate(10);
        
        // set page and title ------------------
        $page  = 'team.list';
        $title = 'Team list';
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
        $role = Role::whereNotIn('id', [1,2,3])->orderBy('id', 'desc')->get();
        $roleArr  = ['' => 'Select role'];
        if (!$role->isEmpty()) {
            foreach ($role as $cat) {
                $roleArr[$cat->id] = $cat->name;
            }
        }

        // set page and title ------------------
        $page  = 'team.add';
        $title = 'Add Team';
        $data  = compact('page', 'title', 'roleArr');

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
        $shopertor = Operator::where('user_id', Auth::guard()->user()->id)->first();
        $shopData = Shop::find($shopertor->shop_id);

        $rules = [
            'record'            => 'required|array',
            'record.name'       => 'required|string',
            'record.password1'   => 'required',
        ];
        
        $messages = [
            'record.name'  => 'Please Enter Name.',
        ];
        
        $request->validate( $rules, $messages );
        $user = User::where('email', $request->record['email'])->count();
        
        if ($user == 0) {
            $record               = new User;
            $record->name         = $request->record['name'];
            $record->email        = $request->record['email'];
            $record->password     = Hash::make($request->record['password1']);
            $record->role_id      = 2;
            $record->save();

            $operator               = new Operator;
            $operator->user_id      = $record->id;
            $operator->role_id      = $request->record1['role_id'];
            $operator->shop_id      = $shopData->id;
            $operator->save();
            
            return redirect(url('shop/team'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect()->back()->with('errror', 'Error! Email allready exists.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $operator)
    {   
        $operator = Operator::find($operator);
        $user     = User::where('id', $operator->user_id)->first();
        $editData =  ['record1'=>$operator->toArray(),'record'=>$user->toArray()];
        // dd($editData);
        $request->replace($editData);
        //send to view
        $request->flash();

        $role = Role::whereNotIn('id', [1,2,3])->orderBy('id', 'desc')->get();
        $roleArr  = ['' => 'Select role'];
        if (!$role->isEmpty()) {
            foreach ($role as $cat) {
                $roleArr[$cat->id] = $cat->name;
            }
        }
    
        // set page and title ------------------
        $page = 'team.edit';
        $title = 'Edit Team';
        $data = compact('page', 'title', 'operator', 'roleArr');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $operator)
    {
        $rules = [
            'record'        => 'required|array',
            'record.name'  => 'required|string'
        ];
        $messages = [
            'record.name'  => 'Please Enter Name.'
        ];
        $request->validate( $rules, $messages );
      
        $operator             = Operator::find($operator);
        $operator->role_id    = $request->record1['role_id'];
        $operator->save();

        $record               = User::where('id', $operator->user_id)->first();
        $record->name         = $request->record['name'];
        $record->email        = $request->record['email'];
        $record->password     = Hash::make($request->record['password1']);
        $record->save();


        return redirect(url('shop/team'))->with('success', 'Success! Record has been edided');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function destroy($operator)
    {
        $operator = Operator::find($operator);
        $operator->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
