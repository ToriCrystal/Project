<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

class ProductController extends Controller
{
    public function index()
    {
        return view('client.index');
    }


    public function comment(Request $request, $product_id)
    {
        $validatedData = $request->validate([
            'content' => 'required|max:255',
        ]);

        $comment = new Comment();
        $comment->content = $validatedData['content'];
        $comment->id_sp = $product_id;
        $comment->save();

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $products = Product::where('ten_sp', 'like', '%' . $searchTerm . '%')->paginate(12);
        $totalCount = $products->total();

        return view('client.search', compact('products', 'searchTerm', 'totalCount'));
    }

    public function product()
    {
        $products = Product::paginate(12);
        $totalCount = Product::count();
        return view('client.product', compact('products', 'totalCount'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function detail($id)
    {
        $product = Product::join('sanphamchitiet', 'sanpham.id_sp', '=', 'sanphamchitiet.id_sp')
            ->with('category')
            ->find($id);

        if ($product) {
            $productDetail = $product; // The joined ProductDetail data is now part of $product
            $category = $product->category;

            $relatedProducts = $category->products()->where('id_sp', '<>', $id)->take(4)->get();

            return view('client.detail', compact('product', 'productDetail', 'relatedProducts'));
        }

        // Handle case when product is not found
        return abort(404);
    }

    public function __construct()
    {
        $listCategory = Category::all();
        \View::share('listCategory', $listCategory);
    }

    public function category($id)
    {
        $totalCount = Product::where('id_loai', $id)
            ->where('anhien', 1)
            ->count();
        $category = Product::with('loai')
            ->where('id_loai', $id)
            ->where('anhien', 1)
            ->paginate(12); // Use paginate() instead of get()

        return view('client.category', compact('category', 'totalCount'));
    }

    public function filter(Request $request)
    {
        $productsQuery = Product::query();
        $priceRange = $request->input('price_range');

        if ($priceRange) {
            if ($priceRange == '1') {
                $productsQuery->where('gia', '<', 10000000);
            } elseif ($priceRange == '2') {
                $productsQuery->where('gia', '>=', 10000000);
            }
        }

        $products = $productsQuery->paginate(12);
        return view('client.product', compact('products'));
    }
}
