<?php

function hale_coffee_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');
    add_theme_support('custom-logo');

    register_nav_menus([
        'primary' => __('Primary Menu', 'hale-coffee'),
        'footer' => __('Footer Menu', 'hale-coffee'),
    ]);
}
add_action('after_setup_theme', 'hale_coffee_setup');

function hale_coffee_enqueue_assets()
{

    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css',
        [],
        '6.7.2'
    );
    wp_enqueue_style(
        'slick-css',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
        [],
        '1.8.1'
    );

    wp_enqueue_style(
        'slick-theme',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css',
        ['slick-css'],
        '1.8.1'
    );

    wp_enqueue_script(
        'slick-js',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        ['jquery'],
        '1.8.1',
        true
    );
    wp_enqueue_script(
        'hale-main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery', 'slick-js'],
        wp_get_theme()->get('Version'),
        true
    );

    // Theme stylesheet
    wp_enqueue_style(
        'hale-coffee-style',
        get_template_directory_uri() . '/assets/css/style.css',
        ['font-awesome'],
        wp_get_theme()->get('Version')
    );

    // Mega Menu CSS
    wp_enqueue_style(
        'hale-mega-menu',
        get_template_directory_uri() . '/assets/css/mega-menu.css',
        ['hale-coffee-style'],
        wp_get_theme()->get('Version')
    );

    // Navigation JS for mega menu & mobile toggle
    wp_enqueue_script(
        'hale-navigation',
        get_template_directory_uri() . '/assets/js/navigation.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'hale_coffee_enqueue_assets');

/**
 * Mega Menu Support
 */

// Add Mega Menu checkbox to menu items in WP Admin
add_action('wp_nav_menu_item_custom_fields', 'hale_mega_menu_field', 10, 5);
function hale_mega_menu_field($item_id, $item, $depth, $args, $id)
{
    if ($depth > 0) {
        return;
    }
    $checked = get_post_meta($item_id, '_menu_item_mega', true) ? 'checked="checked"' : '';
?>
    <p class="field-mega description description-wide">
        <label for="edit-menu-item-mega-<?php echo $item_id; ?>">
            <input type="checkbox" id="edit-menu-item-mega-<?php echo $item_id; ?>" name="menu-item-mega[<?php echo $item_id; ?>]" value="1" <?php echo $checked; ?> />
            <?php _e('Enable Mega Menu', 'hale-coffee'); ?>
        </label>
    </p>
<?php
}

// Save mega menu checkbox value
add_action('wp_update_nav_menu_item', 'hale_mega_menu_save', 10, 3);
function hale_mega_menu_save($menu_id, $menu_item_db_id, $args)
{
    $value = isset($_POST['menu-item-mega'][$menu_item_db_id]) ? 1 : 0;
    update_post_meta($menu_item_db_id, '_menu_item_mega', $value);
}

// Custom Mega Menu Walker
class Hale_Mega_Walker extends Walker_Nav_Menu
{
    private $current_is_mega = false;

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        if ($depth === 0 && $args->theme_location === 'primary') {
            $this->current_is_mega = (bool) get_post_meta($item->ID, '_menu_item_mega', true);
        }

        parent::start_el($output, $item, $depth, $args, $id);

        if ($depth === 0 && $this->current_is_mega) {
            $output = str_replace('class="menu-item', 'class="menu-item menu-item-mega', $output);
        }
    }

    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $classes = array('sub-menu');
        if ($depth === 0 && $this->current_is_mega && $args->theme_location === 'primary') {
            $classes[] = 'mega-sub-menu';
        }
        $indent  = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"" . esc_attr(implode(' ', $classes)) . "\">\n";
    }
}