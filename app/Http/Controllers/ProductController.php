<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Http\Requests\StorePostsRequest;

class ProductController extends Controller
{
    public function list()
    {
        $product = Product::all();
        return view('products/list', ['product' => $product]);
    }

    public function index()
    {
        $products = Product::paginate(9);
        return view('products', compact('products'));
    }

    public function paginate()
    {
        $products = Product::paginate(9);
        return view('paginate', compact('products'))->render();
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect('/products')->with('error', 'Product not found');
        }
        return view('single-product', compact('product'));
    }

    public function getProductDetail(Request $request, $id)
    {
        if ($request->ajax()) {
            $product = Product::findOrFail($id);
            $productDetails = [
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'img' => $product->img,
            ];
            return response()->json($productDetails);
        }
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->query('query');
            $products = Product::where('name', 'like', '%'.$query.'%')->get();

            return view('search', compact('products'));
        }
    }

    public function update_product(Request $request, $id)
    { 
        
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        if ($request->hasFile('img')) {
            // Xóa ảnh cũ nếu có
            if ($product->img) {
                $oldImagePath = str_replace("storage", "public", $product->img);
                Storage::delete($oldImagePath);
            }
            // Lưu ảnh mới và cập nhật đường dẫn ảnh
            $product->img = str_replace("public", "storage", $request->img->store('public/img'));
        }
        $product->category_id=$request->category_id;
        $product->save();
        return redirect('editor/products/list');
    }

    public function store(StorePostsRequest $request)
    {
        $product = new Product();
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->img =str_replace("public","storage", $request->img->store('public/img'));
        $product->category_id = $request->category_id;
        $product->save();
        return redirect('editor/products/list');
    }

    public function create_product()
    {
        $categories = Category::all();
        return view('products/insert_product', compact('categories'));
    }

    public function edit_product($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('products.edit_product', compact('product','categories'));
    }

    public function delete_product($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('editor/products/list')->with('success', 'Product deleted successfully.');
    }

    public function sort(Request $request)
    {
        $sort = $request->query('sort', 'desc');
        $products = Product::orderBy('price', $sort)->get();
        return view('sort', compact('products'));
    }
    

}
