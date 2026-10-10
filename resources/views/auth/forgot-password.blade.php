@extends('layouts.app')

@section('content')
<section class="container py-5" style="max-width: 560px;">
    <h1 class="mb-3">Reset your password</h1>
    <p>Enter your account email and we will send you a password reset link.</p>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <form action="{{ route('password.email') }}" method="POST" class="vstack gap-3">
        @csrf
        <div>
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus class="form-control @error('email') is-invalid @enderror">
        </div>
        <button type="submit" class="btn btn-dark">Send reset link</button>
    </form>

    <p class="mt-3"><a href="{{ route('login') }}">Back to login</a></p>
</section>
@endsection