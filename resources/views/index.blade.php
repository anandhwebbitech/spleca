 @extends('layouts.app')
 @section('content')
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
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-container">
                            <span class="discount-badge">-25%</span>
                            <div class="swiper product-image-swiper product-image-swiper-1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/WEICON-Pool-Repair-Kit-1.jpg') }}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/WEICON-Pool-Repair-Kit-2.jpg') }}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/WEICON-Pool-Repair-Kit-1.jpg') }}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">WEICON Pool Repair Kit</h3>
                            <p class="product-description">cures reliably even under water | application on wet surfaces | excellent adhesion</p>
                            <div class="price-section">
                                <span class="current-price">$102.91</span>
                                <span class="original-price">$199</span>
                            </div>
                            <button class="btn-cart">Add to Cart</button>
                            <button class="btn-view">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-container">
                            <span class="discount-badge">-30%</span>
                            <div class="swiper product-image-swiper product-image-swiper-1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Repair-Tape-1.jpg') }}" alt="Product">
                                         <!-- <img src="{{ asset('/asset/img/product/repair-tape-1.jpg') }}"> -->

                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Repair-Tape-2.jpg') }}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Repair-Tape-3.jpg') }}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">Repair-Tape</h3>
                            <p class="product-description">Flexible, durable and self-fusing repair tape for applications in indoor or outdoor areas.</p>
                            <div class="price-section">
                                <span class="current-price">$39.63</span>
                                <span class="original-price">$59</span>
                            </div>
                            <button class="btn-cart">Add to Cart</button>
                            <button class="btn-view">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-container">
                            <span class="discount-badge">-20%</span>
                            <div class="swiper product-image-swiper product-image-swiper-1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Flat-and-Round-Cable-Stripper-1.jpg') }}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Flat-and-Round-Cable-Stripper-2.jpg') }}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Flat-and-Round-Cable-Stripper-3.jpg') }}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">Flat and Round Cable Stripper</h3>
                            <p class="product-description">for all common flat cables up to a width of 18 mm and all common round cables with a diameter of 6-13 mm</p>
                            <div class="price-section">
                                <span class="current-price">$59.72</span>
                                <span class="original-price">$99</span>
                            </div>
                            <button class="btn-cart">Add to Cart</button>
                            <button class="btn-view">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-container">
                            <span class="discount-badge">-15%</span>
                            <div class="swiper product-image-swiper product-image-swiper-1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Wire-Stripper-No-5-Pro-1.jpg') }}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Wire-Stripper-No-5-Pro-2.jpg') }}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Wire-Stripper-No-5-Pro-3.jpg') }}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">Wire Stripper No. 5 Pro</h3>
                            <p class="product-description">For all common stranded and solid conductors I working range 0,2 – 16,0 mm²</p>
                            <div class="price-section">
                                <span class="current-price">$128.66</span>
                                <span class="original-price">$139</span>
                            </div>
                            <button class="btn-cart">Add to Cart</button>
                            <button class="btn-view">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-container">
                            <span class="discount-badge">-35%</span>
                            <div class="swiper product-image-swiper product-image-swiper-1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Smoke-Detector-Test-Spray-1.jpg') }}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Smoke-Detector-Test-Spray-2.jpg') }}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Smoke-Detector-Test-Spray-3.jpg') }}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">Smoke Detector Test Spray</h3>
                            <p class="product-description">for photoelectric and optical smoke detectors</p>
                            <div class="price-section">
                                <span class="current-price">$50.02</span>
                                <span class="original-price">$10</span>
                            </div>
                            <button class="btn-cart">Add to Cart</button>
                            <button class="btn-view">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-container">
                            <span class="discount-badge">-40%</span>
                            <div class="swiper product-image-swiper product-image-swiper-1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Leak-Detection-Spray-1.jpg') }}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Leak-Detection-Spray-2.jpg') }}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Leak-Detection-Spray-3.jpg') }}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">Leak Detection Spray</h3>
                            <p class="product-description">locate cracks and leaks in pressurised pipes</p>
                            <div class="price-section">
                                <span class="current-price">$18.94</span>
                                <span class="original-price">$50</span>
                            </div>
                            <button class="btn-cart">Add to Cart</button>
                            <button class="btn-view">View Details</button>
                        </div>
                    </div>
                </div>
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
    <div  class="container py-5 first-swip" id="featured-products-slider-2">
        <h2 class="text-center mb-5">Best Seller</h2>

        <div class="swiper main-swiper second-swip" id="main-swiper-2">
            <div class="swiper-wrapper">
                <!-- Product 1 -->
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-container">
                            <span class="discount-badge">-25%</span>
                            <div class="swiper product-image-swiper product-image-swiper-2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/WEICON-Pool-Repair-Kit-1.jpg')}}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/WEICON-Pool-Repair-Kit-2.jpg')}}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/WEICON-Pool-Repair-Kit-1.jpg')}}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">WEICON Pool Repair Kit</h3>
                            <p class="product-description">cures reliably even under water | application on wet surfaces | excellent adhesion</p>
                            <div class="price-section">
                                <span class="current-price">$102.91</span>
                                <span class="original-price">$199</span>
                            </div>
                            <div class="action-buttons">

                            </div>
                            <button class="btn-cart">Add to Cart</button>
                            <button class="btn-view">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-container">
                            <span class="discount-badge">-30%</span>
                            <div class="swiper product-image-swiper product-image-swiper-2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Repair-Tape-1.jpg')}}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Repair-Tape-2.jpg')}}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Repair-Tape-3.jpg')}}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">Repair-Tape</h3>
                            <p class="product-description">Flexible, durable and self-fusing repair tape for applications in indoor or outdoor areas.</p>
                            <div class="price-section">
                                <span class="current-price">$39.63</span>
                                <span class="original-price">$59</span>
                            </div>
                            <button class="btn-cart">Add to Cart</button>
                            <button class="btn-view">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-container">
                            <span class="discount-badge">-20%</span>
                            <div class="swiper product-image-swiper product-image-swiper-2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Flat-and-Round-Cable-Stripper-1.jpg')}}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Flat-and-Round-Cable-Stripper-2.jpg')}}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Flat-and-Round-Cable-Stripper-3.jpg')}}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">Flat and Round Cable Stripper</h3>
                            <p class="product-description">for all common flat cables up to a width of 18 mm and all common round cables with a diameter of 6-13 mm</p>
                            <div class="price-section">
                                <span class="current-price">$59.72</span>
                                <span class="original-price">$99</span>
                            </div>
                            <button class="btn-cart">Add to Cart</button>
                            <button class="btn-view">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-container">
                            <span class="discount-badge">-15%</span>
                            <div class="swiper product-image-swiper product-image-swiper-2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Wire-Stripper-No-5-Pro-1.jpg')}}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Wire-Stripper-No-5-Pro-2.jpg')}}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Wire-Stripper-No-5-Pro-3.jpg')}}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">Wire Stripper No. 5 Pro</h3>
                            <p class="product-description">For all common stranded and solid conductors I working range 0,2 – 16,0 mm²</p>
                            <div class="price-section">
                                <span class="current-price">$128.66</span>
                                <span class="original-price">$139</span>
                            </div>
                            <button class="btn-cart">Add to Cart</button>
                            <button class="btn-view">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-container">
                            <span class="discount-badge">-35%</span>
                            <div class="swiper product-image-swiper product-image-swiper-2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Smoke-Detector-Test-Spray-1.jpg')}}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Smoke-Detector-Test-Spray-2.jpg')}}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Smoke-Detector-Test-Spray-3.jpg')}}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">Smoke Detector Test Spray</h3>
                            <p class="product-description">for photoelectric and optical smoke detectors</p>
                            <div class="price-section">
                                <span class="current-price">$50.02</span>
                                <span class="original-price">$10</span>
                            </div>
                            <button class="btn-cart">Add to Cart</button>
                            <button class="btn-view">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-container">
                            <span class="discount-badge">-40%</span>
                            <div class="swiper product-image-swiper product-image-swiper-2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Leak-Detection-Spray-1.jpg')}}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Leak-Detection-Spray-2.jpg')}}" alt="Product">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('asset/img/product/Leak-Detection-Spray-3.jpg')}}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">Leak Detection Spray</h3>
                            <p class="product-description">locate cracks and leaks in pressurised pipes</p>
                            <div class="price-section">
                                <span class="current-price">$18.94</span>
                                <span class="original-price">$50</span>
                            </div>
                            <button class="btn-cart">Add to Cart</button>
                            <button class="btn-view">View Details</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>
    </div>

@push('scripts')
<script src="{{ asset('asset/js/swiper.js') }}"></script>
@endpush
@endsection
