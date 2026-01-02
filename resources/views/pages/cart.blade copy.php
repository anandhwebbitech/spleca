 @extends('layouts.app')
 @section('content')
     <div class="container py-5">
         <div class="page-title-section">
             <h1 class="page-main-title">Shopping Cart</h1>
             <p class="page-subtitle-text">Review your items and proceed to checkout</p>
         </div>

         <div class="row g-4">
             <!-- Product Items Section -->
             <div class="col-lg-8">
                 <div class="product-card-wrapper p-4">
                     <!-- Product Item 1 -->
                     <div class="product-listing-item">
                         <div class="product-img-container">
                             <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=400&q=80"
                                 alt="Pool Repair Kit" class="product-thumbnail-img">
                             <span class="discount-label-badge">-25%</span>
                         </div>
                         <div class="product-info-wrapper">
                             <div class="product-header-row">
                                 <h3 class="product-name-heading">WEICON Pool Repair Kit</h3>
                                 <button class="delete-item-btn" onclick="deleteProduct(this)">
                                     <i class="fas fa-times fa-lg"></i>
                                 </button>
                             </div>
                             <p class="product-desc-text">Cures reliably even under water | application on wet surfaces |
                                 permanent waterproof seal</p>
                             <div class="product-action-row">
                                 <div class="qty-selector-group">
                                     <button class="qty-change-btn" onclick="modifyQuantity(this, -1)">
                                         <i class="fas fa-minus"></i>
                                     </button>
                                     <span class="qty-display-number">2</span>
                                     <button class="qty-change-btn" onclick="modifyQuantity(this, 1)">
                                         <i class="fas fa-plus"></i>
                                     </button>
                                 </div>
                                 <div class="pricing-info-section">
                                     <span class="sale-price-amount">₹8,540</span>
                                     <span class="regular-price-amount">₹11,387</span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Product Item 2 -->
                     <div class="product-listing-item">
                         <div class="product-img-container">
                             <img src="https://images.unsplash.com/photo-1620626011761-996317b8d101?w=400&q=80"
                                 alt="Tile Grout Sealer" class="product-thumbnail-img">
                             <span class="discount-label-badge">-25%</span>
                         </div>
                         <div class="product-info-wrapper">
                             <div class="product-header-row">
                                 <h3 class="product-name-heading">Professional Tile Grout Sealer</h3>
                                 <button class="delete-item-btn" onclick="deleteProduct(this)">
                                     <i class="fas fa-times fa-lg"></i>
                                 </button>
                             </div>
                             <p class="product-desc-text">Premium sealer for bathroom tiles | prevents mold growth |
                                 long-lasting protection</p>
                             <div class="product-action-row">
                                 <div class="qty-selector-group">
                                     <button class="qty-change-btn" onclick="modifyQuantity(this, -1)">
                                         <i class="fas fa-minus"></i>
                                     </button>
                                     <span class="qty-display-number">1</span>
                                     <button class="qty-change-btn" onclick="modifyQuantity(this, 1)">
                                         <i class="fas fa-plus"></i>
                                     </button>
                                 </div>
                                 <div class="pricing-info-section">
                                     <span class="sale-price-amount">₹2,243</span>
                                     <span class="regular-price-amount">₹2,991</span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Product Item 3 -->
                     <div class="product-listing-item">
                         <div class="product-img-container">
                             <img src="https://images.unsplash.com/photo-1585128903994-03b9e25d8ad8?w=400&q=80"
                                 alt="Silicone Sealant" class="product-thumbnail-img">
                             <span class="discount-label-badge">-25%</span>
                         </div>
                         <div class="product-info-wrapper">
                             <div class="product-header-row">
                                 <h3 class="product-name-heading">Waterproof Silicone Sealant - White</h3>
                                 <button class="delete-item-btn" onclick="deleteProduct(this)">
                                     <i class="fas fa-times fa-lg"></i>
                                 </button>
                             </div>
                             <p class="product-desc-text">Premium quality silicone | perfect for bathrooms and kitchens |
                                 mildew resistant formula</p>
                             <div class="product-action-row">
                                 <div class="qty-selector-group">
                                     <button class="qty-change-btn" onclick="modifyQuantity(this, -1)">
                                         <i class="fas fa-minus"></i>
                                     </button>
                                     <span class="qty-display-number">3</span>
                                     <button class="qty-change-btn" onclick="modifyQuantity(this, 1)">
                                         <i class="fas fa-plus"></i>
                                     </button>
                                 </div>
                                 <div class="pricing-info-section">
                                     <span class="sale-price-amount">₹674</span>
                                     <span class="regular-price-amount">₹899</span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Product Item 4 -->
                     <div class="product-listing-item">
                         <div class="product-img-container">
                             <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba?w=400&q=80"
                                 alt="Bathroom Cleaner" class="product-thumbnail-img">
                             <span class="discount-label-badge">-25%</span>
                         </div>
                         <div class="product-info-wrapper">
                             <div class="product-header-row">
                                 <h3 class="product-name-heading">Heavy Duty Bathroom & Tile Cleaner</h3>
                                 <button class="delete-item-btn" onclick="deleteProduct(this)">
                                     <i class="fas fa-times fa-lg"></i>
                                 </button>
                             </div>
                             <p class="product-desc-text">Removes tough stains and soap scum | safe for all surfaces | fresh
                                 scent formula</p>
                             <div class="product-action-row">
                                 <div class="qty-selector-group">
                                     <button class="qty-change-btn" onclick="modifyQuantity(this, -1)">
                                         <i class="fas fa-minus"></i>
                                     </button>
                                     <span class="qty-display-number">1</span>
                                     <button class="qty-change-btn" onclick="modifyQuantity(this, 1)">
                                         <i class="fas fa-plus"></i>
                                     </button>
                                 </div>
                                 <div class="pricing-info-section">
                                     <span class="sale-price-amount">₹1,496</span>
                                     <span class="regular-price-amount">₹1,995</span>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Order Summary Section -->
             <div class="col-lg-4">
                 <div class="order-summary-card p-4">
                     <h2 class="summary-heading-text">Order Summary</h2>

                     <div class="summary-detail-row">
                         <span class="summary-field-label">Subtotal (7 items)</span>
                         <span class="summary-field-value">₹23,719</span>
                     </div>

                     <div class="summary-detail-row discount-amount-row">
                         <span class="summary-field-label">Discount (25%)</span>
                         <span class="summary-field-value">-₹5,930</span>
                     </div>

                     <div class="summary-detail-row">
                         <span class="summary-field-label">Shipping</span>
                         <span class="summary-field-value">Free</span>
                     </div>

                     <div class="summary-detail-row">
                         <span class="summary-field-label">Tax (GST 18%)</span>
                         <span class="summary-field-value">₹3,202</span>
                     </div>

                     <hr class="summary-divider-line">

                     <div class="total-amount-section">
                         <span class="total-text-label">Total</span>
                         <span class="total-price-display">₹20,991</span>
                     </div>

                     <button class="checkout-primary-btn" onclick="proceedCheckout()">
                         <i class="fas fa-lock me-2"></i>Proceed to Checkout
                     </button>

                     <button class="continue-shopping-btn" onclick="backToShop()">
                         <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                     </button>

                     <div class="promo-code-section">
                         <div class="d-flex gap-2">
                             <input type="text" class="promo-input-field" placeholder="Enter promo code">
                             <button class="promo-apply-btn" onclick="validatePromo()">Apply</button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     

     <script>
         function modifyQuantity(btn, change) {
             const qtyElement = btn.parentElement.querySelector('.qty-display-number');
             let currentQty = parseInt(qtyElement.textContent);
             currentQty += change;

             if (currentQty < 1) currentQty = 1;
             if (currentQty > 10) currentQty = 10;

             qtyElement.textContent = currentQty;
             recalculateTotals();
         }

         function deleteProduct(btn) {
             const productItem = btn.closest('.product-listing-item');
             const productName = productItem.querySelector('.product-name-heading').textContent;

             if (confirm(`Remove ${productName} from cart?`)) {
                 productItem.style.opacity = '0';
                 productItem.style.transform = 'translateX(-20px)';
                 productItem.style.transition = 'all 0.3s ease';

                 setTimeout(() => {
                     productItem.remove();
                     recalculateTotals();
                     checkIfEmpty();
                 }, 300);
             }
         }

         function recalculateTotals() {
             const allProducts = document.querySelectorAll('.product-listing-item');
             let subtotal = 0;
             let totalItems = 0;

             allProducts.forEach(product => {
                 const priceText = product.querySelector('.sale-price-amount').textContent.replace(/[₹,]/g, '');
                 const quantity = parseInt(product.querySelector('.qty-display-number').textContent);
                 subtotal += parseFloat(priceText) * quantity;
                 totalItems += quantity;
             });

             const discount = subtotal * 0.25;
             const afterDiscount = subtotal - discount;
             const tax = afterDiscount * 0.18;
             const total = afterDiscount + tax;

             document.querySelector('.summary-detail-row:nth-child(1) .summary-field-value').textContent =
                 `₹${Math.round(subtotal).toLocaleString('en-IN')}`;
             document.querySelector('.discount-amount-row .summary-field-value').textContent =
                 `-₹${Math.round(discount).toLocaleString('en-IN')}`;
             document.querySelector('.summary-detail-row:nth-child(4) .summary-field-value').textContent =
                 `₹${Math.round(tax).toLocaleString('en-IN')}`;
             document.querySelector('.total-price-display').textContent =
                 `₹${Math.round(total).toLocaleString('en-IN')}`;
             document.querySelector('.summary-detail-row:nth-child(1) .summary-field-label').textContent =
                 `Subtotal (${totalItems} item${totalItems > 1 ? 's' : ''})`;
         }

         function checkIfEmpty() {
             const allProducts = document.querySelectorAll('.product-listing-item');
             if (allProducts.length === 0) {
                 const cartSection = document.querySelector('.product-card-wrapper');
                 cartSection.innerHTML = `
                    <div class="empty-basket-state">
                        <i class="fas fa-shopping-cart"></i>
                        <h3>Your cart is empty</h3>
                        <p>Add some amazing products to your cart and they will show up here</p>
                        <button class="checkout-primary-btn" onclick="backToShop()">
                            Start Shopping
                        </button>
                    </div>
                `;
             }
         }

         function proceedCheckout() {
             alert('Proceeding to secure checkout...');
         }

         function backToShop() {
             alert('Redirecting to shop page...');
         }

         function validatePromo() {
             const promoField = document.querySelector('.promo-input-field');
             const code = promoField.value.trim().toUpperCase();

             if (code === 'SAVE10') {
                 alert('Promo code applied! Additional 10% discount added.');
                 promoField.value = '';
             } else if (code === '') {
                 alert('Please enter a promo code');
             } else {
                 alert('Invalid promo code');
             }
         }
     </script>
 @endsection
