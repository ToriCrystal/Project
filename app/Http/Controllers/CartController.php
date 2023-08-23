<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;

class CartController extends Controller
{
    public function index($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        if (!isset($cart[$id])) {
            $cart[$id] = [
                "ten_sp" => $product->ten_sp,
                "hinh" => $product->hinh,
                "gia" => $product->gia,
                "soluong" => 1
            ];
        } else {
            $cart[$id]['soluong']++;
        }

        session()->put('cart', $cart);
        // dd($cart);
        return redirect()->back();
    }

    public function deleteCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        $newQuantity = $request->input('quantity');
        $cart = session()->get('cart', []);

        foreach ($newQuantity as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['soluong'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }


    public function cart()
    {
        return view('client.cart');
    }

    public function checkOut()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['gia'] * $item['soluong'];
        }

        return view('client.checkout', [
            'cart' => $cart,
            'total' => $total
        ]);
    }

    public function checkOutProcess(Request $request)
    {
        $user_id = auth()->user()->id;
        $total = $request->input('total');
        $shipping_address = $request->input('address');
        $name = $request->input('name');
        $phone = $request->input('phone');


        // Save order details to the database
        $order = new Order();
        $order->id_user = $user_id;
        $order->gia = $total;
        $order->diachigiaohang = $shipping_address;
        $order->tennguoinhan = $name;
        $order->dienthoai = $phone;
        // Set other order properties
        $order->save();

        foreach (session('cart') as $id => $details) {
            $orderDetail = new OrderDetail();
            $orderDetail->id_dh = $order->id;
            $orderDetail->id_sp = $id;
            $orderDetail->ten_sp = $details['ten_sp'];
            $orderDetail->soluong = $details['soluong'];
            $orderDetail->gia = $details['gia'];
            $orderDetail->save();
        }


        // Clear the cart after successful checkout
        session()->forget('cart');

        return redirect()->route('cart');
    }
}
