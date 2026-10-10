@extends('layouts.app')

@section('content')
<section class="container py-5" style="max-width: 560px;">
    <h1 class="mb-4">Choose a new password</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST" class="vstack gap-3">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $email) }}" autocomplete="email" required class="form-control @error('email') is-invalid @enderror">
        </div>
        <div>
            <label for="password" class="form-label">New password</label>
            <input id="password" type="password" name="password" autocomplete="new-password" required class="form-control @error('password') is-invalid @enderror">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="password_confirmation" class="form-label">Confirm new password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required class="form-control">
        </div>
        <button type="submit" class="btn btn-dark">Reset password</button>
    </form>
</section>
@endsection