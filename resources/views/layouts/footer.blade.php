<!-- Footer -->
<footer class="footer-main">
    <!-- Wave Decoration -->
    <div class="footer-wave">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                class="shape-fill"></path>
        </svg>
    </div>

    <div class="container">
        <div class="footer-content">
            <div class="footer-grid">

                <!-- About -->
                <div class="footer-section">
                    <h3 class="section-title text-white">About Company</h3>
                    <p class="about-text">
                        At SPLECA, sustainability and longevity are at the core of our mission.
                    </p>
                    <div class="social-media">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Contact -->
                <div class="footer-section">
                    <h3 class="section-title text-white">Contact Us</h3>

                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>23/2 Edison Rise Wangara WA 6065</span>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-mobile-alt"></i>
                        <a class="text-white" href="tel:+61450381706">(+61) 450 381 706</a>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <a class="text-white" href="mailto:info@spleca.com.au">info@spleca.com.au</a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-section">
                    <h3 class="section-title text-white">Quick Links</h3>
                    <nav class="quick-links">
                        <a class="text-white" href="#"><i class="fas fa-chevron-right"></i> Home</a>
                        <a class="text-white" href="#"><i class="fas fa-chevron-right"></i> About Us</a>
                        <a class="text-white" href="#"><i class="fas fa-chevron-right"></i> Enquiry</a>
                        <a class="text-white" href="#"><i class="fas fa-chevron-right"></i> Contact</a>
                        <a class="text-white" href="#"><i class="fas fa-chevron-right"></i> Buy Now</a>
                    </nav>
                </div>

                <!-- Map -->
                <div class="footer-section">
                    <h3 class="section-title text-white">Location</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3223.2991476393354!2d115.81653428183868!3d-31.795370007280194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32ad8e16582227%3A0x43717fa7a2247903!2sSPLECA%20Solutions%20Pty%20Ltd!5e1!3m2!1sen!2sin!4v1767336136675!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>2025 © All Rights Reserved. Designed by
                <a href="https://webbitech.com" target="_blank">Webbitech.com</a>
            </p>
        </div>
    </div>
</footer>

{{-- ================= JS ================= --}}

<!-- Swiper (ONLY ONE VERSION) -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Global Site JS -->
<script src="{{ asset('asset/js/script.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const hamburger = document.querySelector(".hamburger");
        const mobileMenu = document.querySelector(".mobile-menu");

        if (hamburger && mobileMenu) {
            hamburger.addEventListener("click", () => {
                hamburger.classList.toggle("active");
                mobileMenu.classList.toggle("active");
                document.body.classList.toggle("no-scroll");
            });
        }
    });
    $(document).on('click', '.add-to-cart', function(e) {
        e.preventDefault();

        let productId = $(this).data('id');

        $.ajax({
            url: "{{ route('cart.add') }}",
            type: "POST",
            data: {
                product_id: productId,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Added to Cart',
                    text: 'Product added to cart successfully!',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
            error: function(xhr) {
                if (xhr.status === 401) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Login Required',
                        text: 'Please login to continue shopping.',
                        showCancelButton: true,
                        confirmButtonText: 'Login',
                        cancelButtonText: 'Close',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // ✅ Go to login page
                            window.location.href = "{{ route('login') }}";
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Unable to add product to cart!',
                    });
                }
            }
        });
    });
</script>
