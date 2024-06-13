<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderItem;

    class CartController extends Controller
    {
        public function index()
        {
            $cart = session()->get('cart', []);
            return view('cart.index', compact('cart'));
        }

        public function add(Request $request, $productId)
        {
            $product = Product::find($productId);
            if (!$product) {
                return response()->json(['message' => 'Sản phẩm không tồn tại.'], 404);
            }
            $size = $request->input('size', 'S');
            $cart = session()->get('cart', []);
            // Tạo key cho từng sản phẩm với kích cỡ riêng biệt
            $cartKey = $productId . '_' . $size;
            if (isset($cart[$cartKey])) {
                // Nếu sản phẩm với kích cỡ này đã tồn tại trong giỏ hàng, tăng số lượng
                $cart[$cartKey]['quantity']++;
            } else {
                // Nếu sản phẩm với kích cỡ này chưa tồn tại trong giỏ hàng, thêm mới
                $cart[$cartKey] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'size' => $size,
                    'img' => $product->img
                ];
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        
        public function getCartCount()
        {
            $cart = session()->get('cart', []);
            $count = array_sum(array_column($cart, 'quantity'));
            return $count;
        }

        public function remove(Request $request, $id)
        {
            $cart = session()->get('cart');

            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product removed successfully!');
        }

        public function update(Request $request, $id)
        {
            $cart = session()->get('cart');

            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product updated successfully!');
        }


    public function checkout(Request $request)
    {
        try {
            // Retrieve cart items from session
            $cart = session()->get('cart');

            // Check if cart is not empty
            if (!$cart) {
                return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
            }

            // Loop through each item in the cart and create OrderItems
            foreach ($cart as $id => $details) {
                // Create a new OrderItem instance
                $orderItem = new OrderItem();
                // Assign values from cart details to OrderItem attributes
                $orderItem->product_id = $details['product_id'];
                $orderItem->size_id = $details['size_id'] ?? null;
                $orderItem->quantity = $details['quantity'];
                $orderItem->price = $details['price'];

                // Save the OrderItem to the database
                $orderItem->save();
            }

            // Clear the cart after checkout
            session()->forget('cart');

            // Redirect to a thank-you page or another route
            return redirect()->route('thank-you')->with('success', 'Order placed successfully.');

        } catch (\Exception $e) {
            // Handle any exceptions that occur during the checkout process
            return redirect()->route('cart.index')->with('error', 'Failed to checkout. Please try again later.');
        }
    }
}
