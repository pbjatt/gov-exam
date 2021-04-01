<?php

namespace App\Http\Controllers\admin;

use Image;
use Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\Shop;
use App\Model\Shopdata;
use App\Model\Category;
use App\Model\Operator;
use App\Model\User;
use App\Model\City;
use App\Model\State;
use App\Model\Area;
use App\Model\Product;
use App\Model\Order;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guardData = Auth::guard()->user();
        if ( $guardData->role_id == '1' ) {
            $lists = Shop::orderBy('id', 'desc')->with('category')->paginate(10);
        }
        if ( $guardData->role_id == '2' ) {
            $shopertor = Operator::where('user_id', $guardData->id)->first();
            $shopData = Shop::find($shopertor->shop_id);

            $lists = Shop::where('id', $shopData->id)->orderBy('id', 'desc')->with('category','shopdata','user')->whereHas('shopdata', function($q) use ($shopData) {
                $q->with('city','state','area');
            })->paginate(10);
        }

        foreach ($lists as $key => $list) {
            $shopdata = Shopdata::where('shop_id', $list->id)->first();
            // dd($shopdata);
            $list['data'] = $shopdata;
        }
        // dd($lists);
        // set page and title ------------------
        $page  = 'shop.list';
        $title = 'Shop list';
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
        $lists = Shop::orderBy('id', 'desc')->get();

        $category = Category::orderBy('id', 'desc')->get();
        $parentArr  = ['' => 'Select category'];
        if (!$category->isEmpty()) {
            foreach ($category as $cat) {
                $parentArr[$cat->id] = $cat->name;
            }
        }
        $user = User::orderBy('id', 'desc')->where('role_id', 2)->get();
        $userArr  = ['' => 'Select User'];
        if (!$user->isEmpty()) {
            foreach ($user as $cat) {
                $userArr[$cat->id] = $cat->name;
            }
        }
        $state = State::orderBy('id', 'desc')->get();
        $stateArr  = ['' => 'Select State'];
        if (!$state->isEmpty()) {
            foreach ($state as $cat) {
                $stateArr[$cat->id] = $cat->name;
            }
        }
        $city = City::orderBy('id', 'desc')->get();
        $cityArr  = ['' => 'Select City'];
        if (!$city->isEmpty()) {
            foreach ($city as $cat) {
                $cityArr[$cat->id] = $cat->name;
            }
        }
        $area = Area::orderBy('id', 'desc')->get();
        $areaArr  = ['' => 'Select Area'];
        if (!$area->isEmpty()) {
            foreach ($area as $cat) {
                $areaArr[$cat->id] = $cat->name;
            }
        }

        // set page and title ------------------
        $page  = 'shop.add';
        $title = 'Add Shop';
        $data  = compact('page', 'title', 'lists', 'parentArr', 'userArr', 'stateArr', 'cityArr', 'areaArr');

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
        $guardData = Auth::guard()->user();
        $rules = [
            'record'        => 'required|array',
            'record.name'  => 'required|string',
            'image'  => 'required'
        ];
        
        $messages = [
            'record.name'  => 'Please Enter Name.',
            'image'  => 'Please Select Image'
        ];
        
        $request->validate( $rules, $messages );
        
        $record           = new Shop;
        $input            = $request->record;
        $input['slug']    = '';
        $input['slug']    = $input['slug'] == '' ? Str::slug($input['name'], '-'):$input['slug'];
        $record->fill($input);
        $record->save();

        $operator = new Operator;
        $operator->user_id = $request->user_id;
        $operator->shop_id = $record->id;
        $operator->role_id = 3;
        $operator->save();

        $record_data      = new Shopdata;
        $data             = $request->record_data;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/shop/';
            $name = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name, 72);
            $data['image'] = $name;
        } 
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/shop/logo/';
            $name1 = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name1, 72);
            $data['logo'] = $name1;
        } 
        if ($request->hasFile('fav_icon')) {
            $file = $request->fav_icon;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/shop/favicon/';
            $name2 = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name2, 72);
            $data['fav_icon'] = $name2;
        }
        $data['shop_id'] = $record->id;

        $record_data->fill($data);

        $record_data->save();
        // $input['slug']    = $input['slug'] == '' ? Str::slug($input['name'], '-'):$input['slug'];

        if($guardData->role_id == '1'){
            return redirect(url(env('ADMIN_DIR').'/shop'))->with('success', 'Success! New record has been added.');
        }
        if($guardData->role_id == '2'){
            return redirect(url('shop/product'))->with('success', 'Success! New record has been added.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        $guardData = Auth::guard()->user();
        if($guardData->role_id == '1'){
            $lists = Shop::with(['category','shopdata' => function($q) {
                    $q->with(['city','state' => function($q) {
                    $q->with('country');
                },'area']);
                },'user'])->where('id', $shop->id)->first();
            $product = Product::with('category','productdata','brand','shop','productvarient')->whereHas('productvarient', function($q) use ($shop) {
                    $q->where('shop_id', $shop->id);
                })->get();
        }
        if($guardData->role_id == '2'){
            $shopertor = Operator::where('user_id', $guardData->id)->first();
            $shopData = Shop::find($shopertor->shop_id);

            $lists = Shop::with(['category','shopdata' => function($q) {
                    $q->with(['city','state' => function($q) {
                    $q->with('country');
                },'area']);
                },'user'])->where('id', $shopData->id)->first();
            $product = Product::with('category','productdata','brand','shop','productvarient')->whereHas('productvarient', function($q) use ($shopData) {
                    $q->where('shop_id', $shopData->id);
                })->get();

            $order = Order::orderBy('id', 'desc')->with(['user','shop','ordermenu','orderaddress'])->whereHas('ordermenu', function($q) use ($shopData) {
                    $q->where('shop_id', $shopData->id);
                })->get();
            $deliveredOrder = Order::orderBy('id', 'desc')->with(['user','shop','ordermenu','orderaddress'])->whereHas('ordermenu', function($q) use ($shopData) {
                    $q->where('shop_id', $shopData->id)->where('status', 'delivered');
                })->get();
        }
       
        // set page and title ------------------
        $page = 'shop.single';
        $title = 'Edit Shop';
        $data = compact('page', 'title', 'lists', 'product', 'order', 'deliveredOrder');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, shop $shop)
    {
        $edit     =  Shop::find($shop->id);
        $edit_data     =  Shopdata::where('shop_id', $shop->id)->first();
        
        $editData =  ['record'=>$edit->toArray(),'record_data'=>$edit_data->toArray()];
        $request->replace($editData);
        //send to view
        $request->flash();
       
        $category = Category::orderBy('id', 'desc')->get();
        $parentArr  = ['' => 'Select category'];
        if (!$category->isEmpty()) {
            foreach ($category as $cat) {
                $parentArr[$cat->id] = $cat->name;
            }
        }
        $user = User::orderBy('id', 'desc')->where('role_id', 2)->get();
        $userArr  = ['' => 'Select User'];
        if (!$user->isEmpty()) {
            foreach ($user as $cat) {
                $userArr[$cat->id] = $cat->name;
            }
        } 
        $state = State::orderBy('id', 'desc')->get();
        $stateArr  = ['' => 'Select State'];
        if (!$state->isEmpty()) {
            foreach ($state as $cat) {
                $stateArr[$cat->id] = $cat->name;
            }
        }
        $city = City::orderBy('id', 'desc')->get();
        $cityArr  = ['' => 'Select City'];
        if (!$city->isEmpty()) {
            foreach ($city as $cat) {
                $cityArr[$cat->id] = $cat->name;
            }
        }
        $area = Area::orderBy('id', 'desc')->get();
        $areaArr  = ['' => 'Select Area'];
        if (!$area->isEmpty()) {
            foreach ($area as $cat) {
                $areaArr[$cat->id] = $cat->name;
            }
        }    
        
        // set page and title ------------------
        $page = 'shop.edit';
        $title = 'Edit Shop';
        $data = compact('page', 'title','shop', 'parentArr', 'userArr', 'stateArr', 'cityArr', 'areaArr');
        // return data to view

        return view('backend.layout.master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $guardData = Auth::guard()->user();
        $rules = [
            'record'        => 'required|array',
            'record.name'  => 'required|string'
        ];
        
        $messages = [
            'record.name'  => 'Please Enter Name.'
        ];
        
        $request->validate( $rules, $messages );
        
        $record           = Shop::find($shop->id);
        $input            = $request->record;

        $record->fill($input);
        $record->save();

        $record_data      = Shopdata::where('shop_id', $shop->id)->first();
        $data             = $request->record_data;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/shop/';
            $name = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name, 72);
            $data['image'] = $name;
        } 
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/shop/logo/';
            $name1 = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name1, 72);
            $data['logo'] = $name1;
        } 
        if ($request->hasFile('fav_icon')) {
            $file = $request->fav_icon;
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/shop/favicon/';
            $name2 = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$name2, 72);
            $data['fav_icon'] = $name2;
        }
        $data['shop_id'] = $record->id;

        $record_data->fill($data);

        $record_data->save();

        if($guardData->role_id == '1'){
            return redirect(url(env('ADMIN_DIR').'/shop'))->with('success', 'Success! Record has been edided');
        }
        if($guardData->role_id == '2'){
            return redirect(url('shop/shop'))->with('success', 'Success! Record has been edided');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shopdata = Shopdata::where('shop_id', $shop->id)->first();
        $shopdata->delete();
        $shop->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }
}
