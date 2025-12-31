 @extends('layouts.app')
 @section('content')
 <style>
.product-image-swiper {
    height: 260px;
}

.product-image-swiper img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

/* Disable swipe but allow clicks */
.no-swipe {
    pointer-events: auto;
}

.no-swipe .swiper-wrapper {
    transform: translate3d(0,0,0) !important;
}

.no-swipe .swiper-slide {
    pointer-events: auto;
}
</style>
 <div id="wb-home-banner" class="swiper wb-home-banner-swiper">
     <div class="swiper-wrapper">
         <div class="swiper-slide">
             <img src="{{ asset('asset/img/banner/b1.jpg') }}" alt="Banner 1">
         </div>
         <div class="swiper-slide">
             <img src="{{ asset('asset/img/banner/b2.jpg') }}" alt="Banner 2">
         </div>
         <div class="swiper-slide">
             <img src="{{ asset('asset/img/banner/b3.jpg') }}" alt="Banner 3">
         </div>
         <div class="swiper-slide">
             <img src="{{ asset('asset/img/banner/b4.jpg') }}" alt="Banner 4">
         </div>
         <!-- <div class="swiper-slide">
                <img src="asset/img/banner/b5.jpg" alt="Banner 5">
            </div> -->
     </div>

     <div class="swiper-button-next wb-home-next"></div>
     <div class="swiper-button-prev wb-home-prev"></div>
     <div class="swiper-pagination wb-home-pagination"></div>
 </div>

 <section class="welcome-section">
     <div class="bg-decoration bg-decoration-1"></div>
     <div class="bg-decoration bg-decoration-2"></div>

     <div class="welcome-container">
         <!-- Left Content -->
         <div class="welcome-content">
             <div class="welcome-tag">ABOUT SPLECA</div>
             <h1 class="welcome-title">Trusted supplier of WEICON Chemical Products</h1>
             <div class="welcome-divider"></div>

             <p class="welcome-description">At SPLECA, we take pride in being a family-run business rooted in precision, care, and a relentless commitment to meeting our customers’ needs. Based in Perth, Western Australia, we are proud to be the first and only branch of its kind in the region, delivering innovative solutions tailored to the diverse needs of industries across Western Australia.</p>

             <!-- <p class="welcome-description">
                    With respect to the Process Control Automation, we supply accessories to CNC Machines, which includes AC variable speed drives, DC variable speed drives, Encoders, Axor Industries Italy ( AC servo Motors / Drives ) , Tools Wizard GmbH ( 5 Axes Tool Grinding Software ) and different categories of related automations. We also take up Annual Maintenance Contracts for any make and type of Drives and CNC machines.
                </p> -->

             <a href="#about" class="read-more-btn">Read More</a>
         </div>

         <!-- Right Visual with Video -->
         <div class="welcome-visual">
             <div class="video-container" onclick="playVideo()">
                 <img src="{{ asset('asset/img/product/weicon-bio-cut-schneidoel.jpg') }}   " alt="Industrial Automation" class="video-thumbnail">

                 <div class="video-overlay">
                     <div class="play-button">
                         <div class="play-icon"></div>
                     </div>
                 </div>

                 <div class="youtube-badge">
                     <span class="youtube-icon">▶</span>
                     <span>Watch on YouTube</span>
                 </div>
             </div>

             <!-- Floating Cards -->
             <div class="floating-card card-1">
                 <div class="card-icon">⚙️</div>
                 <div class="card-text">CNC Systems</div>
                 <div class="card-subtext">Advanced Control</div>
             </div>

             <div class="floating-card card-2">
                 <div class="card-icon">🔧</div>
                 <div class="card-text">24/7 Support</div>
                 <div class="card-subtext">Expert Service</div>
             </div>
         </div>
     </div>
 </section>

 <!-- PRO CAR -->
 <div class="container py-5 first-swip" id="featured-products-slider">
     <h2 class="text-center mb-5">Featured Products</h2>

     <div class="swiper main-swiper second-swip" id="main-swiper-1">
         <div class="swiper-wrapper">
             <!-- Product 1 -->
             @foreach($featuredProducts as $product)
             <div class="swiper-slide">
                 <div class="product-card">
                     <div class="product-image-container">
                         @if($product->discount_percent)
                         <span class="discount-badge">-{{ $product->discount_percent }}%</span>
                         @endif
                         <div class="swiper product-image-swiper product-image-swiper-{{ $product->id }}" data-slide-count="{{ $product->images->count() }}">
                             <div class="swiper-wrapper">
                                 @if($product->images->count())
                                 @foreach($product->images as $img)
                                 <div class="swiper-slide">
                                     <img src="{{ asset('public/uploads/products/'.$img->image) }}"
                                         alt="{{ $product->name }}"
                                         class="product-img">
                                 </div>
                                 @endforeach
                                 @else
                                 <div class="swiper-slide">
                                     <img src="{{ asset('assets/images/no-image.png') }}"
                                         alt="No Image"
                                         class="product-img">
                                 </div>
                                 @endif
                             </div>
                         </div>
                     </div>
                     <div class="product-details">
                         <h3 class="product-title">{{ $product->name }}</h3>
                         <p class="product-description">{{ Str::limit($product->short_description, 90) }}</p>
                         <div class="price-section">
                             <span class="current-price">₹{{ number_format($product->original_price, 2) }}</span>
                             <span class="original-price">₹{{ number_format($product->price, 2) }}</span>
                         </div>
                         <button class="btn-cart" data-id="{{ $product->id }}">Add to Cart</button>
                         <button class="btn-view">View Details</button>
                     </div>
                 </div>
             </div>
             @endforeach
         </div>
         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>
         <!-- <div class="swiper-pagination"></div> -->
     </div>
 </div>
 <!-- PRO CAR -->

 <div class="container py-5">
     <!-- feature -->
     <div class="section-header">
         <div class="section-subtitle">Why Choose Us</div>
         <h2 class="section-title">Our Core Strengths</h2>
     </div>

     <div class="row g-4 justify-content-center">
         <!-- Feature 1 -->
         <div class="col-lg-4 col-md-12 col-12">
             <div class="feature-card">
                 <div class="icon-wrapper">
                     <i class="fas fa-shield-alt"></i>
                 </div>
                 <h3 class="feature-title">Premium Quality<br>Assurance</h3>
                 <p class="feature-description">Each product is rigorously tested to ensure consistency and reliability.</p>
             </div>
         </div>

         <!-- Feature 2 -->
         <div class="col-lg-4 col-md-12 col-12">
             <div class="feature-card">
                 <div class="icon-wrapper">
                     <i class="fas fa-shopping-cart"></i>
                 </div>
                 <h3 class="feature-title">Wide Range of<br>Products</h3>
                 <p class="feature-description">We supply chemicals across a variety of industries</p>
             </div>
         </div>

         <!-- Feature 3 -->
         <div class="col-lg-4 col-md-12 col-12">
             <div class="feature-card">
                 <div class="icon-wrapper">
                     <i class="fas fa-shipping-fast"></i>
                 </div>
                 <h3 class="feature-title">Fast & Reliable<br>Delivery</h3>
                 <p class="feature-description">With our global network of suppliers and efficient logistics, we ensure timely deliveries to keep your operations running smoothly.</p>
             </div>
         </div>

         <!-- Feature 4 -->
         <div class="col-lg-4 col-md-12 col-12">
             <div class="feature-card">
                 <div class="icon-wrapper">
                     <i class="fas fa-tools"></i>
                 </div>
                 <h3 class="feature-title">Safety &<br>Compliance</h3>
                 <p class="feature-description">All our products comply with industry regulations and safety standards, ensuring that they are safe and effective for your use.</p>
             </div>
         </div>

         <!-- Feature 5 -->
         <div class="col-lg-4 col-md-12 col-12">
             <div class="feature-card">
                 <div class="icon-wrapper">
                     <i class="fas fa-sync-alt"></i>
                 </div>
                 <h3 class="feature-title">Custom<br>Solutions</h3>
                 <p class="feature-description">Our team is ready to meet your exact requirements with tailor-made solutions.</p>
             </div>
         </div>
     </div>
 </div>

 <section class="chem-hero-section">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-md-6">
                 <div class="chem-visual-wrapper">
                     <img src="{{ asset('asset/img/product/home-image.jpg') }}" alt="Industrial Chemical Supplier" class="img-fluid">
                 </div>
             </div>
             <div class="col-md-6 ps-3 chem-info-container">
                 <div class="chem-grid-wrapper">
                     <div class="row justify-content-between">
                         <div class="col-5 chem-feature-card mb-4">
                             <div class="chem-card-title">Chemical products</div>
                             <a href="#" class="chem-detail-link">More Details</a>
                         </div>
                         <div class="col-5 chem-feature-card mb-4">
                             <div class="chem-card-title">Application Areas</div>
                             <a href="#" class="chem-detail-link">More Details</a>
                         </div>
                         <div class="col-5 chem-feature-card">
                             <div class="chem-card-title">WEICON Tools</div>
                             <a href="#" class="chem-detail-link">More Details</a>
                         </div>
                         <div class="col-5 chem-feature-card">
                             <div class="chem-card-title">Technical Sprays</div>
                             <a href="#" class="chem-detail-link">More Details</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>


 <!-- slider 2 -->
