@extends('layouts.app')

@section('content')
<div class="text-center mb-5">
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ url('/home') }}" class="btn btn-primary shadow animated zoomIn delay-2s">Home</a>
            <a href="{{ url('/resources') }}" class="btn btn-info shadow animated zoomIn delay-3s">Resources</a>
            <a href="{{ url('/gamification') }}" class="btn btn-warning shadow animated zoomIn delay-4s">Gamification</a>
            <a href="{{ url('/contact') }}" class="btn btn-success shadow animated zoomIn delay-5s">Contact</a>
            <a href="{{ url('/profile') }}" class="btn btn-secondary shadow animated zoomIn delay-6s">Profile</a>
        </div>
    </div>
    <div class="container mx-auto">
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Profile</h2>

            @if(session('success'))
                <div class="bg-green-500 text-white p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border rounded" value="{{ old('name', $user->name) }}">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border rounded" value="{{ old('email', $user->email) }}">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Update Profile</button>
            </form>

            <!-- Change Password Form -->
            <form action="{{ route('profile.changePassword') }}" method="POST" class="mt-6">
                @csrf

                <div class="mb-4">
                    <label for="current_password" class="block text-gray-700">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="w-full p-2 border rounded">
                    @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="new_password" class="block text-gray-700">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="w-full p-2 border rounded">
                    @error('new_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="new_password_confirmation" class="block text-gray-700">Confirm New Password</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="w-full p-2 border rounded">
                </div>

                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg">Change Password</button>
            </form>
        </div>
    </div>
@endsection
