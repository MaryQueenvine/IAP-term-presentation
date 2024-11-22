<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use PragmaRX\Google2FA\Google2FA;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        public
        function store(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
                'two_factor_code' => 'nullable|string', // Add this for 2FA input
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                // Check if the user has 2FA enabled
                if ($user->two_factor_enabled) {
                    // If 2FA is enabled, verify the code
                    $google2fa = new Google2FA();
                    $valid = $google2fa->verifyKey($user->two_factor_secret, $request->input('two_factor_code'));

                    if (!$valid) {
                        // Logout the user and show an error
                        Auth::logout();
                        return redirect()->back()->withErrors(['two_factor_code' => 'Invalid 2FA code']);
                    }
                }

                // Redirect to intended page if login and 2FA are successful
                return redirect()->intended('dashboard');
            }

        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }




    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
