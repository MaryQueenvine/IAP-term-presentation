<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create() {
        return view('orders.create');
    }

    public function edit($id) {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    public function show($id) {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

}
