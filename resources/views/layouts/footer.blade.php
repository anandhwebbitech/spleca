<!-- Footer -->
<footer class="footer-main">
    <!-- Wave Decoration -->
    <div class="footer-wave">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
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
                        <a href="tel:+61450381706">(+61) 450 381 706</a>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:info@spleca.com.au">info@spleca.com.au</a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-section">
                    <h3 class="section-title text-white">Quick Links</h3>
                    <nav class="quick-links">
                        <a href="#"><i class="fas fa-chevron-right"></i> Home</a>
                        <a href="#"><i class="fas fa-chevron-right"></i> About Us</a>
                        <a href="#"><i class="fas fa-chevron-right"></i> Enquiry</a>
                        <a href="#"><i class="fas fa-chevron-right"></i> Contact</a>
                        <a href="#"><i class="fas fa-chevron-right"></i> Buy Now</a>
                    </nav>
                </div>

                <!-- Map -->
                <div class="footer-section">
                    <h3 class="section-title text-white">Location</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7483.6119019460775!2d115.81924033469049!3d-31.7946317153556"
                        width="100%" height="250" style="border:0;" loading="lazy">
                    </iframe>
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
</script>
