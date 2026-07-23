<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class('antialiased'); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="min-h-screen flex flex-col">
        <?php get_template_part('template-parts/header/topbar'); ?>
        <header id="masthead" class="bg-secondary text-white relative">
            <div class="container mx-auto px-4 py-4 flex items-center justify-between">
                <div class="site-branding md:hidden inline-flex">
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
                <button class="menu-toggle md:hidden text-white text-2xl p-2" aria-label="Toggle menu" aria-expanded="false">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <nav id="site-navigation" class="primary-navigation md:block hidden w-full mx-auto">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class' => 'flex justify-center space-x-6 list-none m-0 p-0',
                        'container' => false,
                        'fallback_cb' => false,
                        'walker' => new Hale_Mega_Walker(),
                    ]);
                    ?>
                </nav>
            </div>
        </header>

        <div id="content" class="">