<!DOCTYPE html>
<html>
<head>
    <title>Your Two-Factor Authentication Code</title>
</head>
<body>
<p>Dear {{ Auth::user()->name }},</p>
<p>Your Two-Factor Authentication code is:</p>
<h2>{{ $code }}</h2>
<p>Please use this code to complete your login. This code will expire in 10 minutes.</p>
<p>Thank you!</p>
</body>
</html>
