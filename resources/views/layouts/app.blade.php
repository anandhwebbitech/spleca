<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Home') | Spleca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS --}}
    @include('layouts.header-link')
</head>

<body>

    {{-- Navbar --}}
    @include('layouts.nav-bar')

    {{-- Main Content --}}
    <!-- <main class="content-wrapper">
        </main> -->
        @yield('content')

    {{-- Footer --}}
    @include('layouts.footer')

    <script src="{{ asset('asset/js/swiper.js') }}"></script>

    {{-- Core JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Swiper (ONE version only) --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

     <script>
    document.addEventListener("DOMContentLoaded", function () {

        /* ================== SWIPER ================== */
        if (typeof Swiper !== "undefined" && document.querySelector(".mySwiper")) {
            new Swiper(".mySwiper", {
                loop: true,
                slidesPerView: 1,
                autoplay: {
                    delay: 3000,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        }

        /* ================== CART ================== */
        let cart = [];

        const cartWidget  = document.getElementById('cartWidget');
        const cartOverlay = document.getElementById('cartOverlay');
        const cartPanel   = document.getElementById('cartPanel');
        const closeCart   = document.getElementById('closeCart');
        const cartItems   = document.getElementById('cartItems');
        const cartBadge   = document.getElementById('cartBadge');
        const cartTotal   = document.getElementById('cartTotal');
        const totalAmount = document.getElementById('totalAmount');
        const checkoutBtn = document.getElementById('checkoutBtn');

        function openCart() {
            if (!cartPanel || !cartOverlay) return;
            cartPanel.classList.add('active');
            cartOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeCartPanel() {
            if (!cartPanel || !cartOverlay) return;
            cartPanel.classList.remove('active');
            cartOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (cartWidget) {
            cartWidget.addEventListener('click', function (e) {
                e.preventDefault();
                openCart();
            });
        }

        closeCart?.addEventListener('click', closeCartPanel);
        cartOverlay?.addEventListener('click', closeCartPanel);

        window.updateCart = function () {
            if (!cartBadge || !cartItems) return;

            const totalItems = cart.reduce((s, i) => s + i.qty, 0);
            const totalPrice = cart.reduce((s, i) => s + i.qty * i.price, 0);

            cartBadge.textContent = totalItems;
            cartTotal.textContent = `₹${totalPrice.toFixed(2)}`;
            totalAmount.textContent = `₹${totalPrice.toFixed(2)}`;

            if (!cart.length) {
                cartItems.innerHTML = `<p class="text-center">Your cart is empty</p>`;
                checkoutBtn && (checkoutBtn.disabled = true);
            } else {
                cartItems.innerHTML = cart.map(item => `
                    <div class="cart-item">
                        <strong>${item.name}</strong>
                        <span>₹${item.price}</span>
                    </div>
                `).join('');
                checkoutBtn && (checkoutBtn.disabled = false);
            }
        };

        checkoutBtn?.addEventListener('click', () => {
            alert("Proceeding to checkout");
        });

        /* ================== MOBILE MENU ================== */
        const mobileNav = document.getElementById('wb-mobile-nav');
        const menuBtn   = document.getElementById('menuBtn');
        const closeBtn  = document.getElementById('closeBtn');
        const overlay   = document.getElementById('overlay');

        function openNav() {
            if (!mobileNav) return;
            mobileNav.classList.add('active');
            document.body.classList.add('menu-open');
        }

        function closeNav() {
            if (!mobileNav) return;
            mobileNav.classList.remove('active');
            document.body.classList.remove('menu-open');
        }

        menuBtn?.addEventListener('click', openNav);
        closeBtn?.addEventListener('click', closeNav);
        overlay?.addEventListener('click', closeNav);

        /* ================== ACCORDION ================== */
        document.querySelectorAll('.wb-accordion-toggle').forEach(btn => {
            btn.addEventListener('click', function () {
                const panel = this.nextElementSibling;
                if (!panel) return;

                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
                panel.classList.toggle('active');
            });
        });

        /* ================== DROPDOWNS ================== */
        const dropdowns = document.querySelectorAll('.wb-dropdown');

        document.addEventListener('click', () => {
            dropdowns.forEach(d => d.classList.remove('active'));
        });

        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', e => e.stopPropagation());
        });

    });
    </script>

    {{-- Page-specific JS --}}
    @stack('scripts')

</body>
</html>
