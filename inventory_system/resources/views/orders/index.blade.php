<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<body>
<h1>Orders</h1>
<a href="{{ route('orders.create') }}">Create New Order</a>
<ul>
    @foreach ($orders as $order)
        <li>
            {{ $order->item_name }} ({{ $order->quantity }})
            <a href="{{ route('orders.edit', $order->id) }}">Edit</a>
            <a href="{{ route('orders.show', $order->id) }}">View</a>
        </li>
    @endforeach
</ul>
</body>
</html>
