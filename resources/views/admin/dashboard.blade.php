{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.app') {{-- Extends the app layout --}}

@section('content') {{-- Define the content section for the dashboard --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Admin Dashboard') }}</div>
                    <div class="card-body">
                        {{-- Welcome message --}}
                        <h4>{{ __('Welcome, Admin!') }}</h4>

                        {{-- Admin dashboard options --}}
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('admin.users') }}">{{ __('User List') }}</a></li>
                            <li class="list-group-item"><a href="{{ route('admin.uploads') }}">{{ __('Manage Uploads') }}</a></li>
                            <li class="list-group-item"><a href="{{ route('admin.logout') }}">{{ __('Logout') }}</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
