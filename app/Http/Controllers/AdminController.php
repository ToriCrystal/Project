<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $countOrders = Order::count();
        $orders = Order::all(); // Lấy danh sách đơn hàng
        return view('admin.index', compact('countOrders', 'orders'));
    }

    public function product()
    {
        $products = Product::paginate(12);
        return view('admin.product', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function category()
    {
        $category = Category::all();
        return view('admin.category', compact('category'));
    }

    public function destroyProduct($id)
    {
        Product::destroy($id);
        return redirect()->back();
    }

    public function editProduct($id_sp)
    {
        $category = Category::all();
        $product = Product::find($id_sp);
        return view('admin.edit-product', compact('product', 'category'));
    }

    public function editProduct_(Request $request, $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        $validatedData = $request->validate([
            'Name' => 'required|max:255',
            'Price' => 'required|numeric',
            'urlHinh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_loai' => 'required|exists:loai,id_loai'
        ]);
    
        $product->ten_sp = $validatedData['Name'];
        $product->gia = $validatedData['Price'];
        $product->id_loai = $validatedData['id_loai'];
    
        if ($request->hasFile('urlHinh')) {
            $imagePath = $request->file('urlHinh')->store('public/images');
            $product->hinh = $imagePath;
        }
    
        $product->save();
    
        return redirect()->route('product');
    }
    
}
