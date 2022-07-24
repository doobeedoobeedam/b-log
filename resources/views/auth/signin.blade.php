@extends('templates/auth')
@section('content')
    <div class="card">
        <div class="card-image py-3">
            <h2 class="card-heading">
                Welcome Back
            </h2>
            <small>You will get some amazing things</small>
        </div>
        <form action="signin" method="post" class="card-form">
            @csrf
            <div class="form mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control rounded-0 border-0 ps-0 @error('username') is-invalid @enderror" id="username" name="username" placeholder="John Doe" value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control rounded-0 border-0 ps-0 @error('password') is-invalid @enderror" id="password" name="password" placeholder="******">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="action">
                <button type="submit" class="action-button">Sign In</button>
            </div>
        </form>
        <div class="card-info">
            <p>Not have an account? <a href="/signup">Sign Up</a></p>
        </div>
    </div>
@endsection