<?php

namespace App\Http\Controllers\Backend;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();

        $title = 'Hapus pesan !';
        $text =  'Apakah anda yakin ingin menghapus pesan ini ?';
        confirmdelete($title,$text);
         return view('backend.order.index', compact('orders'));
    }

    public function show($id)
    {
        $orders = Order::with('user','product')->findOrFail($id);
        return view('backend.order.show', compact('orders'));
    }

    public function destroy($id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete;
        toats('Pesanan berhasil dihapus', 'success');
        return redirect()->route('backend.order.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,success,cancel'
        ]);

        $orders =       Order::findOrFail($id);
        $orders->status  = $request->status;
        $orders->save();

        toast('Status order berhasil di perbarui', 'success');
        return redirect()->rout('backebd.order.show', $id);
    }
}
