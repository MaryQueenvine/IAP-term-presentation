<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
</head>
<body>
<h1>Edit Order</h1>
<form method="POST" action="{{ route('orders.update', $order->id) }}">
    @csrf
    @method('PUT')
    <label for="item_name">Item Name:</label>
    <input type="text" id="item_name" name="item_name" value="{{ $order->item_name }}" required>
    <br>
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" value="{{ $order->quantity }}" required>
    <br>
    <button type="submit">Update Order</button>
</form>
</body>
</html>
