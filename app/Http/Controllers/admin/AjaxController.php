<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Order;
use App\Model\Order_menu;

class AjaxController extends Controller
{

    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // const baseUrl = $('base').attr('href')+'/';
        $products    = Product::where('name', 'LIKE', '%'.$request->search.'%')->paginate(8);
        // dd($product);

        $li = '<ul class="list-group">';
        foreach ($products as $product) {
          $li .= '<a href="http://localhost/multi-vender/shop/products/add/'. $product->id .'"><li class="list-group-item" data-id="'. $product->id .'">' . $product->name . '</li></a>';
        }
        $li .= '</ul>';

        return response()->json($li, 200);
    }

    public function order_status(Request $request)
    {
        $record           = Order_menu::find($request->id);
        $record->status   = $request->status;
        $record->save();

        $re = [
            'status'    => true,
            'message'   => 'Status has been changed.' 
        ];

        return response()->json($re, 200);
    }
}
