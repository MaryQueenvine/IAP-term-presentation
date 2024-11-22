<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
</head>
<body>
<h1>Create New Order</h1>
<form method="POST" action="{{ route('orders.store') }}">
    @csrf
    <label for="item_name">Item Name:</label>
    <input type="text" id="item_name" name="item_name" required>
    <br>
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" required>
    <br>
    <button type="submit">Create Order</button>
</form>
</body>
</html>