<div class="container py-5 first-swip" id="featured-products-slider-2">
    <h2 class="text-center mb-5">Best Seller</h2>

    <div class="swiper main-swiper second-swip" id="main-swiper-2">
        <div class="swiper-wrapper">

            @foreach($bestSellers as $product)
            <div class="swiper-slide">
                <div class="product-card">

                    <div class="product-image-container">
                        @if($product->discount_percent)
                            <span class="discount-badge">-{{ $product->discount_percent }}%</span>
                        @endif

                        <div class="swiper product-image-swiper product-image-swiper-{{ $product->id }}"
                             data-count="{{ $product->images->count() }}">

                            <div class="swiper-wrapper">
                                @if($product->images->count())
                                    @foreach($product->images as $img)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('public/uploads/products/'.$img->image) }}"
                                                 alt="{{ $product->name }}">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/images/no-image.png') }}"
                                             alt="No Image">
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>

                    <div class="product-details">
                        <h3 class="product-title">{{ $product->name }}</h3>

                        <p class="product-description">
                            {{ Str::limit($product->short_description, 90) }}
                        </p>

                        <div class="price-section">
                            <span class="current-price">
                                ₹{{ number_format($product->original_price, 2) }}
                            </span>
                            <span class="original-price">
                                ₹{{ number_format($product->price, 2) }}
                            </span>
                        </div>

                        <button class="btn-cart" data-id="{{ $product->id }}">
                            Add to Cart
                        </button>
                       <button class="btn-view"
                                onclick="window.location='{{ route('product.show', $product->id) }}'">
                            View Details
                        </button>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
