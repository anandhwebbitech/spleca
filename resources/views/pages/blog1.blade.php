 @extends('layouts.app')
 @section('content')
     <section class="page-banner">
         <div class="content-wrapper">
             <h1>Blog</h1>
             <div class="breadcrumb">
                 <a href="{{ route('homepage') }}">
                     <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                         <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                         <polyline points="9 22 9 12 15 12 15 22"></polyline>
                     </svg>
                     Home
                 </a>
                 <span>/</span>
                 <span>Blog</span>
             </div>
         </div>
     </section>

     <div class="container industrial-detail-container">
         <!-- Navigation -->
         <a href="index.html" class="industrial-back-link">
             <i class="bi bi-arrow-left"></i> Back to Overview
         </a>

         <div class="row">
             <!-- Main Content -->
             <div class="col-lg-8">
                 <header>
                     <span class="industrial-article-category">Equipment Protection</span>
                     <h1 class="industrial-article-title">How to Extend Equipment Life with the Right Sealing Products</h1>
                 </header>

                 <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=1200"
                     alt="Industrial Sealing Application" class="industrial-feature-img">

                 <div class="industrial-content-body">
                     <p>
                         Welding, riveting, and bolting have all been used for a long time, but industrial bonding solutions
                         are becoming the better choice. Industries can get stronger, safer, and more efficient by using
                         advanced adhesives.
                     </p>

                     <h2>Why Industrial Bonding Matters</h2>
                     <p>
                         Industrial bonding is more than just putting two things together. Modern glues are made to handle a
                         wide range of conditions, such as temperature changes, vibrations, heavy loads, and exposure to
                         chemicals. <br>

                         Mechanical fasteners can weaken a structure by drilling holes or putting a lot of stress on one
                         point. Bonding, on the other hand, spreads loads evenly across the whole joint. This improves
                         structural integrity bonding and the overall life of the equipment.
                     </p>

                     <div><strong>Checkout</strong><a href="#"> WEICON Industrial Bonding Solutions</a></div>

                     {{-- <div class="industrial-quote-block">
                         "The right sealing materials can keep equipment working well for years longer than equipment that
                         isn’t sealed."
                     </div> --}}

                     <h3>Key Benefits of Industrial Bonding Solutions</h3>

                     <!-- Product Navigation List -->
                     <div class="industrial-product-list mt-4">

                         <!-- Product 1 -->
                         <a href="#" class="industrial-product-nav-item">
                             {{-- <div class="industrial-product-img-link">
                                 <img src="https://images.unsplash.com/photo-1615486511484-92e172cc4ee0?auto=format&fit=crop&q=80&w=200"
                                     alt="Threadlocking Varnish">
                             </div> --}}
                             <div class="industrial-product-info">
                                 <span class="industrial-product-name-link">1. WEICON Threadlocking Varnish</span>
                                 <p class="industrial-product-desc">A specialised sealing and marking varnish that doubles
                                     as a corrosion and tamper-protection solution.</p>
                             </div>
                         </a>

                         <!-- Product 2 -->
                         <a href="product-epoxy-c.html" class="industrial-product-nav-item">
                             <div class="industrial-product-img-link">
                                 <img src="https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?auto=format&fit=crop&q=80&w=200"
                                     alt="Epoxy Resin">
                             </div>
                             <div class="industrial-product-info">
                                 <span class="industrial-product-name-link">2. WEICON C Epoxy Resin</span>
                                 <p class="industrial-product-desc">Temperature-resistant, flowable epoxy resin system.
                                     Non-corrosive and anti-magnetic for industrial tools.</p>
                             </div>
                         </a>

                         <!-- Product 3 -->
                         <a href="product-repair-stick.html" class="industrial-product-nav-item">
                             <div class="industrial-product-img-link">
                                 <img src="https://images.unsplash.com/photo-1590234900540-029dd767f733?auto=format&fit=crop&q=80&w=200"
                                     alt="Repair Stick">
                             </div>
                             <div class="industrial-product-info">
                                 <span class="industrial-product-name-link">3. Repair Stick Aluminium</span>
                                 <p class="industrial-product-desc">Pasty aluminium-filled repair stick ideal for patching
                                     and repairing metal parts on vertical surfaces.</p>
                             </div>
                         </a>

                         <!-- Product 4 -->
                         <a href="product-flange-seal.html" class="industrial-product-nav-item">
                             <div class="industrial-product-img-link">
                                 <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&q=80&w=200"
                                     alt="Flange Sealing">
                             </div>
                             <div class="industrial-product-info">
                                 <span class="industrial-product-name-link">4. WEICONLOCK® AN 305-10 Flange Sealing</span>
                                 <p class="industrial-product-desc">Flange sealing adhesive designed to seal joints and
                                     prevent leaks in bolted flange connections.</p>
                             </div>
                         </a>

                         <!-- Product 5 -->
                         <a href="product-rk1300.html" class="industrial-product-nav-item">
                             <div class="industrial-product-img-link">
                                 <img src="https://images.unsplash.com/photo-1581093450021-4a7360e9a6ad?auto=format&fit=crop&q=80&w=200"
                                     alt="Acrylic Adhesive">
                             </div>
                             <div class="industrial-product-info">
                                 <span class="industrial-product-name-link">5. RK-1300 Structural Acrylic Adhesive</span>
                                 <p class="industrial-product-desc">High strength structural adhesive featuring a no-mix
                                     activator process for large surfaces.</p>
                             </div>
                         </a>

                     </div>

                     <h3 class="mt-5">Key Benefits of Industrial Sealing Solutions</h3>
                     <ul class="industrial-benefit-list">
                         <li><strong>Enhanced Equipment Lifespan:</strong> Reducing friction and corrosion minimizes
                             mechanical strain.</li>
                         <li><strong>Improved Energy Efficiency:</strong> Prevents air and fluid loss, reducing energy
                             consumption.</li>
                         <li><strong>Operational Safety:</strong> Reduces risk of leaks, pressure failures, and
                             environmental hazards.</li>
                         <li><strong>Reduced Maintenance Costs:</strong> Fewer breakdowns and longer service intervals.</li>
                     </ul>
                 </div>

                 <div class="industrial-cta-card">
                     <h3>Explore Our Range</h3>
                     <p>Industrial sealing products engineered for extreme environments — only at SPLECA.</p>
                     <a href="#" class="btn-industrial-outline">View Catalog</a>
                 </div>
             </div>

             <!-- Sidebar -->
             <div class="col-lg-4 ps-lg-5 mt-5 mt-lg-0">
                 <div class="industrial-meta-box">
                     <span class="industrial-meta-label">Industry Focus</span>
                     <span class="industrial-meta-value">Manufacturing & Energy</span>

                     <span class="industrial-meta-label">Core Brands</span>
                     <span class="industrial-meta-value">WEICON, SPLECA</span>

                     <span class="industrial-meta-label">Primary Goal</span>
                     <span class="industrial-meta-value">Machinery Longevity</span>

                     <span class="industrial-meta-label">Date Published</span>
                     <span class="industrial-meta-value">March 09, 2026</span>
                 </div>

                 <div class="mt-5">
                     <h5 class="fw-bold mb-4" style="color: #2b488d;">Related Insights</h5>
                     <ul class="list-unstyled">
                         <li class="mb-3 border-bottom pb-3">
                             <a href="#" class="text-decoration-none text-dark fw-bold d-block mb-1">Pipeline Bonding
                                 Success</a>
                             <small class="text-muted">Infrastructure maintenance in Romania.</small>
                         </li>
                         <li class="mb-3 border-bottom pb-3">
                             <a href="#" class="text-decoration-none text-dark fw-bold d-block mb-1">Modern Adhesives
                                 in Dubai</a>
                             <small class="text-muted">High-strength architectural bonding.</small>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 @endsection
