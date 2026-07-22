<?php get_header(); ?>

<main id="primary" class="content-area">
    <div class="text-center py-16">
        <h1 class="text-5xl font-bold text-amber-900 mb-4"><?php bloginfo('name'); ?></h1>
        <p class="text-xl text-gray-600"><?php bloginfo('description'); ?></p>
    </div>

    <?php if (have_posts()) : ?>
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', get_post_type()); ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
