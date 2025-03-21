@extends('layouts.auth')

@section('auth')
    <div class="container mx-auto p-8 flex">
        <div class="max-w-md w-full mx-auto">
            <h1 class="text-4xl text-center mb-12 font-thin">Register</h1>
            <!-- Error Messages -->
            <x-alert-messages />

            <div class="bg-white rounded-lg overflow-hidden shadow-2xl">
                <div class="p-8">
                    <form method="POST" action="{{ route('register.process') }}">
                        @csrf 

                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-600">Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
                        </div>

                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
                        </div>

                        <div class="mb-5">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
                            <input type="password" name="password" required
                                class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
                        </div>

                        <div class="mb-5">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-600">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" required
                                class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
                        </div>

                        <button class="w-full p-3 mt-4 bg-indigo-600 text-white rounded shadow">Register</button>
                    </form>
                </div>

                <div class="flex justify-between p-8 text-sm border-t border-gray-300 bg-gray-100">
                    <a href="{{ route('login') }}" class="font-medium text-indigo-500">Already have an account? Login</a>
                </div>
            </div>
        </div>
    </div>
@endsection
