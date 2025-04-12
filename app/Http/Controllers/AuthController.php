<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'recaptcha' => 'required',
        ]);

        // Verify reCAPTCHA
        $recaptchaResponse = Http::post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->recaptcha,
        ]);

        if (!$recaptchaResponse->json('success')) {
            return response()->json(['message' => 'Invalid reCAPTCHA'], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Send verification email using Brevo
        Http::post('https://api.brevo.com/v3/smtp/email', [
            'sender' => ['name' => 'Rio Verde Eco Lodge', 'email' => 'no-reply@rioverdeecolodge.com'],
            'to' => [['email' => $user->email]],
            'subject' => 'Verify Your Email',
            'htmlContent' => '<p>Click <a href="https://your-site.com/verify?email=' . $user->email . '">here</a> to verify your email.</p>',
        ]);

        return response()->json(['message' => 'User registered successfully. Please verify your email.'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
