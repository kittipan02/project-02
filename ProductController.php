<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\SaleDetail;
use App\Models\Sale;
use Session;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    public function productList()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }
    public function productRecommend()
    {
        $products = Product::orderBy('id')->paginate(4);

        return view('dashboard', compact('products'));
    }
    function orderAdd(Request $req)
    {
        $data = Product::all();
        return view('orderadd', ['products'=>$data]);
    }
    function orderPlace(Request $req)
    {
        $cartUser = auth()->user()->id;
        $cartItems = SaleDetail::where('user_id', $cartUser)->get();
        foreach($cartItems as $item){
            $order = Order::create([
                'product_id' => $item->pro_id,
                'user_id' => $item->user_id,
                'status' => "รอดำเนินการ",
                'payment_method' => $req->payment,
                'payment_status' => "รอดำเนินการ",
                'ctm_name' => $req->name,
                'address' => $req->address,
            ]);
        };
        $req->input();
        return redirect()->route('products.list');
    }
    function orderlist()
    {
        $cartUser = auth()->user()->id;
        $orders = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.user_id', $cartUser)
        ->get();

        return view('orderlist', ['orders'=> $orders]);
    }
    
    function detail($id)
    {
        $data = Product::find($id);

        return view('detail', ['product'=>$data]);
    }
    function search(Request $req)
    {
        $data= Product::where('name', 'like', '%'.$req->input('query').'%')->get();
        return view('search', ['products'=>$data]);
    }
}