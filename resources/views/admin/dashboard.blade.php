@extends('layouts.admin')

@section('admin-content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-6 w-96 text-center">
            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                    {{ session('error') }}
                </div>
            @endif
            <!-- User Name Section -->
            <div class="border-b pb-4">
                <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name ?? 'User' }}</h2>
            </div>

            <!-- User Balance Section -->
            <div class="pt-4">
                <p class="text-lg text-gray-600">Balance</p>
                <p class="text-3xl font-bold text-green-500">{{ number_format($user->account->balance, 2) ?? '0.00' }} INR
                </p>
            </div>
        </div>
    </div>
@endsection
