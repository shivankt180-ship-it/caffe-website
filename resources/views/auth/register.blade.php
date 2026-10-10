@extends('layouts.app')

@section('content')
<section class="container py-5" style="max-width: 560px;">
    <h1 class="mb-4">Create account</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST" class="vstack gap-3">
        @csrf
        <div>
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" required autofocus class="form-control @error('name') is-invalid @enderror">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required class="form-control @error('email') is-invalid @enderror">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" autocomplete="new-password" required class="form-control @error('password') is-invalid @enderror">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="password_confirmation" class="form-label">Confirm password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required class="form-control">
        </div>
        <button type="submit" class="btn btn-dark">Create account</button>
    </form>

    <p class="mt-3">Already registered? <a href="{{ route('login') }}">Login</a></p>
</section>
@endsection