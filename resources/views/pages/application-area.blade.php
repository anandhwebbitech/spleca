 @extends('layouts.app')
 @section('content')

    <div class="container my-4">
        <div class="row">

            <!-- SIDEBAR -->
            <div class="col-lg-3 col-md-4 col-12 mb-4">
                <div class="filter-sidebar">

                    <!-- Filter Title -->
                    <h4 class="filter-title">Filters</h4>

                    <!-- Categories -->
                    <div class="filter-section">
                        <div class="filter-header" onclick="toggleFilter('category')">
                            <span>Application Area</span>
                            <span id="category-toggle" class="toggle-arrow">▼</span>
                        </div>
                        <div id="category-content" class="filter-content">
                            <label><input type="checkbox"> Agricultural Technology</label>
                            <label><input type="checkbox"> Automotive and Transport</label>
                            <label><input type="checkbox"> Building Trades</label>
                            <label><input type="checkbox"> Electrical Installation</label>
                            <label><input type="checkbox"> Energy</label>
                            <label><input type="checkbox"> Food, Pharma and Cosmetics</label>
                            <label><input type="checkbox"> Hydraulic and pneumatic</label>
                            <label><input type="checkbox"> Maintenance</label>
                            <label><input type="checkbox"> Maritime industry</label>
                            <label><input type="checkbox"> Mechanical Engineering</label>
                            <label><input type="checkbox"> Mining</label>
                            <label><input type="checkbox"> Mould-making</label>
                            <label><input type="checkbox"> Oil and Gas</label>
                            <label><input type="checkbox"> Rubber and plastic industry</label>
                            <label><input type="checkbox"> Stainless Steel</label>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="filter-section">
                        <div class="filter-header" onclick="toggleFilter('brand')">
                            <span>KEB Automation</span>
                            <span id="brand-toggle" class="toggle-arrow">▼</span>
                        </div>
                        <div id="brand-content" class="filter-content">
                            <label><input type="checkbox"> Adhesives and Sealants</label>
                            <label><input type="checkbox"> Technical Sprays</label>
                            <label><input type="checkbox"> Technical Liquids</label>
                            <label><input type="checkbox"> Accessories and Processing Aids</label>
                            <label><input type="checkbox"> Assembly Sprays</label>
                            <label><input type="checkbox"> High-Performance Greases</label>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="filter-section">
                        <div class="filter-header" onclick="toggleFilter('omron')">
                            <span>Omron Automation</span>
                            <span id="omron-toggle" class="toggle-arrow">▼</span>
                        </div>
                        <div id="omron-content" class="filter-content">
                            <label><input type="checkbox"> Servo Drives And Motors</label>
                            <label><input type="checkbox"> PLC And HMI</label>
                            <label><input type="checkbox"> Motion Controller</label>
                            <label><input type="checkbox"> Omron Others</label>
                            <label><input type="checkbox"> Industrial PC</label>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="filter-section">
                        <div class="filter-header" onclick="toggleFilter('weicon')">
                            <span>Weicon Tools</span>
                            <span id="weicon-toggle" class="toggle-arrow">▼</span>
                        </div>
                        <div id="weicon-content" class="filter-content">
                            <label><input type="checkbox"> Cable Cutters</label>
                            <label><input type="checkbox"> Stripping Tools</label>
                            <label><input type="checkbox"> Crimping Tools</label>
                            <label><input type="checkbox"> Torque Tools</label>
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div class="filter-section">
                        <div class="filter-header" onclick="toggleFilter('price')">
                            <span>Price</span>
                            <span id="price-toggle" class="filter-toggle">+</span>
                        </div>

                        <div class="filter-content collapsed" id="price-content">

                            <div class="price-input-group">
                                <label>Min</label>
                                <input type="number" id="minPrice" placeholder="0">
                            </div>

                            <div class="price-input-group">
                                <label>Max</label>
                                <input type="number" id="maxPrice" placeholder="10000">
                            </div>

                            <button class="price-filter-btn" onclick="applyPriceFilter()">Apply</button>

                        </div>
                    </div>

                    <!-- Rating Filter -->
                    <div class="filter-section">
                        <div class="filter-header" onclick="toggleFilter('rating')">
                            <span>Rating</span>
                            <span id="rating-toggle" class="filter-toggle">+</span>
                        </div>

                        <div class="filter-content collapsed" id="rating-content">

                            <!-- 5 Star -->
                            <label class="rating-filter">
                                <input type="checkbox">
                                <span class="stars">
                                    ★★★★★
                                </span>
                                <span class="count">(120)</span>
                            </label>

                            <!-- 4 Star & Up -->
                            <label class="rating-filter">
                                <input type="checkbox">
                                <span class="stars">
                                    ★★★★☆
                                </span>
                                <span class="count">& Up</span>
                            </label>

                            <!-- 3 Star & Up -->
                            <label class="rating-filter">
                                <input type="checkbox">
                                <span class="stars">
                                    ★★★☆☆
                                </span>
                                <span class="count">& Up</span>
                            </label>

                            <!-- 2 Star & Up -->
                            <label class="rating-filter">
                                <input type="checkbox">
                                <span class="stars">
                                    ★★☆☆☆
                                </span>
                                <span class="count">& Up</span>
                            </label>

                            <!-- 1 Star & Up -->
                            <label class="rating-filter">
                                <input type="checkbox">
                                <span class="stars">
                                    ★☆☆☆☆
                                </span>
                                <span class="count">& Up</span>
                            </label>

                        </div>
                    </div>


                </div>
            </div>

            <!-- PRODUCT LISTING -->
            <div class="col-lg-9 col-md-8 col-12">

                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-black">SPLECA</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-black">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Application Areas</li>
                    </ol>
                </nav>

                <!-- Results + Sort -->
                <div class="results-header">
                    <h5 class="results-count">Showing 1–32 of 151 results</h5>
                    <div>
                        <select class="form-select" id="sortSelect" style="width: auto;">
                            <option value="latest">Sort by latest</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="price-low">Sort by price: low to high</option>
                            <option value="price-high">Sort by price: high to low</option>
                        </select>
                    </div>
                </div>

                <!-- PRODUCT GRID -->
                <div class="row g-4">
                    <!-- Repeatable Product Card -->
                    <!-- PRODUCT 1 -->
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="product-card3">
                            <div class="product-image-container">
                                <span class="discount-badge">-25%</span>
                                <div class="swiper product-image-swiper product-image-swiper-2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="asset/img/product/WEICON-Pool-Repair-Kit-1.jpg" alt="Product">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="asset/img/product/WEICON-Pool-Repair-Kit-2.jpg" alt="Product">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="asset/img/product/WEICON-Pool-Repair-Kit-1.jpg" alt="Product">
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
                                <button class="btn-cart w-100 my-1">Add to Cart</button>
                                <button class="btn-view w-100 my-1">View Details</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="product-card3">
                            <div class="product-image-container">
                                <span class="discount-badge">-25%</span>
                                <div class="swiper product-image-swiper product-image-swiper-2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="asset/img/product/WEICON-Pool-Repair-Kit-1.jpg" alt="Product">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="asset/img/product/WEICON-Pool-Repair-Kit-2.jpg" alt="Product">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="asset/img/product/WEICON-Pool-Repair-Kit-1.jpg" alt="Product">
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
                                <button class="btn-cart w-100 my-1">Add to Cart</button>
                                <button class="btn-view w-100 my-1">View Details</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="product-card3">
                            <div class="product-image-container">
                                <span class="discount-badge">-25%</span>
                                <div class="swiper product-image-swiper product-image-swiper-2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="asset/img/product/WEICON-Pool-Repair-Kit-1.jpg" alt="Product">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="asset/img/product/WEICON-Pool-Repair-Kit-2.jpg" alt="Product">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="asset/img/product/WEICON-Pool-Repair-Kit-1.jpg" alt="Product">
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
                                <button class="btn-cart w-100 my-1">Add to Cart</button>
                                <button class="btn-view w-100 my-1">View Details</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="product-card3">
                            <div class="product-image-container">
                                <span class="discount-badge">-25%</span>
                                <div class="swiper product-image-swiper product-image-swiper-2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="asset/img/product/WEICON-Pool-Repair-Kit-1.jpg" alt="Product">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="asset/img/product/WEICON-Pool-Repair-Kit-2.jpg" alt="Product">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="asset/img/product/WEICON-Pool-Repair-Kit-1.jpg" alt="Product">
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
                                <button class="btn-cart w-100 my-1">Add to Cart</button>
                                <button class="btn-view w-100 my-1">View Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- DUPLICATE CARD (you have multiple, keeping same structure) -->
                    <!-- ...repeat your existing cards here... -->
                </div>

                <!-- Pagination -->
                <nav aria-label="Product pagination" class="mt-5">
                    <ul class="pagination justify-content-center spl-pagination">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">→</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <script>
        function toggleFilter(sectionName) {
            const content = document.getElementById(`${sectionName}-content`);
            const toggle = document.getElementById(`${sectionName}-toggle`);

            content.classList.toggle("collapsed");
            toggle.classList.toggle("rotated");
        }
    </script>
@endsection
