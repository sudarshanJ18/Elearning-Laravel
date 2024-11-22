@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input
                                type="email"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input
                                type="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                    </form>

                    <hr>

                    <!-- Register Navigation -->
                    <div class="text-center mt-3">
                        <span>{{ __("Don't have an account?") }}</span>
                        <a href="{{ route('register') }}" class="text-primary">{{ __('Register here') }}</a>
                    </div>

                    <hr>

                    <!-- Animated Social Login Icons -->
                    <div class="text-center mb-3">{{ __('Or Login with') }}</div>
                    <div class="social-icons d-flex justify-content-center">
                        <div class="icon-wrapper" onclick="signInWithProvider('google')">
                            <i class="fab fa-google"></i>
                        </div>
                        <div class="icon-wrapper" onclick="signInWithProvider('facebook')">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                        <div class="icon-wrapper" onclick="signInWithProvider('twitter')">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <div class="icon-wrapper" onclick="signInWithProvider('linkedin')">
                            <i class="fab fa-linkedin-in"></i>
                        </div>
                    </div>

                    <!-- Loading and Error Messages -->
                    <div id="loading" class="text-center mt-3 d-none">Loading...</div>
                    <div id="error" class="alert alert-danger mt-3 d-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module">
// Import Firebase modules (Modular SDK)
import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.23.0/firebase-app.js';
import { getAuth, signInWithPopup, GoogleAuthProvider, FacebookAuthProvider, TwitterAuthProvider, OAuthProvider } from 'https://www.gstatic.com/firebasejs/9.23.0/firebase-auth.js';

// Firebase Configuration
const firebaseConfig = {
    apiKey: "{{ config('services.firebase.api_key') }}",
    authDomain: "{{ config('services.firebase.auth_domain') }}",
    projectId: "{{ config('services.firebase.project_id') }}",
    storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    messagingSenderId: "{{ config('services.firebase.messaging_sender_id') }}",
    appId: "{{ config('services.firebase.app_id') }}",
    measurementId: "{{ config('services.firebase.measurement_id') }}"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

// Function to handle OAuth login
async function signInWithProvider(providerName) {
    document.getElementById('loading').classList.remove('d-none'); // Show loading
    document.getElementById('error').classList.add('d-none'); // Hide error

    let provider;
    switch (providerName) {
        case 'google':
            provider = new GoogleAuthProvider();
            break;
        case 'facebook':
            provider = new FacebookAuthProvider();
            break;
        case 'twitter':
            provider = new TwitterAuthProvider();
            break;
        case 'linkedin':
            provider = new OAuthProvider('linkedin.com');
            break;
        default:
            document.getElementById('loading').classList.add('d-none'); // Hide loading
            console.error("Unsupported provider");
            return;
    }

    try {
        // Perform sign-in with the provider
        const result = await signInWithPopup(auth, provider);
        const user = result.user;
        const idToken = await user.getIdToken();

        const response = await fetch('/firebase-login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ idToken }),
        });

        if (!response.ok) {
            throw new Error(await response.text());
        }

        window.location.href = '/dashboard';
    } catch (error) {
        console.error('Authentication error:', error);
        document.getElementById('error').classList.remove('d-none');
        document.getElementById('error').innerText = error.message;
    } finally {
        document.getElementById('loading').classList.add('d-none');
    }
}
</script>
<style>
    .social-icons {
        gap: 15px;
    }

    .icon-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #f1f1f1;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .icon-wrapper:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .icon-wrapper i {
        font-size: 24px;
        color: #555;
    }

    .icon-wrapper:hover i {
        color: #000;
    }
</style>
@endsection
