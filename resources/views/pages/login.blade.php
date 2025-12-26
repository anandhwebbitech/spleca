 @extends('layouts.app')
 @section('content')

    <div class="form-container my-5">
        <div class="form-header">I'm a customer already!</div>
        <div class="form-subheader">Log in with email address and password</div>

        <form>
            <!-- Email and Password -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Your email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email address..." required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Your password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password..." required>
                </div>
            </div>

            <!-- Forgot Password Link -->
            <a href="#" class="forgot-password">I have forgotten my password.</a>

            <!-- Login Button -->
            <!-- <div class="mb-3"> -->
            <div class="row g-2 justify-content-center">
                <div class="col-md-6">
                    <button type="submit" class="btn-login">Log in</button>
                </div>
            </div>

            <!-- Divider -->
            <div class="divider">or</div>

            <!-- Sign Up Button -->
            <div class="row g-2 justify-content-center">
                <div class="col-md-6">
                    <a href="{{ route('registerpage') }}">
                        <button type="button" class="btn-signup" >Sign up</button>
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
