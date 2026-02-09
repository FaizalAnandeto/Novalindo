<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $products = Product::active()->ordered()->with('category')->get();
        $selectedProduct = $request->query('product') ? Product::find($request->query('product')) : null;

        return view('order.create', compact('products', 'selectedProduct'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'nullable|string',
            'notes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.specifications' => 'nullable|string',
        ]);

        $order = Order::create([
            'order_number' => Order::generateOrderNumber(),
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'] ?? null,
            'customer_phone' => $validated['customer_phone'],
            'customer_address' => $validated['customer_address'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
            'total_amount' => 0,
        ]);

        $totalAmount = 0;

        foreach ($validated['items'] as $item) {
            $product = Product::find($item['product_id']);
            $subtotal = $product->price * $item['quantity'];
            $totalAmount += $subtotal;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $product->price,
                'subtotal' => $subtotal,
                'specifications' => $item['specifications'] ?? null,
            ]);
        }

        $order->update(['total_amount' => $totalAmount]);

        return redirect()->route('order.success', $order->order_number);
    }

    public function success(string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->with('items.product')->firstOrFail();
        return view('order.success', compact('order'));
    }

    public function track()
    {
        return view('order.track');
    }

    public function trackSearch(Request $request)
    {
        $validated = $request->validate([
            'order_number' => 'required|string',
            'customer_phone' => 'required|string',
        ]);

        $order = Order::where('order_number', $validated['order_number'])
            ->where('customer_phone', $validated['customer_phone'])
            ->with('items.product')
            ->first();

        if (!$order) {
            return back()
                ->withInput()
                ->withErrors(['not_found' => 'Pesanan tidak ditemukan. Pastikan nomor pesanan dan nomor telepon sudah benar.']);
        }

        return view('order.track', compact('order'));
    }
}
