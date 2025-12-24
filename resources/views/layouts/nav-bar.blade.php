 <!-- Top Bar -->
 <div class="top-bar">
     <div class="container">
         <div class="d-flex justify-content-between align-items-center flex-wrap">
             <div>
                 <a href="tel:+91 918041171145"><i class="fas fa-phone-alt"></i>+91 91-80-41171145 / 64506442</a>
             </div>
             <div class="d-flex gap-2 flex-wrap">
                 <a class="mob-1" href="mailto:info@spleca.com.au"><i class="fas fa-envelope"></i>info@spleca.com.au / info@leca.in</a>
                 <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                 <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                 <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                 <a href="#"><i class="fa-brands fa-skype"></i></a>
             </div>
         </div>
     </div>
 </div>
 <!-- Main Navbar -->
 <nav class="navbar navbar-expand-lg">
     <div class="container">
         <div class="row w-100 align-items-center">
             <!-- Top Row: Logo, Search, Icons -->
             <div class="col-12">
                 <div class="d-flex justify-content-between align-items-center flex-wrap">

                     <!-- Left Logo -->
                     <a class="navbar-brand order-1" href="#">
                         <div class="weicon-logo poss">
                             <img class="margin-left" src="asset/img/logo.png" alt="">
                         </div>
                     </a>

                     <!-- Search Box -->
                     <div class="search-box mx-3 order-3 order-md-2 w-100 w-md-auto mt-2 mt-md-0 text-center text-md-start">
                         <input type="text" placeholder="Search products...">
                         <button><i class="fas fa-search"></i></button>
                     </div>

                     <!-- Right Logo (CENTER ON MOBILE) -->
                     <a class="navbar-brand order-2 order-md-3  text-center mt-2 mt-md-0" href="#">
                         <div class="weicon-logo poss">
                             <img src="asset/img/logo_weicon.svg" alt="">
                         </div>
                     </a>

                 </div>
             </div>

             <!-- Bottom Row: Navigation Menu -->

         </div>
     </div>
 </nav>

 <!-- Sticky Menu Section -->
 <div class="main-navigation">
     <div class="navigation-wrapper">
         <ul class="primary-menu">
             <li class="menu-item">
                 <a class="menu-link" href="{{ route('homepage') }}">Home</a>
             </li>
             <li class="menu-item">
                 <a class="menu-link" href="{{route('aboutpage')}}">About</a>
             </li>
             <li class="menu-item">
                 <a class="menu-link has-dropdown" href="#">
                     Products <i class="bi bi-chevron-down"></i>
                 </a>
                 <!-- Products Mega Menu -->
                 <div class="dropdown-menu-full">
                     <div class="dropdown-inner">
                         <div class="dropdown-section">
                             <h6 class="section-heading1">
                                 <i class="fa-solid fa-gear"></i>
                                 Products
                             </h6>
                             <ul class="category-grid">
                                 <li class="category-card">
                                     <a href="#">
                                         <i class="fas fa-chevron-right"></i> Application Areas
                                     </a>
                                     <ul class="subcategory-list">
                                         <li><a href="application-area.php"><i class="fa-solid fa-circle"></i> Agricultural Technology</a></li>
                                         <li><a href="#"><i class="fa-solid fa-circle"></i> Automotive and Transport</a></li>
                                         <li><a href="#"><i class="fa-solid fa-circle"></i> Building Trades</a></li>
                                         <li><a href="#"><i class="fa-solid fa-circle"></i> Electrical Installation</a></li>
                                         <li><a href="#"><i class="fa-solid fa-circle"></i> Energy</a></li>
                                         <li><a href="#"><i class="fa-solid fa-circle"></i> Food, Pharma and Cosmetics</a></li>
                                         <li><a href="#"><i class="fa-solid fa-circle"></i> Hydraulic and pneumatic</a></li>
                                         <li><a href="#"><i class="fa-solid fa-circle"></i> Maintenance</a></li>
                                         <li><a href="#"><i class="fa-solid fa-circle"></i> Maritime industry</a></li>
                                         <li><a href="#"><i class="fa-solid fa-circle"></i> Mining</a></li>
                                         <li><a href="#"><i class="fa-solid fa-circle"></i> Mould-making</a></li>
                                         <li><a href="#"><i class="fa-solid fa-circle"></i> Oil and Gas</a></li>
                                     </ul>
                                 </li>
                                 <li class="category-card">
                                     <a href="#">
                                         <i class="fas fa-chevron-right"></i> KEB Automation
                                     </a>
                                     <ul class="subcategory-list">
                                         <li><a href="#"><i class="fas fa-circle"></i> Adhesives and Sealants</a></li>
                                         <li><a href="#"><i class="fas fa-circle"></i> Technical Sprays</a></li>
                                         <li><a href="#"><i class="fas fa-circle"></i> Technical Liquids</a></li>
                                         <li><a href="#"><i class="fas fa-circle"></i> Accessories and Processing Aids</a></li>
                                         <li><a href="#"><i class="fas fa-circle"></i> Assembly Sprays</a></li>
                                         <li><a href="#"><i class="fas fa-circle"></i> High-Performance Greases</a></li>
                                     </ul>
                                 </li>
                                 <li class="category-card">
                                     <a href="#">
                                         <i class="fas fa-chevron-right"></i> Omron Automation
                                     </a>
                                     <ul class="subcategory-list">
                                         <li><a href="#"><i class="fas fa-circle"></i> Servo Drives And Motors</a></li>
                                         <li><a href="#"><i class="fas fa-circle"></i> PLC And HΜΙ</a></li>
                                         <li><a href="#"><i class="fas fa-circle"></i> Motion Controller</a></li>
                                         <li><a href="#"><i class="fas fa-circle"></i> Omron Others</a></li>
                                         <li><a href="#"><i class="fas fa-circle"></i> Industrial PC</a></li>
                                     </ul>
                                 </li>
                                 <li class="category-card">
                                     <a href="#">
                                         <i class="fas fa-chevron-right"></i> Weicon Tools
                                     </a>
                                     <ul class="subcategory-list">
                                         <li><a href="#"><i class="fas fa-circle"></i> Cable Cutters</a></li>
                                         <li><a href="#"><i class="fas fa-circle"></i> Stripping Tools</a></li>
                                         <li><a href="#"><i class="fas fa-circle"></i> Crimping Tools</a></li>
                                         <li><a href="#"><i class="fas fa-circle"></i> Torque Tools</a></li>
                                     </ul>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </li>
             <li class="menu-item">
                 <a class="menu-link has-dropdown" href="#">
                     Services <i class="bi bi-chevron-down"></i>
                 </a>
                 <!-- Services Mega Menu -->
                 <div class="dropdown-menu-full services-layout">
                     <div class="dropdown-inner">
                         <div class="dropdown-section">
                             <h6 class="section-heading">
                                 <i class="fa-solid fa-concierge-bell"></i>
                                 Our Services
                             </h6>
                             <ul class="category-grid">
                                 <li class="category-card">
                                     <a href="product-finder.php">
                                         <i class="fas fa-search"></i> Product Finder
                                     </a>
                                 </li>
                                 <li class="category-card">
                                     <a href="applications-and-products.php">
                                         <i class="fas fa-compass"></i> Application and Products
                                     </a>
                                 </li>
                                 <li class="category-card">
                                     <a href="product-solutions.php">
                                         <i class="fas fa-lightbulb"></i> Product Solution
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </li>
             <li class="menu-item">
                 <a class="menu-link has-dropdown" href="newsletter.php">
                     Blog <i class="bi bi-chevron-down"></i>
                 </a>
                 <!-- Blog Mega Menu -->
                 <div class="dropdown-menu-full blog-layout">
                     <div class="dropdown-inner">
                         <div class="dropdown-section">
                             <h6 class="section-heading">
                                 <i class="fa-solid fa-blog"></i>
                                 Blog & Updates
                             </h6>
                             <ul class="category-grid">
                                 <li class="category-card">
                                     <a href="{{route('newsletterpage')}}">
                                         <i class="fas fa-newspaper"></i> News Letter
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </li>
             <li class="menu-item">
                 <a class="menu-link btn-contact" href="{{route('contactpage')}}">
                     <i class="fa-solid fa-phone"></i> Contact Us
                 </a>
             </li>
         </ul>

         <!-- Icons (Right) -->
         <div class="header-actions">
             <a href="{{route('wishlistpage')}}"style="position: relative;">
                 <i class="far fa-heart"></i>
                 <span class="notification-badge">3</span>
             </a>
             <a href="{{ route('profilepage') }}"><i class="far fa-user"></i></a>
             <!-- Cart Widget -->
             <a href="#" class="cart-widget" id="cartWidget">
                 <i class="fas fa-shopping-cart"></i>
                 <span id="cartTotal">₹0.00</span>
                 <div class="cart-badge" id="cartBadge">0</div>
             </a>

             <!-- Cart Overlay -->
             <div class="cart-overlay" id="cartOverlay"></div>

             <!-- Cart Panel -->
             <div class="cart-panel" id="cartPanel">
                 <div class="cart-header">
                     <h2>
                         <i class="fas fa-shopping-bag"></i>
                         Shopping Cart
                     </h2>
                     <button class="close-cart" id="closeCart">
                         <i class="fas fa-times"></i>
                     </button>
                 </div>

                 <div class="cart-items" id="cartItems">
                     <div class="empty-cart">
                         <!-- <i class="fas fa-shopping-cart"></i>
                                <p>Your cart is empty</p> -->
                         <div class="wb-cart-item">

                             <!-- Product Image -->
                             <img src="asset/img/product/Leak-Detection-Spray-1.jpg" class="wb-cart-img" alt="Product">

                             <!-- Middle Content -->
                             <div class="wb-cart-info">
                                 <h4 class="wb-cart-title">Leak Detection Spray</h4>

                                 <div class="wb-qty-row">
                                     <button class="wb-qty-btn">-</button>
                                     <span class="wb-qty-value">1</span>
                                     <button class="wb-qty-btn">+</button>
                                 </div>

                                 <div class="wb-cart-price text-start">₹130</div>
                             </div>

                             <!-- Remove Button -->
                             <button class="wb-remove-btn">X</button>
                         </div>
                     </div>
                 </div>

                 <div class="cart-footer">
                     <div class="cart-total">
                         <span>Total:</span>
                         <span class="total-amount" id="totalAmount">₹0.00</span>
                     </div>
                     <button class="checkout-btn" id="checkoutBtn" disabled>
                         <i class="fas fa-lock"></i> Proceed to Checkout
                     </button>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- HEADER -->
 <header class="wb-header">
     <button class="wb-hamburger-btn" id="menuBtn" aria-label="Toggle menu" aria-expanded="false">
         <i class="fa-solid fa-bars"></i>
     </button>

     <div class="wb-header-actions">
         <!-- Wishlist -->
         <div class="wb-action-item" id="wishlistBtn">
             <a href="{{route('wishlistpage')}}">
                 <i class="fa-regular fa-heart"></i>
             </a>
             <span class="wb-badge">3</span>
             <!-- <div class="wb-dropdown" id="wishlistDropdown">
                        <div class="wb-dropdown-header">Wishlist (3 items)</div>
                        <a href="#" class="wb-dropdown-item">
                            <i class="fa-solid fa-wrench"></i>
                            <span>Hydraulic Pump</span>
                        </a>
                        <a href="#" class="wb-dropdown-item">
                            <i class="fa-solid fa-screwdriver"></i>
                            <span>Electric Motor</span>
                        </a>
                        <a href="#" class="wb-dropdown-item">
                            <i class="fa-solid fa-cog"></i>
                            <span>Servo Drive</span>
                        </a>
                    </div> -->
         </div>

         <!-- Profile -->
         <div class="wb-action-item" id="profileBtn">
             <i class="fa-regular fa-user"></i>
             <div class="wb-dropdown" id="profileDropdown">
                 <div class="wb-dropdown-header">My Account</div>
                 <a href="#" class="wb-dropdown-item">
                     <i class="fa-solid fa-user"></i>
                     <span>Profile</span>
                 </a>
                 <a href="#" class="wb-dropdown-item">
                     <i class="fa-solid fa-box"></i>
                     <span>Orders</span>
                 </a>
                 <a href="{{route('wishlistpage')}}" class="wb-dropdown-item">
                     <i class="fa-solid fa-heart"></i>
                     <span>Wishlist</span>
                 </a>
                 <a href="#" class="wb-dropdown-item">
                     <i class="fa-solid fa-gear"></i>
                     <span>Settings</span>
                 </a>
                 <a href="#" class="wb-dropdown-item">
                     <i class="fa-solid fa-right-from-bracket"></i>
                     <span>Logout</span>
                 </a>
             </div>
         </div>

         <!-- Cart -->
         <div class="wb-action-item">
             <a href="{{route('wishlistpage')}}" class="wb-cart-btn" id="cartBtn">
                 <i class="fa-solid fa-cart-shopping"></i>
                 <span>₹0.00</span>
             </a>
             <div class="wb-dropdown" id="cartDropdown">
                 <div class="wb-empty-state">
                     <i class="fa-solid fa-cart-shopping"></i>
                     <p>Your cart is empty</p>
                 </div>
             </div>
         </div>
     </div>
 </header>

 <!-- MOBILE SIDEBAR -->
 <nav id="wb-mobile-nav" class="wb-mobile-nav" aria-hidden="true">
     <div class="wb-overlay" id="overlay"></div>

     <div class="wb-drawer">
         <div class="wb-drawer-header">
             <a href="#" class="wb-logo"><i class="fa-solid fa-gear"></i></a>
             <button class="wb-close-btn" id="closeBtn" aria-label="Close menu">
                 <i class="fa-solid fa-xmark"></i>
             </button>
         </div>

         <ul class="wb-mobile-menu">
             <li><a href="{{ route('homepage') }}"><i class="fa-solid fa-house"></i> Home</a></li>
             <li><a  href="{{route('aboutpage')}}"><i class="fa-solid fa-circle-info"></i> About</a></li>

             <!-- PRODUCTS MENU -->
             <li class="wb-accordion">
                 <button class="wb-accordion-toggle" aria-expanded="false">
                     <span> Products</span>
                     <i class="fa-solid fa-chevron-right wb-arrow"></i>
                 </button>
                 <div class="wb-panel">
                     <ul>
                         <li class="wb-accordion">
                             <button class="wb-accordion-toggle sub" aria-expanded="false">
                                 <a href="#" class="a-edit"><span><i class="fa-solid fa-toolbox"></i> Application Areas</span> </a>
                                 <i class="fa-solid fa-chevron-right wb-arrow"></i>
                             </button>
                             <div class="wb-panel">
                                 <ul>
                                     <li><a href="#"><i class="fa-solid fa-circle"></i> Agricultural Technology</a></li>
                                     <li><a href="#"><i class="fa-solid fa-circle"></i> Automotive and Transport</a></li>
                                     <li><a href="#"><i class="fa-solid fa-circle"></i> Building Trades</a></li>
                                     <li><a href="#"><i class="fa-solid fa-circle"></i> Electrical Installation</a></li>
                                     <li><a href="#"><i class="fa-solid fa-circle"></i> Energy</a></li>
                                     <li><a href="#"><i class="fa-solid fa-circle"></i> Food, Pharma and Cosmetics</a></li>
                                     <li><a href="#"><i class="fa-solid fa-circle"></i> Hydraulic and pneumatic</a></li>
                                     <li><a href="#"><i class="fa-solid fa-circle"></i> Maintenance</a></li>
                                     <li><a href="#"><i class="fa-solid fa-circle"></i> Maritime industry</a></li>
                                     <li><a href="#"><i class="fa-solid fa-circle"></i> Mining</a></li>
                                     <li><a href="#"><i class="fa-solid fa-circle"></i> Mould-making</a></li>
                                     <li><a href="#"><i class="fa-solid fa-circle"></i> Oil and Gas</a></li>
                                 </ul>
                             </div>
                         </li>

                         <li class="wb-accordion">
                             <button class="wb-accordion-toggle sub" aria-expanded="false">
                                 <a href="#" class="a-edit"> <span><i class="fa-solid fa-industry"></i> KEB Automation</span> </a>
                                 <i class="fa-solid fa-chevron-right wb-arrow"></i>
                             </button>
                             <div class="wb-panel">
                                 <ul>
                                     <li><a href="#"><i class="fas fa-circle"></i> Adhesives and Sealants</a></li>
                                     <li><a href="#"><i class="fas fa-circle"></i> Technical Sprays</a></li>
                                     <li><a href="#"><i class="fas fa-circle"></i> Technical Liquids</a></li>
                                     <li><a href="#"><i class="fas fa-circle"></i> Accessories and Processing Aids</a></li>
                                     <li><a href="#"><i class="fas fa-circle"></i> Assembly Sprays</a></li>
                                     <li><a href="#"><i class="fas fa-circle"></i> High-Performance Greases</a></li>
                                 </ul>
                             </div>
                         </li>
                         <li class="wb-accordion">
                             <button class="wb-accordion-toggle sub" aria-expanded="false">
                                 <a href="#" class="a-edit"> <span><i class="fa-solid fa-industry"></i> Omron Automation</span> </a>
                                 <i class="fa-solid fa-chevron-right wb-arrow"></i>
                             </button>
                             <div class="wb-panel">
                                 <ul>
                                     <li><a href="#"><i class="fas fa-circle"></i> Servo Drives And Motors</a></li>
                                     <li><a href="#"><i class="fas fa-circle"></i> PLC And HΜΙ</a></li>
                                     <li><a href="#"><i class="fas fa-circle"></i> Motion Controller</a></li>
                                     <li><a href="#"><i class="fas fa-circle"></i> Omron Others</a></li>
                                     <li><a href="#"><i class="fas fa-circle"></i> Industrial PC</a></li>
                                 </ul>
                             </div>
                         </li>
                     </ul>
                 </div>
             </li>

             <li class="wb-accordion">
                 <button class="wb-accordion-toggle" aria-expanded="false">
                     <span> Service</span>
                     <i class="fa-solid fa-chevron-right wb-arrow"></i>
                 </button>
                 <div class="wb-panel">
                     <ul>
                         <li class="wb-accordion">
                             <button class="wb-accordion-toggle sub" aria-expanded="false">
                                 <a href="product-finder.php" class="a-edit"> <span> Product Finder</span> </a>
                             </button>
                         </li>

                         <li class="wb-accordion">
                             <button class="wb-accordion-toggle sub" aria-expanded="false">
                                 <a href="applications-and-products.php" class="a-edit"><span> Application And Products</span> </a>

                             </button>
                         </li>
                         <li class="wb-accordion">
                             <button class="wb-accordion-toggle sub" aria-expanded="false">
                                 <a href="product-solutions.php" class="a-edit"> <span> Product Solution</span></a>
                             </button>
                         </li>
                     </ul>
                 </div>
             </li>

             <li class="wb-accordion">
                 <button class="wb-accordion-toggle" aria-expanded="false">
                     <span>Blog</span>
                     <i class="fa-solid fa-chevron-right wb-arrow"></i>
                 </button>
                 <div class="wb-panel">
                     <ul>
                         <li class="wb-accordion">
                             <button class="wb-accordion-toggle sub" aria-expanded="false">
                                 <a href="{{route('newsletterpage')}}" class="a-edit"> <span> News letter</span> </a>
                             </button>
                         </li>
                     </ul>
                 </div>
             </li>


             <li><a href="{{route('contactpage')}}" class="wb-contact"><i class="fa-solid fa-phone"></i> Contact Us</a></li>
         </ul>

         <div class="wb-footer">
             <a href="{{route('wishlistpage')}}" aria-label="Wishlist"><i class="fa-regular fa-heart"></i><span class="wb-badge">3</span></a>
             <a href="#" aria-label="User"><i class="fa-regular fa-user"></i></a>
             <a href="#" aria-label="Cart"><i class="fa-solid fa-cart-shopping"></i></a>
         </div>
     </div>
 </nav>
 