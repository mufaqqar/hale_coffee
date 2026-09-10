<?php
defined('ABSPATH') || exit;

global $product;

if (empty($product)) {
    return;
}

$product_id     = $product->get_id();
$product_title  = $product->get_name();
$description    = $product->get_description();
$short_desc     = $product->get_short_description();
$sku            = $product->get_sku();
$weight         = $product->get_weight();
$dimensions     = $product->get_dimensions(false);
$cat_ids        = $product->get_category_ids();
$tag_ids        = $product->get_tag_ids();
$attributes     = $product->get_attributes();
$average_rating = $product->get_average_rating();
$review_count   = $product->get_review_count();
$stock_status   = $product->get_stock_status();
$price_html     = $product->get_price_html();
?>

<section class="py-14">
    <div class="hale_container">
        <div class="grid md:grid-cols-2 gap-10">
            <!-- Product Details -->
            <div>
                <h2 class="text-3xl font-bold text-coff_black mb-4"><?php echo esc_html($product_title); ?></h2>

                <?php if ($average_rating > 0) : ?>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="flex text-yellow-400">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <?php if ($i <= floor($average_rating)) : ?>
                                    <i class="fas fa-star"></i>
                                <?php elseif ($i - $average_rating < 1) : ?>
                                    <i class="fas fa-star-half-alt"></i>
                                <?php else : ?>
                                    <i class="far fa-star"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                        <span class="text-sm text-gray-500">(<?php echo esc_html($review_count); ?> reviews)</span>
                    </div>
                <?php endif; ?>

                <?php if ($price_html) : ?>
                    <div class="text-2xl font-bold text-secondary mb-4"><?php echo $price_html; ?></div>
                <?php endif; ?>

                <?php if ($short_desc) : ?>
                    <div class="text-gray-600 mb-6"><?php echo wpautop($short_desc); ?></div>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="text-gray-600 mb-6"><?php echo wpautop($description); ?></div>
                <?php endif; ?>
            </div>

            <!-- Product Meta -->
            <div class="bg-gray-50 rounded-2xl p-6">
                <h3 class="text-xl font-bold text-coff_black mb-4">Product Information</h3>

                <table class="w-full text-sm">
                    <tbody>
                        <?php if ($sku) : ?>
                            <tr class="border-b border-gray-200">
                                <td class="py-2.5 font-medium text-gray-700">SKU</td>
                                <td class="py-2.5 text-gray-600"><?php echo esc_html($sku); ?></td>
                            </tr>
                        <?php endif; ?>

                        <?php if ($weight) : ?>
                            <tr class="border-b border-gray-200">
                                <td class="py-2.5 font-medium text-gray-700">Weight</td>
                                <td class="py-2.5 text-gray-600"><?php echo esc_html($weight); ?> <?php echo get_option('woocommerce_weight_unit'); ?></td>
                            </tr>
                        <?php endif; ?>

                        <?php if ($dimensions) : ?>
                            <tr class="border-b border-gray-200">
                                <td class="py-2.5 font-medium text-gray-700">Dimensions</td>
                                <td class="py-2.5 text-gray-600"><?php echo esc_html($dimensions); ?></td>
                            </tr>
                        <?php endif; ?>

                        <tr class="border-b border-gray-200">
                            <td class="py-2.5 font-medium text-gray-700">Availability</td>
                            <td class="py-2.5">
                                <?php if ($stock_status === 'instock') : ?>
                                    <span class="text-green-600 font-medium">In Stock</span>
                                <?php elseif ($stock_status === 'outofstock') : ?>
                                    <span class="text-red-500 font-medium">Out of Stock</span>
                                <?php else : ?>
                                    <span class="text-yellow-500 font-medium">On Backorder</span>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <?php if (!empty($cat_ids)) : ?>
                            <tr class="border-b border-gray-200">
                                <td class="py-2.5 font-medium text-gray-700">Category</td>
                                <td class="py-2.5 text-gray-600">
                                    <?php foreach ($cat_ids as $index => $cat_id) :
                                        $cat_name = get_the_title($cat_id);
                                        $cat_link = get_permalink($cat_id);
                                        if ($index > 0) echo ', ';
                                    ?>
                                        <a href="<?php echo esc_url($cat_link); ?>" class="hover:text-secondary transition">
                                            <?php echo esc_html($cat_name); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php if (!empty($tag_ids)) : ?>
                            <tr class="border-b border-gray-200">
                                <td class="py-2.5 font-medium text-gray-700">Tags</td>
                                <td class="py-2.5 text-gray-600">
                                    <?php foreach ($tag_ids as $index => $tag_id) :
                                        $tag_name = get_the_title($tag_id);
                                        if ($index > 0) echo ', ';
                                    ?>
                                        <?php echo esc_html($tag_name); ?>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php if (!empty($attributes)) : ?>
                            <?php foreach ($attributes as $attribute) :
                                $name = wc_attribute_label($attribute->get_name());
                                if ($attribute->is_taxonomy()) {
                                    $terms = wp_get_post_terms($product_id, $attribute->get_name(), 'fields=names');
                                    $value = implode(', ', $terms);
                                } else {
                                    $value = $attribute->get_options();
                                    $value = is_array($value) ? implode(', ', $value) : $value;
                                }
                            ?>
                                <tr class="border-b border-gray-200">
                                    <td class="py-2.5 font-medium text-gray-700"><?php echo esc_html($name); ?></td>
                                    <td class="py-2.5 text-gray-600"><?php echo esc_html($value); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="mt-6 flex gap-3">
                    <a href="/get-quote-now"
                       class="flex-1 py-3 bg-[#1C2E42] text-white font-semibold rounded-lg text-center hover:bg-[#2a4260] transition">
                        Get Custom Quote
                    </a>
                    <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"
                       class="flex-1 py-3 border-2 border-[#1C2E42] text-[#1C2E42] font-semibold rounded-lg text-center hover:bg-[#1C2E42] hover:text-white transition">
                        Back to Shop
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
