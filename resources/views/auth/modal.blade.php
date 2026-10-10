<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable auth-modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="authModalTitle">Welcome back</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="auth-modal-switch" role="tablist" aria-label="Account access">
                    <button type="button" class="active" data-auth-mode="login" role="tab" aria-selected="true" aria-controls="authLoginPanel">Login</button>
                    <button type="button" data-auth-mode="register" role="tab" aria-selected="false" aria-controls="authRegisterPanel">Register</button>
                </div>

                <section id="authLoginPanel" class="auth-modal-panel" data-auth-panel="login" role="tabpanel">
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
                            <label for="auth-login-email" class="form-label">Email</label>
                            <input id="auth-login-email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required class="form-control @error('email') is-invalid @enderror">
                        </div>
                        <div>
                            <label for="auth-login-password" class="form-label">Password</label>
                            <input id="auth-login-password" type="password" name="password" autocomplete="current-password" required class="form-control">
                        </div>
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" value="1" @checked(old('remember'))>
                            <span class="form-check-label">Remember me</span>
                        </label>
                        <button type="submit" class="btn btn-dark w-100">Login</button>
                    </form>
                    <div class="auth-modal-links">
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                        <button type="button" data-auth-mode="register">Create account</button>
                    </div>
                </section>

                <section id="authRegisterPanel" class="auth-modal-panel" data-auth-panel="register" role="tabpanel" hidden>
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
                            <label for="auth-register-name" class="form-label">Name</label>
                            <input id="auth-register-name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" required class="form-control @error('name') is-invalid @enderror">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label for="auth-register-email" class="form-label">Email</label>
                            <input id="auth-register-email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required class="form-control @error('email') is-invalid @enderror">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label for="auth-register-password" class="form-label">Password</label>
                            <input id="auth-register-password" type="password" name="password" autocomplete="new-password" required class="form-control @error('password') is-invalid @enderror">
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label for="auth-register-password-confirmation" class="form-label">Confirm password</label>
                            <input id="auth-register-password-confirmation" type="password" name="password_confirmation" autocomplete="new-password" required class="form-control">
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Create account</button>
                    </form>
                    <div class="auth-modal-links">
                        <span>Already registered?</span>
                        <button type="button" data-auth-mode="login">Login</button>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>