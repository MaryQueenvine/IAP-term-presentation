<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
</head>
<body>
<h1>Order Details</h1>
<p><strong>Item Name:</strong> {{ $order->item_name }}</p>
<p><strong>Quantity:</strong> {{ $order->quantity }}</p>
<a href="{{ route('orders.index') }}">Back to Orders</a>
</body>
</html>
