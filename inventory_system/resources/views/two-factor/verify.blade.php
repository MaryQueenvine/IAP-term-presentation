<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Factor Authentication</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

</head>
<body>
<div class="container mt-5">
    <h1>Two-Factor Authentication</h1>
    <form method="POST" action="{{ route('two-factor.verify') }}">
        @csrf
        <div class="mb-3">
            <label for="two_factor_code" class="form-label">Enter 2FA Code</label>
            <input type="text" class="form-control" id="two_factor_code" name="two_factor_code" required autofocus>
        </div>
        @if ($errors->has('two_factor_code'))
            <div class="text-danger">
                {{ $errors->first('two_factor_code') }}
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
</div>
</body>
</html>
