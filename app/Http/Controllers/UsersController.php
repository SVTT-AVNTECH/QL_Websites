<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Post;
use App\Models\Category;
use App\Models\Order;
use App\Http\Requests\StorePostsRequest;
use Illuminate\Routing\Controller as BaseController;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('index', ['users' => $users]);
    }

    public function list()
    {
        $product = Product::all();
        return view('products/list', ['product' => $product]);
    }

    public function order()
    {
        $orders = Order::with('user', 'orderItems.product')->get();
        return view('products/order', compact('orders'));
    }

    public function create_category()
    {
        return view('insert_category');
    }

    public function insert_category(Request $request)
    {
        $category = new category();
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();
        return redirect('/editor');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = new User();
        $users->name=$request->name;
        $users->email-$request->email;
        $users->address=$request->address;
        $users->phone-$request->phone;
        $users->save();
        return redirect('/editor');
    }

    public function create_product()
    {
        $categories = Category::all();
        return view('insert_product', compact('categories'));
    }

    public function store(StorePostsRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->img =str_replace("public","storage", $request->img->store('public/img'));
        $product->category_id = $request->category_id;
        $product->save();
        return redirect('editor/products/list');
    }
}

