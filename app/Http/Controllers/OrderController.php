<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        $menus = Menu::all();
        $order = Order::where('user_id', Auth::id())
                        ->where('status', 'pending')
                        ->with('items.menu')
                        ->first();
        $menuData = $menus->map(fn($m) => [
            'id' => $m->id,
            'name' => $m->name,
            'cat' => $m->category,
            'price' => $m->price,
            'img' => $m->image,
            'desc' => $m->description,
            'tags' => $m->tags ?? [],
            'badge' => $m->badge,
        ]);
        return view('orders.pesan', compact('menus', 'order', 'menuData'));
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
                        ->with('items.menu')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::find($request->menu_id);

        $order = Order::firstOrCreate(
            ['user_id' => Auth::id(), 'status' => 'pending'],
            ['total_price' => 0]
        );

        $orderItem = OrderItem::where('order_id', $order->id)
                                ->where('menu_id', $menu->id)
                                ->first();

        if ($orderItem) {
            $orderItem->quantity += $request->quantity;
            $orderItem->save();
        } else {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $menu->id,
                'quantity' => $request->quantity,
                'price' => $menu->price,
            ]);
        }

        $this->updateOrderTotal($order);

        return redirect()->back()->with('success', 'Berhasil ditambahkan ke pesanan!');
    }

    public function checkout(Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);

        $order->status = 'completed';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil di-checkout!');
    }

    public function destroy(Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);

        $order->items()->delete();
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus!');
    }

    private function updateOrderTotal(Order $order)
    {
        $total = 0;
        foreach ($order->items as $item) {
            $total += ($item->price * $item->quantity);
        }
        $order->total_price = $total;
        $order->save();
    }
}
