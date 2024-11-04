<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function generateToken()
    {
        $token = Str::random(60);
        Token::create([
            'value' => $token,
            'expires_at' => now()->addMinutes(10) 
        ]);

        return response()->json(['token' => $token]);
    }
}
