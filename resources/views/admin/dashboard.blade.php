@extends('layouts.admin')

@section('admin-content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
        <div class="bg-white shadow-xl rounded-lg p-8 w-full max-w-lg sm:w-3/4 md:w-1/2 lg:w-1/3">
            <!-- Error Message -->
            <x-alert-messages />
            <div class="border-b pb-4 mb-4">
                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">{{ $user->name ?? 'User' }}</h2>
            </div>

            <div class="pt-4">
                <p class="text-lg sm:text-xl text-gray-600">Balance</p>
                <p class="text-3xl sm:text-4xl font-bold text-green-600">
                    {{ number_format($user->account->balance, 2) ?? '0.00' }} INR</p>
            </div>

            <div class="pt-4">
                <p class="text-lg sm:text-xl text-gray-600">Account Number</p>
                <p class="text-md sm:text-lg font-bold text-blue-600">{{ $user->account->account_number ?? 'N/A' }}</p>
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.statement') }}"
                    class="w-full bg-indigo-600 text-white py-2 rounded-md text-center block hover:bg-indigo-700 transition duration-300">
                    View Statement
                </a>
            </div>
        </div>
    </div>
@endsection
