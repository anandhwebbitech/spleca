    <!-- Footer -->
    <footer class="footer-main">
        <!-- Wave Decoration -->
        <div class="footer-wave">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>

        <div class="container">
            <div class="footer-content">
                <div class="footer-grid">
                    <!-- About Company -->
                    <div class="footer-section">
                        <h3 class="section-title text-white">About Company</h3>
                        <p class="about-text">
                            At SPLECA, sustainability and longevity are at the core of our mission. Our solutions are thoughtfully designed to promote environmental responsibility by helping industries reduce waste, improve efficiency, and adopt sustainable practices.
                        </p>
                        <div class="social-media">
                            <a href="#" class="social-link" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Contact Us -->
                    <div class="footer-section">
                        <h3 class="section-title text-white">Contact Us</h3>
                        <div class="contact-list">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info">
                                    23/2 Edison Rise Wangara WA 6065
                                </div>
                            </div>

                            <!-- <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="contact-info">
                                    <a href="tel:+918041171145">+91-80-41171145</a> /
                                    <a href="tel:64506442">64506442</a>
                                </div>
                            </div> -->

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div class="contact-info">
                                    <a href="tel:9880282775">(+61) 450 381 706</a>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-info">
                                    <a href="mailto:info@spleca.com.au">info@spleca.com.au</a><br>
                                    <!-- <a href="mailto:info@leca.in">info@leca.in</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="footer-section">
                        <h3 class="section-title text-white">Quick Links</h3>
                        <nav class="quick-links">
                            <a href="#" class="quick-link">
                                <i class="fas fa-chevron-right"></i>
                                <span>Home</span>
                            </a>
                            <a href="#" class="quick-link">
                                <i class="fas fa-chevron-right"></i>
                                <span>About us</span>
                            </a>
                            <a href="#" class="quick-link">
                                <i class="fas fa-chevron-right"></i>
                                <span>Enquiry</span>
                            </a>
                            <a href="#" class="quick-link">
                                <i class="fas fa-chevron-right"></i>
                                <span>Contact Us</span>
                            </a>
                            <a href="#" class="quick-link">
                                <i class="fas fa-chevron-right"></i>
                                <span>Buy Now</span>
                            </a>
                        </nav>
                    </div>

                    <!-- Location -->
                    <div class="footer-section">
                        <h3 class="section-title text-white">Location</h3>
                        <div class="map-wrapper">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7483.6119019460775!2d115.81924033469049!3d-31.7946317153556!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32ad8e16582227%3A0x43717fa7a2247903!2sSPLECA%20Solutions%20Pty%20Ltd!5e0!3m2!1sen!2sin!4v1763191140865!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <p class="footer-bottom-text">
                    2025 © All Rights Reserved. Designed by <a href="https://webbitech.com" target="_blank">Webbitech.com</a>
                </p>
            </div>
        </div>
    </footer>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const hamburger = document.querySelector(".hamburger");
            const mobileMenu = document.querySelector(".mobile-menu");

            if (!hamburger || !mobileMenu) {
                console.error("Hamburger or Mobile Menu element NOT found.");
                return;
            }

            hamburger.addEventListener("click", () => {
                mobileMenu.classList.toggle("active");
                hamburger.classList.toggle("active");
                document.body.classList.toggle("no-scroll");
            });
        });

        // Optional: Prevent background scroll when menu is open
        const style = document.createElement("style");
        style.innerHTML = `
  .no-scroll {
    overflow: hidden;
  }
`;
        document.head.appendChild(style);
    </script>
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
    <script src="{{ asset('asset/js/script.js') }}"></script>
