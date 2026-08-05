</div>

<footer class="pt-14 bg-coff_black text-primary">

    <!-- Footer Links -->
    <div
        class="container mx-auto px-4 grid lg:grid-cols-5 md:grid-cols-2 grid-cols-1 gap-8 pb-10 border-b border-white/10">

        <!-- Company -->
        <div>
            <h6 class="footer_title">
                Company
                <span></span>
            </h6>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'company',
                'container' => false,
                'menu_class' => 'flex flex-col gap-3',
                'fallback_cb' => false,
            ));
            ?>
        </div>

        <!-- Innovation -->
        <div>
            <h6 class="footer_title">
                Innovation
                <span></span>
            </h6>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'innovation',
                'container' => false,
                'menu_class' => 'flex flex-col gap-3',
                'fallback_cb' => false,
            ));
            ?>
        </div>

        <!-- Packaging -->
        <div>
            <h6 class="footer_title">
                Packaging Products
                <span></span>
            </h6>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'packaging',
                'container' => false,
                'menu_class' => 'flex flex-col gap-3',
                'fallback_cb' => false,
            ));
            ?>
        </div>

        <!-- Services -->
        <div>
            <h6 class="footer_title">
                Services
                <span></span>
            </h6>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'services',
                'container' => false,
                'menu_class' => 'flex flex-col gap-3',
                'fallback_cb' => false,
            ));
            ?>
        </div>

        <!-- Contact -->
        <div>

            <h6 class="footer_title">
                Connect With Us
                <span></span>
            </h6>

            <ul class="flex flex-col gap-3 text-[#D8D3CB]">

                <li>
                    Unit 229, 32A Birmingham Road,
                    Bromsgrove B61 0DD
                </li>

                <li>
                    <a href="tel:+4401213186768" class="footer_link">
                        +44 01213186768
                    </a>
                </li>

                <li>
                    <a href="mailto:sales@halepathpackaging.co.uk" class="footer_link">
                        sales@halepathpackaging.co.uk
                    </a>
                </li>

            </ul>

        </div>

    </div>

    <!-- Reviews -->
    <div class="container mx-auto px-4 flex lg:flex-row flex-col justify-between gap-10 py-10 border-b border-white/10">

        <div>

            <h6 class="text-lg font-semibold text-primary mb-6">
                Where We're Trusted
            </h6>

            <div class="flex flex-wrap gap-5 items-center">

                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/google-reviws.png"
                    alt="Google Reviews">

                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trustpilot.png" alt="Trustpilot">

                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bbb.png" alt="BBB">

                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/reviews-io.png" alt="Reviews.io">

            </div>

        </div>

        <div>

            <h6 class="text-lg font-semibold text-primary mb-6">
                Our Logistics Partners
            </h6>

            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fedex.png" alt="FedEx">

        </div>

    </div>

    <!-- Bottom Footer -->
    <div class="container mx-auto px-4 flex lg:flex-row flex-col justify-between items-center gap-8 py-8">

        <div class="flex items-center gap-6 flex-wrap">

            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo" width="80">
            </a>

            <ul class="flex items-center gap-4">

                <li>
                    <a href="https://www.facebook.com/profile.php?id=61586916928562" target="_blank"
                        class="text-primary hover:text-secondary transition text-xl">

                        <i class="fab fa-facebook-f"></i>

                    </a>
                </li>

                <li>

                    <a href="https://www.instagram.com/halepathpackaging.uk?igsh=MW1tY3pyczV2emdzNw%3D%3D"
                        target="_blank" class="text-primary hover:text-secondary transition text-xl">

                        <i class="fab fa-instagram"></i>

                    </a>

                </li>

                <li>

                    <a href="https://www.tiktok.com/@halepathpackaging?_r=1&_t=ZS-957Rlv6JhMV" target="_blank"
                        class="text-primary hover:text-secondary transition text-xl">

                        <i class="fab fa-tiktok"></i>

                    </a>

                </li>

                <li>

                    <a href="#" class="text-primary hover:text-secondary transition text-xl">

                        <i class="fab fa-whatsapp"></i>

                    </a>

                </li>

            </ul>

        </div>

        <div class="text-[#B8B2AA] lg:text-right text-center text-sm leading-7">

            <p>
                © <?php echo date('Y'); ?> Hale Path Packaging. All Rights Reserved.
            </p>

            <p>

                <a href="<?php echo site_url('/privacy-policy'); ?>" class="hover:text-secondary transition">

                    Privacy Policy

                </a>

                |

                <a href="<?php echo site_url('/terms-conditions'); ?>" class="hover:text-secondary transition">

                    Terms & Conditions

                </a>

            </p>

        </div>

    </div>

    <!-- Scroll Top -->

    <button id="scrollToTopBtn"
        class="fixed bottom-6 right-6 bg-secondary hover:bg-primary text-white p-3 rounded-full shadow-xl hidden transition-all duration-300">

        <i class="fa-solid fa-arrow-up"></i>

    </button>

</footer>
</div>

<?php wp_footer(); ?>
</body>

</html>