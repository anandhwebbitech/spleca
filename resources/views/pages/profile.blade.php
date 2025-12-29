 @extends('layouts.app')
 @section('content')
 @php
 $user = Auth::user();
 @endphp
 <div class="container my-5">
     <div class="row">
         <!-- Sidebar -->
         <div class="col-md-2 sidebar">
             <div class="user-greeting">Hello, {{ $user->name }}</div>
             <nav class="nav flex-column">
                 <a class="nav-link active" data-page="overview">Overview</a>
                 <a class="nav-link" data-page="profile">Your profile</a>
                 <a class="nav-link" data-page="addresses">Addresses</a>
                 <a class="nav-link" data-page="payment">Payment methods</a>
                 <a class="nav-link" data-page="orders">Orders</a>
             </nav>
             <a class="logout-link" href="{{route('loginpage')}}">
                 <i class="fas fa-sign-out-alt"></i> LogIn
             </a>
             <!-- <a class="logout-link" id="logoutBtn">
                    <i class="fas fa-sign-out-alt"></i> Log out
                </a> -->
             <button type="button" id="logoutBtn" class="logout-link">
                 <i class="fas fa-sign-out-alt"></i> Log out
             </button>
         </div>

         <!-- Main Content -->
         <div class="col-md-10 main-content">
             <!-- Overview Page -->
             <div id="overview-page" class="content-page">
                 <h1 class="section-title">Overview</h1>
                 <p class="mb-4">Directly access your profile information, the default payment method and given addresses.</p>

                 <div class="row">
                     <div class="col-md-6">
                         <h2 class="subsection-title">Personal data</h2>
                         <div class="info-card">
                             <p class="mb-2"><strong>{{ $user->name }}</strong></p>
                             <p class="mb-0">{{ $user->email }}</p>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <h2 class="subsection-title">Default payment method</h2>
                         <div class="info-card">
                             <p class="mb-1"><strong>PayPal</strong></p>
                             <p class="mb-0">Payment via PayPal - easy, fast and secure.</p>
                         </div>
                     </div>
                 </div>

                 <div class="row mt-3">
                     <div class="col-md-6">
                         <h2 class="subsection-title">Default billing address</h2>
                         <div class="info-card">
                             <p class="mb-1">Manu D</p>
                             <p class="mb-1">166, 3rd street, periyar colony</p>
                             <p class="mb-1">641 652 Tiruppur</p>
                             <p class="mb-0">Germany</p>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <h2 class="subsection-title">Default shipping address</h2>
                         <div class="info-card">
                             <p class="mb-0">Equal to billing address</p>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Profile Page -->
             <div id="profile-page" class="content-page" style="display: none;">
                 <h1 class="section-title">Your profile</h1>
                 <p class="mb-4">Check your personal data.</p>

                 <h2 class="subsection-title">Personal data</h2>
                 <div class="info-card">
                     <form>
                         <div class="mb-3">
                             <label class="form-label">Account type*</label>
                             <select class="form-select" style="max-width: 300px;">
                                 <option selected>Private</option>
                                 <option>Business</option>
                             </select>
                         </div>
                         <div class="mb-3">
                             <label class="form-label">Salutation</label>
                             <select class="form-select" style="max-width: 300px;">
                                 <option selected>Mr.</option>
                                 <option>Ms.</option>
                                 <option>Mrs.</option>
                             </select>
                         </div>
                         <div class="row">
                             <div class="col-md-6 mb-3">
                                 <label class="form-label">Name*</label>
                                 <input type="text" class="form-control" value="{{ $user->name }}">
                             </div>

                         </div>
                         <p class="text-muted small">Fields marked with asterisks (*) are required.</p>
                         <button type="submit" class="btn btn-primary" onclick="alert('Changes saved!')">Save changes</button>
                     </form>
                 </div>

                 <h2 class="subsection-title mt-4">Login data</h2>
                 <div class="info-card">
                     <div class="d-flex justify-content-between align-items-center">
                         <div>
                             <strong>Your email address</strong> {{ $user->email }}
                         </div>
                         <div>
                             <a href="#" class="text-link me-3" onclick="alert('Change email functionality'); return false;">Change email address</a>
                             <a href="#" class="text-link" onclick="alert('Change password functionality'); return false;">Change password</a>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Addresses Page -->
             <div id="addresses-page" class="content-page" style="display: none;">
                 <h1 class="section-title">Addresses</h1>
                 <p class="mb-4">View your current default addresses or add new ones.</p>

                 <button class="btn btn-primary mb-4" onclick="alert('Add new address functionality')">
                     <i class="fas fa-plus"></i> Add new address
                 </button>

                 <div class="row">
                     <div class="col-md-6">
                         <h2 class="subsection-title">Default billing address</h2>
                         <div class="info-card">
                             <p class="mb-1">Manu D</p>
                             <p class="mb-1">166, 3rd street, periyar colony</p>
                             <p class="mb-1">641 652 Tiruppur</p>
                             <p class="mb-0">Germany</p>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <h2 class="subsection-title">Default shipping address</h2>
                         <div class="info-card">
                             <p class="mb-1">Manu D</p>
                             <p class="mb-1">166, 3rd street, periyar colony</p>
                             <p class="mb-1">641 652 Tiruppur</p>
                             <p class="mb-0">Germany</p>
                         </div>
                     </div>
                 </div>

                 <h2 class="subsection-title mt-4">Available addresses</h2>
                 <div class="info-card">
                     <p class="mb-1">Manu D</p>
                     <p class="mb-1">166, 3rd street, periyar colony</p>
                     <p class="mb-1">641 652 Tiruppur</p>
                     <p class="mb-3">Germany</p>
                     <button class="btn btn-outline-secondary btn-sm" onclick="alert('Edit address functionality')">
                         <i class="fas fa-edit"></i> Edit address
                     </button>
                 </div>
             </div>

             <!-- Payment Methods Page -->
             <div id="payment-page" class="content-page" style="display: none;">
                 <h1 class="section-title">Payment methods</h1>
                 <p class="mb-4">View all available payment methods and select a default payment method.</p>

                 <h2 class="subsection-title">Default payment method</h2>
                 <div class="info-card">
                     <div class="payment-option">
                         <input type="radio" name="payment" id="paypal" checked>
                         <label for="paypal" class="mb-0 flex-grow-1">
                             <strong>PayPal</strong><br>
                             <small>Payment via PayPal - easy, fast and secure.</small>
                         </label>
                         <span class="paypal-icon">P</span>
                     </div>
                     <div class="payment-option">
                         <input type="radio" name="payment" id="klarna">
                         <label for="klarna" class="mb-0 flex-grow-1">
                             <strong>Klarna</strong>
                         </label>
                     </div>
                     <div class="payment-option">
                         <input type="radio" name="payment" id="credit">
                         <label for="credit" class="mb-0 flex-grow-1">
                             <strong>Credit Card</strong>
                         </label>
                     </div>
                     <div class="payment-option">
                         <input type="radio" name="payment" id="apple">
                         <label for="apple" class="mb-0 flex-grow-1">
                             <strong>Apple Pay / Google Pay</strong>
                         </label>
                     </div>
                     <button class="btn btn-primary mt-3" onclick="alert('Payment method changed!')">Change</button>
                 </div>
             </div>

             <!-- Orders Page -->
             <div id="orders-page" class="content-page" style="display: none;">
                 <h1 class="section-title">Orders</h1>
                 <p class="mb-4">Your recent orders:</p>

                 <div class="info-card">
                     <div class="row align-items-start">
                         <div class="col-md-3 mb-3 mb-md-0">
                             <img src="{{ asset('asset/img/product/Leak-Detection-Spray-1.jpg')}}" alt="Bluetooth Speaker" class="img-fluid rounded" style="max-width: 150px;">
                         </div>
                         <div class="col-md-5">
                             <h5 class="mb-2">Bluetooth Speaker</h5>
                             <p class="mb-1"><strong>Order ID:</strong> ORD1022</p>
                             <p class="mb-1"><strong>Date:</strong> November 21, 2025</p>
                             <p class="mb-1"><strong>Quantity:</strong> 1</p>
                         </div>
                         <div class="col-md-4 text-md-end">
                             <p class="mb-2"><strong>$1,299</strong></p>
                             <span class="badge bg-success">Delivered</span>
                         </div>
                     </div>
                     <hr class="my-3">
                     <button class="btn btn-outline-primary btn-sm">View Details</button>
                 </div>

                 <!-- <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-triangle me-3"></i>
                        <div>You have not ordered yet.</div>
                    </div> -->
             </div>
         </div>
     </div>
 </div>
 @push('scripts')

 <script>
     $('#logoutBtn').on('click', function() {

         Swal.fire({
             title: 'Are you sure?',
             text: 'You will be logged out from your account',
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#d33',
             cancelButtonColor: '#6c757d',
             confirmButtonText: 'Yes, logout'
         }).then((result) => {

             if (result.isConfirmed) {

                 $.ajax({
                     url: "{{ route('logout') }}",
                     type: "POST",
                     data: {
                         _token: "{{ csrf_token() }}"
                     },
                     success: function(response) {
                         if (response.status) {
                             Swal.fire({
                                 icon: 'success',
                                 title: 'Logged out',
                                 timer: 1200,
                                 showConfirmButton: false
                             }).then(() => {
                                 window.location.href = response.redirect;
                             });
                         }
                     },
                     error: function() {
                         Swal.fire(
                             'Error',
                             'Logout failed. Try again.',
                             'error'
                         );
                     }
                 });

             }
         });

     });
     // Page navigation
     document.querySelectorAll('.sidebar .nav-link').forEach(link => {
         link.addEventListener('click', function(e) {
             e.preventDefault();

             // Remove active class from all links
             document.querySelectorAll('.sidebar .nav-link').forEach(l => l.classList.remove('active'));

             // Add active class to clicked link
             this.classList.add('active');

             // Hide all pages
             document.querySelectorAll('.content-page').forEach(page => page.style.display = 'none');

             // Show selected page
             const pageId = this.getAttribute('data-page') + '-page';
             document.getElementById(pageId).style.display = 'block';
         });
     });
 </script>
 @endpush

 @endsection