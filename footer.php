    </div>

    <footer id="colophon" class="bg-amber-900 text-white mt-auto">
        <div class="container mx-auto px-4 py-6 text-center">
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'menu_class'     => 'flex justify-center space-x-4 list-none m-0 p-0 mb-2',
                'container'      => false,
                'fallback_cb'    => false,
                'depth'          => 1,
            ]);
            ?>
            <p class="text-sm text-amber-200">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
            </p>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
