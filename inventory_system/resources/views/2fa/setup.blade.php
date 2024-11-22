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
<h2>Enable Two-Factor Authentication</h2>
<p>Scan the QR code with your authenticator app:</p>

<div>
    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($secret) !!}
</div>

<form method="POST" action="{{ route('2fa.setup') }}">
    @csrf
    <input type="hidden" name="two_factor_secret" value="{{ $secret }}">
    <button type="submit">Enable 2FA</button>
</form>

</body>
</html>
