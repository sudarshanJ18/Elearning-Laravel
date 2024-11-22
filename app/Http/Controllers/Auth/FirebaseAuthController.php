<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth as FirebaseAuth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class FirebaseAuthController extends Controller
{
    protected $firebaseAuth;

    public function __construct()
    {
        $this->firebaseAuth = (new Factory)->createAuth();
    }

    /**
     * Login with Firebase ID Token
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginWithFirebase(Request $request)
    {
        $idToken = $request->input('idToken');

        if (!$idToken) {
            return response()->json(['error' => 'ID token is required'], 400);
        }

        try {
            $verifiedIdToken = $this->firebaseAuth->verifyIdToken($idToken);

            $uid = $verifiedIdToken->claims()->get('sub');
            $email = $verifiedIdToken->claims()->get('email');
            $name = $verifiedIdToken->claims()->get('name') ?? 'User';

            if (!$email) {
                return response()->json(['error' => 'Email not found in the ID token'], 400);
            }

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => bcrypt(str_random(16)), // Generate a dummy password
                ]
            );

            Auth::login($user);

            return response()->json([
                'message' => 'User successfully authenticated',
                'user' => $user,
            ]);
        } catch (\Kreait\Firebase\Exception\Auth\InvalidToken $e) {
            Log::error('Invalid Firebase ID token: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid ID token'], 401);
        } catch (\Kreait\Firebase\Exception\Auth\AuthError $e) {
            Log::error('Firebase Auth error: ' . $e->getMessage());
            return response()->json(['error' => 'Authentication failed'], 500);
        } catch (\Exception $e) {
            Log::error('Unexpected error during authentication: ' . $e->getMessage());
            return response()->json(['error' => 'Unexpected error occurred'], 500);
        }
    }
}
