<?php
defined('ABSPATH') || exit;

global $product;

if (empty($product) || !$product->is_visible()) {
    return;
}

$permalink  = get_permalink($product->get_id());
$image_id   = $product->get_image_id();
$image_url  = $image_id ? wp_get_attachment_image_url($image_id, 'woocommerce_thumbnail') : wc_placeholder_img_src('woocommerce_thumbnail');
$cat_ids    = $product->get_category_ids();
$cat_name   = !empty($cat_ids) ? get_the_title($cat_ids[0]) : '';
$categories = $product->get_category_ids();
?>

<div class="product-card bg-white rounded-lg overflow-hidden hover:shadow-lg transition group">
    <a href="<?php echo esc_url($permalink); ?>" class="block relative">
        <img src="<?php echo esc_url($image_url); ?>"
             alt="<?php echo esc_attr($product->get_name()); ?>"
             class="w-full aspect-square object-cover rounded-t-lg group-hover:scale-105 transition duration-300" />

        <?php if ($product->is_on_sale()) : ?>
            <span class="absolute top-3 left-3 bg-red-500 text-white text-xs font-semibold px-2.5 py-1 rounded">
                Sale
            </span>
        <?php endif; ?>
    </a>

    <div class="p-4">
        <?php if (!empty($cat_name)) : ?>
            <a href="<?php echo esc_url(get_permalink($cat_ids[0])); ?>"
               class="text-xs text-secondary font-semibold uppercase tracking-wider hover:underline">
                <?php echo esc_html($cat_name); ?>
            </a>
        <?php endif; ?>

        <h3 class="text-base font-semibold text-coff_black mt-1 line-clamp-2">
            <a href="<?php echo esc_url($permalink); ?>" class="hover:text-secondary transition">
                <?php echo esc_html($product->get_name()); ?>
            </a>
        </h3>

        <div class="mt-2">
            <?php if ($product->is_on_sale()) : ?>
                <span class="text-lg font-bold text-secondary">
                    <?php echo wc_price($product->get_sale_price()); ?>
                </span>
                <span class="text-sm text-gray-400 line-through ml-1">
                    <?php echo wc_price($product->get_regular_price()); ?>
                </span>
            <?php else : ?>
                <?php if ($product->get_price()) : ?>
                    <span class="text-lg font-bold text-coff_black">
                        <?php echo wc_price($product->get_price()); ?>
                    </span>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <a href="<?php echo esc_url($permalink); ?>"
           class="mt-3 inline-block w-full text-center py-2 px-4 border-2 border-coff_black text-coff_black text-sm font-semibold rounded-md hover:bg-coff_black hover:text-white transition">
            View Details
        </a>
    </div>
</div>
