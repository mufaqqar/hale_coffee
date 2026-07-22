<div class="bg-[#d0ba9050]">
    <div
        class="container mx-auto px-4 py-1.5 flex md:flex-row flex-row-reverse md:gap-5 gap-5 items-center justify-between">
        <div class="site-branding md:block hidden">
            <?php if (has_custom_logo()): ?>
                <?php the_custom_logo(); ?>
            <?php else: ?>
                <h1 class="text-2xl font-bold">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="text-coff_black no-underline">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
            <?php endif; ?>
        </div>
        <div class="md:w-1/2">
            <form class="flex items-center gap-5 bg-white border border-gray-100 w-full md:px-5 md:py-2 px-3 py-1.5">
                <input placeholder="What can we help you find?" class="w-full outline-none text-lg" />
                <button>
                    <i class="fa-solid fa-search"></i>
                </button>
            </form>
        </div>
        <div>
            <ul class="flex items-center gap-3">
                <li>
                    <a href="#" class="text-coff_black hover:text-secondary text-lg">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-coff_black hover:text-secondary text-lg">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>