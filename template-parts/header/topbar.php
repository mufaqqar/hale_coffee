<div class="bg-primary">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <div class="site-branding">
            <?php if (has_custom_logo()): ?>
                <?php the_custom_logo(); ?>
            <?php else: ?>
                <h1 class="text-2xl font-bold">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="text-white no-underline">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
            <?php endif; ?>
        </div>
        <div>
            <form class="flex items-center gap-5">
                <input placeholder="What can we help you find?" class="bg-white border border-coff_black w-full p-5" />
                <button>
                    <i class="fa-solid fa-phone"></i>
                </button>
            </form>
        </div>
    </div>
</div>