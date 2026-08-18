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
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex">
                            <?php the_custom_logo(); ?>
                        </a>

                    <?php else: ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo"
                                height="60" width="60" />
                        </a>
                    <?php endif; ?>
                </div>
                <button class="menu-toggle md:hidden text-white text-2xl p-2" aria-label="Toggle menu"
                    aria-expanded="false">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <nav id="site-navigation" class="primary-navigation md:block hidden w-full mx-auto">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class' => 'flex justify-center md:space-x-6 list-none m-0 md:p-0 p-3 md:flex-row flex-col',
                        'container' => false,
                        'fallback_cb' => false,
                        'walker' => new Hale_Mega_Walker(),
                    ]);
                    ?>
                </nav>
            </div>
        </header>

        <div id="content" class="">