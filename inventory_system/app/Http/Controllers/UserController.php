<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function enableTwoFactor(Request $request)
    {
        $google2fa = new Google2FA();

        // Generate a secret key
        $secret = $google2fa->generateSecretKey();

        // Save the secret key in the user record
        $request->user()->update([
            'two_factor_secret' => $secret,
            'two_factor_enabled' => true,
        ]);

        // Generate a QR code to scan with an authenticator app
        $qrCodeUrl = $google2fa->getQRCodeUrl(
            config('app.name'),
            $request->user()->email,
            $secret
        );

        return view('two-factor.enable', compact('qrCodeUrl'));
    }
}