@push('scripts')
<script src="{{ asset('asset/js/swiper.js') }}"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    /* INNER IMAGE SWIPERS */
    document.querySelectorAll('.product-image-swiper').forEach(el => {

        const count = parseInt(el.dataset.count || 0);

        if (count > 1) {
            new Swiper(el, {
                slidesPerView: 1,
                loop: false,              // ❌ NEVER true
                nested: true,
                allowTouchMove: true,
                watchOverflow: true,
            });
        } else {
            el.classList.add('no-swipe');
        }
    });

    /* FEATURED PRODUCTS SLIDER */
    new Swiper('#main-swiper-1', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: false,
        navigation: {
            nextEl: '#featured-products-slider .swiper-button-next',
            prevEl: '#featured-products-slider .swiper-button-prev',
        },
        breakpoints: {
            320: { slidesPerView: 1 },
            576: { slidesPerView: 2 },
            992: { slidesPerView: 3 }
        }
    });

    /* BEST SELLER SLIDER (MISSING BEFORE ❌) */
    new Swiper('#main-swiper-2', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: false,
        navigation: {
            nextEl: '#featured-products-slider-2 .swiper-button-next',
            prevEl: '#featured-products-slider-2 .swiper-button-prev',
        },
        breakpoints: {
            320: { slidesPerView: 1 },
            576: { slidesPerView: 2 },
            992: { slidesPerView: 3 }
        }
    });

});
</script>
@endpush

 @endsection