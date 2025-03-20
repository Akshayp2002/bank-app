@extends('layouts.admin')

@section('admin-content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
        <div class="bg-white shadow-xl rounded-lg p-8 w-1/3 max-w-xl">
            <!-- Error Message -->
            <x-alert-messages />
            <!-- User Name Section -->
            <div class="border-b pb-4 mb-4">
                <h2 class="text-3xl font-semibold text-gray-800">{{ $user->name ?? 'User' }}</h2>
            </div>
            <!-- User Balance Section -->
            <div class="pt-4">
                <p class="text-lg text-gray-600">Balance</p>
                <p class="text-4xl font-bold text-green-600">{{ number_format($user->account->balance, 2) ?? '0.00' }} INR
                </p>
            </div>
            <div class="pt-4">
                <p class="text-lg text-gray-600">Account Number</p>
                <p class="text-md font-bold text-blue-600">{{ $user->account->account_number ?? 'N/A' }}
                </p>
            </div>
            <!-- Additional Information or Actions -->
            <div class="mt-6">
                <a href="{{ route('admin.statement') }}"
                    class="w-full bg-indigo-600 text-white py-2 rounded-md text-center block hover:bg-indigo-700 transition duration-300">
                    View Statement
                </a>
            </div>
        </div>
    </div>
@endsection
