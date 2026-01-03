 @extends('layouts.app')
 @section('content')

    <div class="container my-4">
        <div class="row">

            <!-- SIDEBAR -->
            <div class="col-lg-3 col-md-4 col-12 mb-4">
                <div class="filter-sidebar">

                    <!-- Filter Title -->
                    <h4 class="filter-title">Filters</h4>
                    @foreach($categories as $category)
                        <div class="filter-section">
                            <div class="filter-header"  onclick="toggleFilter('cat-{{ $category->id }}')">
                                <span>{{ $category->type_name }}</span>
                                <span id="cat-{{ $category->id }}-toggle" class="toggle-arrow">▼</span>
                            </div>
                            <div id="cat-{{ $category->id }}-content" class="filter-content">
                                @foreach($category->subCategories as $sub)
                                    <label><input type="checkbox"class="category-filter" value="{{ $sub->id }}" name="categories[]"> {{ $sub->sub_category_name }}</label>
                                @endforeach
                                
                            </div>
                        </div>
                    @endforeach

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
                        <!-- <li class="breadcrumb-item active" aria-current="page">Application Areas</li> -->
                    </ol>
                </nav>

                <!-- Results + Sort -->
                <!-- <div class="results-header">
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
                </div> -->

                <!-- PRODUCT GRID -->
                <div class="row g-4" id="product-list">
                    <!-- Load Products -->
                </div>

                <!-- Pagination -->
                <!-- <nav aria-label="Product pagination" class="mt-5">
                    <ul class="pagination justify-content-center spl-pagination">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">→</a></li>
                    </ul>
                </nav> -->
            </div>
        </div>
    </div>

@push('scripts')

    <script>
        function toggleFilter(sectionName) {
            const content = document.getElementById(`${sectionName}-content`);
            const toggle = document.getElementById(`${sectionName}-toggle`);

            content.classList.toggle("collapsed");
            toggle.classList.toggle("rotated");
        }
        function loadProducts() {
            $.ajax({
                url: getProducts,
                
            });
        }
const getProducts = "{{ route('getproducts') }}";
$(document).ready(function () {
    loadProducts();
    $(document).on('change', '.category-filter', function () {
        loadProducts();
    });
});
function applyPriceFilter() {
    loadProducts();
}

function loadProducts() {
    let categories = [];
    $('.category-filter:checked').each(function () {
        categories.push($(this).val());
    });
    let minPrice = $('#minPrice').val();
    let maxPrice = $('#maxPrice').val();
    $.ajax({
        url: getProducts,
        type: "GET",
        data: {
            categories: categories,
            min_price: minPrice,
            max_price: maxPrice
        },
        success: function (response) {
            let products = response.products;
            let wishlist = response.wishlist || [];
            let html = '';
            if (products.length === 0) {
                $('#product-list').html('<p class="text-center">No products found</p>');
                return;
            }

            products.forEach(product => {

                let images = '';
                product.images.forEach(img => {
                    images += `
                        <div class="swiper-slide">
                            <img src="public/uploads/products/${img.image}" alt="${products.name}">
                        </div>`;
                });

                html += `
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="product-card3">
                        <div class="product-image-container">
                            <span class="discount-badge">${product.discount_percent}%</span>
                            <div class="swiper product-image-swiper  product-image-swiper-2">
                                <div class="swiper-wrapper">
                                    ${images}
                                </div>
                            </div>
                        </div>

                        <div class="product-details">
                            <h3 class="product-title">${product.name}</h3>
                            <p class="product-description">${product.short_description ?? ''}</p>
                            <div class="price-section">
                                <span class="current-price">₹${product.original_price}</span>
                                <span class="original-price">₹${product.price}</span>

                            </div>
                            <button class="btn-cart w-100 my-1 add-to-cart" data-id="${product.id}">Add to Cart</button>
                            <button class="btn-view w-100 my-1" onclick="viewProductDetails(${product.id})">View Details</button>
                        </div>
                    </div>
                </div>`;
            });

            $('#product-list').html(html);
        }
    });
}
function viewProductDetails(productId) {
    window.location.href = "{{ url('/product') }}/" + productId;
}
</script>
@endpush
@endsection
