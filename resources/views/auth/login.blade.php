@extends('layouts.app')

@section('content')
<section class="container py-5" style="max-width: 560px;">
    <h1 class="mb-4">Welcome back</h1>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST" class="vstack gap-3">
        @csrf
        <div>
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus class="form-control @error('email') is-invalid @enderror">
        </div>
        <div>
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" autocomplete="current-password" required class="form-control">
        </div>
        <label class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" value="1" @checked(old('remember'))>
            <span class="form-check-label">Remember me</span>
        </label>
        <button type="submit" class="btn btn-dark">Login</button>
    </form>

    <p class="mt-3"><a href="{{ route('password.request') }}">Forgot your password?</a></p>
    <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
</section>
@endsection