<?php
defined('ABSPATH') || exit;

$instagram_url = '#';
?>

<section class="py-14">
    <div class="hale_container text-center">
        <span class="text-secondary font-semibold text-base uppercase tracking-wider">Follow Us</span>
        <h2 class="md:text-4xl text-2xl font-bold text-coff_black capitalize mt-1 mb-8">
            Stay Connected on Instagram
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
            <?php for ($i = 1; $i <= 6; $i++) : ?>
                <a href="<?php echo esc_url($instagram_url); ?>"
                   target="_blank" rel="noopener noreferrer"
                   class="block rounded-lg overflow-hidden group relative aspect-square">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cate/<?php echo ($i % 3) + 1; ?>.jpg"
                         alt="Instagram Post <?php echo $i; ?>"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-300" />
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                        <i class="fab fa-instagram text-white text-2xl"></i>
                    </div>
                </a>
            <?php endfor; ?>
        </div>

        <a href="<?php echo esc_url($instagram_url); ?>"
           target="_blank" rel="noopener noreferrer"
           class="inline-block mt-8 py-3 px-8 border-2 border-secondary text-secondary font-semibold rounded-lg hover:bg-secondary hover:text-white transition">
            <i class="fab fa-instagram mr-2"></i> Follow @halecoffee
        </a>
    </div>
</section>
