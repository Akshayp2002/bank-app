@extends('layouts.root')

@section('content')
    <div class="auth-container">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label>Name</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
@endsection
