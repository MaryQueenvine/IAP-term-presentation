<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorVerificationController extends Controller
{

    public function showSetupForm()
    {
        $google2fa = new Google2FA();
        $user = auth()->user();

        $secret = $google2fa->generateSecretKey();

        return view('2fa.setup', ['secret' => $secret]);
    }

    public function store(Request $request)
    {
        $request->validate(['two_factor_secret' => 'required']);

        $user = auth()->user();
        $user->update([
            'two_factor_secret' => $request->input('two_factor_secret'),
            'two_factor_enabled' => true,
        ]);

        return redirect()->route('home')->with('status', '2FA enabled successfully!');
    }

    public function generateAndSendTwoFactorCode(User $user)
    {
        // Generate the 2FA code
        $code = rand(100000, 999999); // 6-digit code

        // Store the code in the database or session
        $user->update([
            'two_factor_code' => $code,
            'two_factor_expires_at' => now()->addMinutes(10), // Set an expiration time
        ]);

        // Send the email
        Mail::to($user->email)->send(new TwoFactorCodeMail($code));
    }

    public function verify(Request $request)
    {
        $google2fa = new Google2FA();
        $user = Auth::user();

        $request->validate([
            'two_factor_code' => 'required|string',
        ]);

        $valid = $google2fa->verifyKey($user->two_factor_secret, $request->input('two_factor_code'));

        if ($valid) {
            // Mark 2FA as passed in session
            $request->session()->put('2fa_passed', true);
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['two_factor_code' => 'Invalid 2FA code']);
    }

}
