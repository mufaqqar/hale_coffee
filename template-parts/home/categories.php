<?php


$categories = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
    'orderby'    => 'id',
    'order'      => 'DESC',
    'number'     => 10,
]);

$categories = array_filter($categories, function ($term) {
    return $term->slug !== 'uncategorized';
});

if (!empty($categories)) :
?>
<section class="py-16">
    <div class="w-full px-4">
        <div class="max-w-7xl mx-auto text-center mb-12">
            <span class="text-secondary font-semibold text-base uppercase tracking-wider">Categories</span>
            <h2 class="md:text-4xl text-2xl font-bold text-coff_black capitalize mt-1">Our Latest Category</h2>
        </div>
        <div class="cate-slider">
            <?php foreach ($categories as $category) :
                $thumb_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                $image    = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'woocommerce_thumbnail') : get_template_directory_uri() . '/assets/images/cate/1.jpg';
                $link     = get_term_link($category);
            ?>
            <div class="px-2">
                <a href="<?php echo esc_url($link); ?>">
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($category->name); ?>"
                        class="w-full rounded-lg aspect-square object-cover" />
                    <span class="text-xl text-center text-coff_black font-semibold block w-full mt-1.5">
                        <?php echo esc_html($category->name); ?>
                    </span>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>