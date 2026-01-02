 @extends('layouts.app')
 @section('content')
     <div class="container py-5">
         <div class="checkout-header-section">
             <h1 class="checkout-main-heading">Checkout</h1>
             <p class="checkout-sub-heading">Complete your order by selecting delivery address</p>
         </div>

         <div class="row g-4">
             <!-- Left Column - Checkout Details -->
             <div class="col-lg-8">
                 <!-- Delivery Address Section -->
                 <div class="section-card-wrapper">
                     <h2 class="section-title-text">
                         <span class="section-title-icon">
                             <i class="fas fa-map-marker-alt"></i>
                         </span>
                         Delivery Address
                     </h2>

                     <!-- Address Option 1 -->
                     <div class="address-selector-card selected-address" onclick="selectAddress(this)">
                         <div class="d-flex gap-3">
                             <input type="radio" name="address" class="address-radio-input" checked>
                             <div class="flex-grow-1">
                                 <span class="address-type-badge">Home</span>
                                 <div class="address-name-text">Rajesh Kumar</div>
                                 <div class="address-detail-text">123, MG Road, Koramangala</div>
                                 <div class="address-detail-text">Bangalore, Karnataka - 560034</div>
                                 <div class="address-detail-text">Phone: +91 98765 43210</div>
                                 <div class="address-actions-row">
                                     <a href="#" class="address-edit-link">
                                         <i class="fas fa-edit"></i> Edit
                                     </a>
                                     <a href="#" class="address-edit-link">
                                         <i class="fas fa-trash-alt"></i> Delete
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Address Option 2 -->
                     <div class="address-selector-card" onclick="selectAddress(this)">
                         <div class="d-flex gap-3">
                             <input type="radio" name="address" class="address-radio-input">
                             <div class="flex-grow-1">
                                 <span class="address-type-badge" style="background: #F59E0B;">Office</span>
                                 <div class="address-name-text">Rajesh Kumar</div>
                                 <div class="address-detail-text">456, Indiranagar, 100 Feet Road</div>
                                 <div class="address-detail-text">Bangalore, Karnataka - 560038</div>
                                 <div class="address-detail-text">Phone: +91 98765 43210</div>
                                 <div class="address-actions-row">
                                     <a href="#" class="address-edit-link">
                                         <i class="fas fa-edit"></i> Edit
                                     </a>
                                     <a href="#" class="address-edit-link">
                                         <i class="fas fa-trash-alt"></i> Delete
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Address Option 3 -->
                     <div class="address-selector-card" onclick="selectAddress(this)">
                         <div class="d-flex gap-3">
                             <input type="radio" name="address" class="address-radio-input">
                             <div class="flex-grow-1">
                                 <span class="address-type-badge" style="background: #8B5CF6;">Other</span>
                                 <div class="address-name-text">Priya Kumar</div>
                                 <div class="address-detail-text">789, Whitefield Main Road</div>
                                 <div class="address-detail-text">Bangalore, Karnataka - 560066</div>
                                 <div class="address-detail-text">Phone: +91 87654 32109</div>
                                 <div class="address-actions-row">
                                     <a href="#" class="address-edit-link">
                                         <i class="fas fa-edit"></i> Edit
                                     </a>
                                     <a href="#" class="address-edit-link">
                                         <i class="fas fa-trash-alt"></i> Delete
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Add New Address Button -->
                     <button class="add-new-address-btn" onclick="addNewAddress()">
                         <i class="fas fa-plus-circle fa-lg"></i>
                         Add New Address
                     </button>
                 </div>

                 <!-- Order Items Section -->
                 <div class="section-card-wrapper">
                     <h2 class="section-title-text">
                         <span class="section-title-icon">
                             <i class="fas fa-shopping-bag"></i>
                         </span>
                         Order Items
                         <span class="discount-badge-mini">-25% OFF</span>
                     </h2>

                     <!-- Order Item 1 -->
                     <div class="order-item-row">
                         <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=200&q=80"
                             alt="Pool Repair Kit" class="order-item-thumbnail">
                         <div class="order-item-details">
                             <div class="order-item-name">WEICON Pool Repair Kit</div>
                             <div class="order-item-quantity">Quantity: 2</div>
                         </div>
                         <div class="order-item-actions">
                             <div class="order-item-price">₹17,080</div>
                             <button class="order-item-edit-btn" onclick="editOrderItem(this)" title="Edit">
                                 <i class="fas fa-edit"></i>
                             </button>
                             <button class="order-item-remove-btn" onclick="removeOrderItem(this)" title="Remove">
                                 <i class="fas fa-trash-alt"></i>
                             </button>
                         </div>
                     </div>

                     <!-- Order Item 2 -->
                     <div class="order-item-row">
                         <img src="https://images.unsplash.com/photo-1620626011761-996317b8d101?w=200&q=80"
                             alt="Tile Grout Sealer" class="order-item-thumbnail">
                         <div class="order-item-details">
                             <div class="order-item-name">Professional Tile Grout Sealer</div>
                             <div class="order-item-quantity">Quantity: 1</div>
                         </div>
                         <div class="order-item-actions">
                             <div class="order-item-price">₹2,243</div>
                             <button class="order-item-edit-btn" onclick="editOrderItem(this)" title="Edit">
                                 <i class="fas fa-edit"></i>
                             </button>
                             <button class="order-item-remove-btn" onclick="removeOrderItem(this)" title="Remove">
                                 <i class="fas fa-trash-alt"></i>
                             </button>
                         </div>
                     </div>

                     <!-- Order Item 3 -->
                     <div class="order-item-row">
                         <img src="https://images.unsplash.com/photo-1585128903994-03b9e25d8ad8?w=200&q=80"
                             alt="Silicone Sealant" class="order-item-thumbnail">
                         <div class="order-item-details">
                             <div class="order-item-name">Waterproof Silicone Sealant</div>
                             <div class="order-item-quantity">Quantity: 3</div>
                         </div>
                         <div class="order-item-actions">
                             <div class="order-item-price">₹2,022</div>
                             <button class="order-item-edit-btn" onclick="editOrderItem(this)" title="Edit">
                                 <i class="fas fa-edit"></i>
                             </button>
                             <button class="order-item-remove-btn" onclick="removeOrderItem(this)" title="Remove">
                                 <i class="fas fa-trash-alt"></i>
                             </button>
                         </div>
                     </div>

                     <!-- Order Item 4 -->
                     <div class="order-item-row">
                         <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba?w=200&q=80"
                             alt="Bathroom Cleaner" class="order-item-thumbnail">
                         <div class="order-item-details">
                             <div class="order-item-name">Heavy Duty Bathroom Cleaner</div>
                             <div class="order-item-quantity">Quantity: 1</div>
                         </div>
                         <div class="order-item-actions">
                             <div class="order-item-price">₹1,496</div>
                             <button class="order-item-edit-btn" onclick="editOrderItem(this)" title="Edit">
                                 <i class="fas fa-edit"></i>
                             </button>
                             <button class="order-item-remove-btn" onclick="removeOrderItem(this)" title="Remove">
                                 <i class="fas fa-trash-alt"></i>
                             </button>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Right Column - Order Summary -->
             <div class="col-lg-4">
                 <div class="summary-sticky-card">
                     <h2 class="summary-title-heading">Order Summary</h2>

                     <div class="summary-line-item">
                         <span class="summary-line-label">Subtotal (7 items)</span>
                         <span class="summary-line-value">₹23,719</span>
                     </div>

                     <div class="summary-line-item discount-line-item">
                         <span class="summary-line-label">Discount (25%)</span>
                         <span class="summary-line-value">-₹5,930</span>
                     </div>

                     <div class="summary-line-item">
                         <span class="summary-line-label">Shipping</span>
                         <span class="summary-line-value">Free</span>
                     </div>

                     <div class="summary-line-item">
                         <span class="summary-line-label">Tax (GST 18%)</span>
                         <span class="summary-line-value">₹3,202</span>
                     </div>

                     <hr class="summary-separator-line">

                     <div class="total-summary-row">
                         <span class="total-summary-label">Total Amount</span>
                         <span class="total-summary-amount">₹20,991</span>
                     </div>

                     <button class="proceed-payment-btn" onclick="proceedToPayment()">
                         <i class="fas fa-credit-card me-2"></i>Continue to Payment
                     </button>

                     <button class="back-to-cart-btn" onclick="returnToCart()">
                         <i class="fas fa-arrow-left me-2"></i>Back to Cart
                     </button>

                     <div class="secure-checkout-notice">
                         <i class="fas fa-shield-alt"></i>
                         <span>Your payment information is secure and encrypted</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Edit Address Modal -->
     <div class="modal-overlay" id="addressModal">
         <div class="modal-container">
             <div class="modal-header">
                 <h3 class="modal-title" id="modalTitle">Edit Address</h3>
                 <button class="modal-close-btn" onclick="closeAddressModal()">
                     <i class="fas fa-times"></i>
                 </button>
             </div>
             <div class="modal-body">
                 <form id="addressForm">
                     <div class="form-group">
                         <label class="form-label">Address Type</label>
                         <select class="form-select" id="addressType">
                             <option value="home">Home</option>
                             <option value="office">Office</option>
                             <option value="other">Other</option>
                         </select>
                     </div>

                     <div class="form-group">
                         <label class="form-label">Full Name *</label>
                         <input type="text" class="form-input" id="fullName" placeholder="Enter full name" required>
                     </div>

                     <div class="form-group">
                         <label class="form-label">Phone Number *</label>
                         <input type="tel" class="form-input" id="phoneNumber" placeholder="+91 98765 43210"
                             required>
                     </div>

                     <div class="form-group">
                         <label class="form-label">Address Line 1 *</label>
                         <input type="text" class="form-input" id="addressLine1"
                             placeholder="House/Flat No., Building Name" required>
                     </div>

                     <div class="form-group">
                         <label class="form-label">Address Line 2</label>
                         <input type="text" class="form-input" id="addressLine2"
                             placeholder="Area, Street, Landmark">
                     </div>

                     <div class="form-row">
                         <div class="form-group">
                             <label class="form-label">City *</label>
                             <input type="text" class="form-input" id="city" placeholder="Bangalore" required>
                         </div>
                         <div class="form-group">
                             <label class="form-label">State *</label>
                             <input type="text" class="form-input" id="state" placeholder="Karnataka" required>
                         </div>
                     </div>

                     <div class="form-row">
                         <div class="form-group">
                             <label class="form-label">Pincode *</label>
                             <input type="text" class="form-input" id="pincode" placeholder="560034" required>
                         </div>
                         <div class="form-group">
                             <label class="form-label">Country *</label>
                             <input type="text" class="form-input" id="country" value="India" required>
                         </div>
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button class="modal-cancel-btn" onclick="closeAddressModal()">Cancel</button>
                 <button class="modal-save-btn" onclick="saveAddress()">
                     <i class="fas fa-check me-2"></i>Save Address
                 </button>
             </div>
         </div>
     </div>

     <script>
         function selectAddress(card) {
             // Remove selected class from all cards
             document.querySelectorAll('.address-selector-card').forEach(c => {
                 c.classList.remove('selected-address');
             });

             // Add selected class to clicked card
             card.classList.add('selected-address');

             // Check the radio button
             const radio = card.querySelector('.address-radio-input');
             radio.checked = true;
         }

         function addNewAddress() {
             document.getElementById('modalTitle').textContent = 'Add New Address';
             document.getElementById('addressForm').reset();
             openAddressModal();
         }

         function openAddressModal(addressData = null) {
             const modal = document.getElementById('addressModal');
             modal.classList.add('active');
             document.body.style.overflow = 'hidden';

             if (addressData) {
                 // Populate form with existing data for editing
                 document.getElementById('modalTitle').textContent = 'Edit Address';
                 document.getElementById('fullName').value = addressData.name || '';
                 document.getElementById('phoneNumber').value = addressData.phone || '';
                 document.getElementById('addressLine1').value = addressData.line1 || '';
                 document.getElementById('addressLine2').value = addressData.line2 || '';
                 document.getElementById('city').value = addressData.city || '';
                 document.getElementById('state').value = addressData.state || '';
                 document.getElementById('pincode').value = addressData.pincode || '';
                 document.getElementById('addressType').value = addressData.type || 'home';
             }
         }

         function closeAddressModal() {
             const modal = document.getElementById('addressModal');
             modal.classList.remove('active');
             document.body.style.overflow = 'auto';
         }

         function saveAddress() {
             const form = document.getElementById('addressForm');

             if (!form.checkValidity()) {
                 form.reportValidity();
                 return;
             }

             const formData = {
                 type: document.getElementById('addressType').value,
                 name: document.getElementById('fullName').value,
                 phone: document.getElementById('phoneNumber').value,
                 line1: document.getElementById('addressLine1').value,
                 line2: document.getElementById('addressLine2').value,
                 city: document.getElementById('city').value,
                 state: document.getElementById('state').value,
                 pincode: document.getElementById('pincode').value,
                 country: document.getElementById('country').value
             };

             console.log('Saving address:', formData);
             alert('Address saved successfully!');
             closeAddressModal();
             // Here you would send the data to your backend
         }

         // Close modal when clicking outside
         document.getElementById('addressModal').addEventListener('click', (e) => {
             if (e.target.id === 'addressModal') {
                 closeAddressModal();
             }
         });

         function proceedToPayment() {
             const selectedAddress = document.querySelector('.address-selector-card.selected-address');
             if (!selectedAddress) {
                 alert('Please select a delivery address');
                 return;
             }
             alert('Proceeding to payment options...');
             // Here you would navigate to payment page
         }

         function returnToCart() {
             alert('Returning to shopping cart...');
             // Here you would navigate back to cart page
         }

         // Prevent form submission on address action links
         document.querySelectorAll('.address-edit-link').forEach(link => {
             link.addEventListener('click', (e) => {
                 e.preventDefault();
                 e.stopPropagation();
                 const action = link.textContent.trim().toLowerCase();

                 if (action.includes('edit')) {
                     const addressCard = link.closest('.address-selector-card');
                     const addressData = {
                         name: addressCard.querySelector('.address-name-text').textContent,
                         line1: addressCard.querySelectorAll('.address-detail-text')[0].textContent,
                         line2: addressCard.querySelectorAll('.address-detail-text')[1].textContent
                             .split(',')[0],
                         city: addressCard.querySelectorAll('.address-detail-text')[1].textContent.split(
                             ',')[0],
                         state: addressCard.querySelectorAll('.address-detail-text')[1].textContent
                             .split(',')[1]?.trim().split('-')[0]?.trim(),
                         pincode: addressCard.querySelectorAll('.address-detail-text')[1].textContent
                             .split('-')[1]?.trim(),
                         phone: addressCard.querySelectorAll('.address-detail-text')[2].textContent
                             .replace('Phone: ', ''),
                         type: addressCard.querySelector('.address-type-badge').textContent.toLowerCase()
                     };
                     openAddressModal(addressData);
                 } else if (action.includes('delete')) {
                     if (confirm('Are you sure you want to delete this address?')) {
                         const addressCard = link.closest('.address-selector-card');
                         addressCard.style.opacity = '0';
                         addressCard.style.transform = 'translateX(-20px)';
                         addressCard.style.transition = 'all 0.3s ease';

                         setTimeout(() => {
                             addressCard.remove();
                             alert('Address deleted successfully');
                         }, 300);
                     }
                 }
             });
         });

         function editOrderItem(btn) {
             const orderRow = btn.closest('.order-item-row');
             const itemName = orderRow.querySelector('.order-item-name').textContent;
             const quantityText = orderRow.querySelector('.order-item-quantity').textContent;
             const currentQty = parseInt(quantityText.match(/\d+/)[0]);

             const newQty = prompt(`Edit quantity for ${itemName}:`, currentQty);

             if (newQty !== null && newQty > 0) {
                 orderRow.querySelector('.order-item-quantity').textContent = `Quantity: ${newQty}`;
                 alert('Quantity updated! Please recalculate totals.');
                 // Here you would recalculate the price and update the summary
             }
         }

         function removeOrderItem(btn) {
             const orderRow = btn.closest('.order-item-row');
             const itemName = orderRow.querySelector('.order-item-name').textContent;

             if (confirm(`Remove ${itemName} from order?`)) {
                 orderRow.style.opacity = '0';
                 orderRow.style.transform = 'translateX(-20px)';
                 orderRow.style.transition = 'all 0.3s ease';

                 setTimeout(() => {
                     orderRow.remove();
                     alert('Item removed. Please recalculate totals.');
                     // Here you would recalculate the summary
                 }, 300);
             }
         }
     </script>
 @endsection
