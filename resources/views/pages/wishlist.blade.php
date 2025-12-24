 @extends('layouts.app')
 @section('content')
    <div class="container py-5">
        <div class="wl-section-header">
            <div class="wl-results-count">Showing 1–32 of 151 results</div>
            <select class="wl-sort-dropdown">
                <option>Sort by latest</option>
                <option>Sort by price: low to high</option>
                <option>Sort by price: high to low</option>
                <option>Sort by popularity</option>
            </select>
        </div>

        <div class="row">
            <!-- Product Card 1 -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="wl-item-card">
                    <div class="wl-heart-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <span class="wl-discount-tag">-25%</span>
                    <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=400&h=300&fit=crop" alt="Pool Repair Kit" class="wl-item-image">
                    <h3 class="wl-item-name">WEICON Pool Repair Kit</h3>
                    <p class="wl-item-desc">cures reliably even under water | application on wet surfaces |...</p>
                    <div class="wl-pricing-wrapper">
                        <span class="wl-price-sale">$102.91</span>
                        <span class="wl-price-regular">$199</span>
                    </div>
                    <div class="wl-action-buttons">
                        <button class="wl-btn-cart">Add to Cart</button>
                        <button class="wl-btn-details">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="wl-item-card">
                    <div class="wl-heart-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <span class="wl-discount-tag">-25%</span>
                    <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=400&h=300&fit=crop" alt="Pool Repair Kit" class="wl-item-image">
                    <h3 class="wl-item-name">WEICON Pool Repair Kit</h3>
                    <p class="wl-item-desc">cures reliably even under water | application on wet surfaces |...</p>
                    <div class="wl-pricing-wrapper">
                        <span class="wl-price-sale">$102.91</span>
                        <span class="wl-price-regular">$199</span>
                    </div>
                    <div class="wl-action-buttons">
                        <button class="wl-btn-cart">Add to Cart</button>
                        <button class="wl-btn-details">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="wl-item-card">
                    <div class="wl-heart-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <span class="wl-discount-tag">-25%</span>
                    <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=400&h=300&fit=crop" alt="Pool Repair Kit" class="wl-item-image">
                    <h3 class="wl-item-name">WEICON Pool Repair Kit</h3>
                    <p class="wl-item-desc">cures reliably even under water | application on wet surfaces |...</p>
                    <div class="wl-pricing-wrapper">
                        <span class="wl-price-sale">$102.91</span>
                        <span class="wl-price-regular">$199</span>
                    </div>
                    <div class="wl-action-buttons">
                        <button class="wl-btn-cart">Add to Cart</button>
                        <button class="wl-btn-details">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="wl-item-card">
                    <div class="wl-heart-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <span class="wl-discount-tag">-25%</span>
                    <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=400&h=300&fit=crop" alt="Pool Repair Kit" class="wl-item-image">
                    <h3 class="wl-item-name">WEICON Pool Repair Kit</h3>
                    <p class="wl-item-desc">cures reliably even under water | application on wet surfaces |...</p>
                    <div class="wl-pricing-wrapper">
                        <span class="wl-price-sale">$102.91</span>
                        <span class="wl-price-regular">$199</span>
                    </div>
                    <div class="wl-action-buttons">
                        <button class="wl-btn-cart">Add to Cart</button>
                        <button class="wl-btn-details">View Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('scripts')

    <script>
        // Add to cart functionality
        document.querySelectorAll('.wl-btn-cart').forEach(button => {
            button.addEventListener('click', function() {
                alert('Product added to cart!');
            });
        });

        // Wishlist toggle functionality
        document.querySelectorAll('.wl-heart-icon').forEach(icon => {
            icon.addEventListener('click', function() {
                const heart = this.querySelector('i');
                heart.classList.toggle('fas');
                heart.classList.toggle('far');
            });
        });

        // View details functionality
        document.querySelectorAll('.wl-btn-details').forEach(button => {
            button.addEventListener('click', function() {
                alert('View product details');
            });
        });
    </script>
    <script src="{{ asset('asset/js/swiper.js') }}"></script>
@endpush

@endsection
