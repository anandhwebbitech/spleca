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



     <div class="container main-container">
         <h2 class="industrial-app-list-heading">Latest Applications</h2>

         <div class="row g-4">
             <!-- Card 1 -->
             <div class="col-xl-4 col-md-6">
                 <div class="blog-card">
                     <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&q=80&w=800"
                         class="card-img-top" alt="Industry">
                     <div class="card-content">
                         <span class="category-tag">Infrastructure</span>
                         <a href="blog" class="blog-title">Pipeline Bonding in Romania</a>
                         <p class="card-description">High-performance adhesive solutions for critical energy infrastructure
                             maintenance and repair.</p>
                         <a href="{{ route('blog1') }}" class="read-more-btn">View Details</a>
                     </div>
                 </div>
             </div>

             <!-- Card 2 -->
             <div class="col-xl-4 col-md-6">
                 <div class="blog-card">
                     <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=800"
                         class="card-img-top" alt="Architecture">
                     <div class="card-content">
                         <span class="category-tag">Architecture</span>
                         <a href="#" class="blog-title">Dubai Trade Fair Pavilion</a>
                         <p class="card-description">Sophisticated bonding work for modern architectural marvels using
                             invisible structural adhesives.</p>
                         <a href="#" class="read-more-btn">View Details</a>
                     </div>
                 </div>
             </div>

             <!-- Card 3 -->
             <div class="col-xl-4 col-md-6">
                 <div class="blog-card">
                     <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=800"
                         class="card-img-top" alt="Manufacturing">
                     <div class="card-content">
                         <span class="category-tag">Manufacturing</span>
                         <a href="#" class="blog-title">Automotive Assembly Lines</a>
                         <p class="card-description">Optimizing production speed with 1-component adhesives for fast-paced
                             industrial manufacturing.</p>
                         <a href="#" class="read-more-btn">View Details</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
