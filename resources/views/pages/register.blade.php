 @extends('layouts.app')
 @section('content')

    <div class="form-container my-5">
        <div class="form-header">I'm a new customer! <span style="color: #666; font-weight: normal;">or</span> <a href="#" style="color: #0066cc; text-decoration: none; font-weight: 600;">Login</a></div>

        <form>
            <!-- Account Type -->
            <div class="mb-3">
                <label for="accountType" class="form-label">Account type<span class="required">*</span></label>
                <select class="form-select" id="accountType" required>
                    <option value="">Select...</option>
                    <option value="personal">Personal</option>
                    <option value="business">Business</option>
                </select>
            </div>

            <!-- Salutation -->
            <div class="mb-3">
                <label for="salutation" class="form-label">Salutation</label>
                <select class="form-select" id="salutation">
                    <option value="">Not specified</option>
                    <option value="mr">Mr.</option>
                    <option value="mrs">Mrs.</option>
                    <option value="ms">Ms.</option>
                    <option value="dr">Dr.</option>
                </select>
            </div>

            <!-- First and Last Name -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName" class="form-label">First name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="firstName" placeholder="Enter first name..." required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName" class="form-label">Last name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="lastName" placeholder="Enter last name..." required>
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">E-mail address<span class="required">*</span></label>
                <input type="email" class="form-control" id="email" placeholder="Enter email address..." required>
            </div>

            <!-- Password -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password<span class="required">*</span></label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password..." required>
                    <div class="password-hint">Password(s) must have a minimum length of 8 characters.</div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="confirmPassword" class="form-label">(Password confirmation)<span class="required">*</span></label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Enter your new password once again..." required>
                </div>
            </div>

            <!-- Address Section -->
            <div class="section-header">Your Address</div>

            <!-- Street Address and Postal Code -->
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="streetAddress" class="form-label">Street address<span class="required">*</span></label>
                    <input type="text" class="form-control" id="streetAddress" placeholder="Enter street address..." required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="postalCode" class="form-label">Postal code</label>
                    <input type="text" class="form-control" id="postalCode" placeholder="Enter postal code...">
                </div>
            </div>

            <!-- City and State -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="city" class="form-label">City<span class="required">*</span></label>
                    <input type="text" class="form-control" id="city" placeholder="Enter city..." required>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="state" class="form-label">State<span class="required">*</span></label>
                    <select class="form-select" id="state" required>
                        <option value="">Select state...</option>
                        <option value="state1">State 1</option>
                        <option value="state2">State 2</option>
                    </select>
                </div>
            </div>

            <!-- Country -->
            <div class="mb-3">
                <label for="country" class="form-label">Country<span class="required">*</span></label>
                <select class="form-select" id="country" required>
                    <option value="germany">Germany</option>
                    <option value="usa">United States</option>
                    <option value="uk">United Kingdom</option>
                </select>
            </div>

            <div class="shipping-note">Shipping and billing address do not match.</div>

            <!-- CAPTCHA -->
            <div class="captcha-box">
                <span class="captcha-text">efRNh9E</span>
                <button type="button" class="captcha-refresh">⟲</button>
            </div>
            <div class="captcha-instruction">To continue, enter the characters shown above<span class="required">*</span></div>
            <input type="text" class="form-control mt-2" id="captcha" placeholder="Enter CAPTCHA" required>

            <!-- Privacy -->
            <div class="privacy-text">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="privacyCheck">
                    <label class="form-check-label" for="privacyCheck">
                        By selecting continue you confirm that you have been <a href="#">data protection information</a> and <a href="#">general terms and conditions</a>.
                    </label>
                </div>
                <div>I also read and am familiar <span class="required">*</span> my <a href="#">right of revocation</a>.</div>
            </div>

            <!-- Submit Buttons -->
            <div class="row g-2 justify-content-center">
                <div class="col-md-6">
                    <button type="submit" class="btn-continue">Continue</button>
                </div>

            </div>
            <div class="row justify-content-center ">
                <h4 class="text-center my-3">or</h4>
                <div class="col-md-6 ">
                    <a href="{{route('loginpage')}}" >

                        <button type="button" class="btn-continue mt-0" style="background-color: #6c757d;" > Login</button>
                    </a>
                </div>
            </div>

        </form>
    </div>
@endsection
