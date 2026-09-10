<?php
defined('ABSPATH') || exit;

global $product;

if (empty($product)) {
    return;
}

$product_id    = $product->get_id();
$product_title = $product->get_name();
$permalink     = get_permalink($product->get_id());
$cat_ids       = $product->get_category_ids();
$cat_name      = !empty($cat_ids) ? get_the_title($cat_ids[0]) : '';
?>

<div class="product-form bg-gray-50 rounded-2xl p-6 mt-6">
    <h3 class="text-xl font-bold text-coff_black mb-2">
        <?php echo esc_html($product_title); ?>
    </h3>

    <?php if (!empty($cat_name)) : ?>
        <p class="text-sm text-gray-500 mb-4">
            Category: <span class="font-medium text-coff_black"><?php echo esc_html($cat_name); ?></span>
        </p>
    <?php endif; ?>

    <?php if ($product->get_short_description()) : ?>
        <div class="text-gray-600 text-sm mb-4">
            <?php echo wpautop($product->get_short_description()); ?>
        </div>
    <?php endif; ?>

    <div class="mb-4">
        <?php
        if ($product->is_on_sale()) {
            echo '<span class="text-2xl font-bold text-secondary">' . wc_price($product->get_sale_price()) . '</span>';
            if ($product->get_regular_price()) {
                echo '<span class="text-base text-gray-400 line-through ml-2">' . wc_price($product->get_regular_price()) . '</span>';
            }
        } elseif ($product->get_price()) {
            echo '<span class="text-2xl font-bold text-coff_black">' . wc_price($product->get_price()) . '</span>';
        }
        ?>
    </div>

    <form class="space-y-4" method="post" action="">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="quote_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" id="quote_name" name="quote_name" required
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none" />
            </div>
            <div>
                <label for="quote_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="quote_email" name="quote_email" required
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none" />
            </div>
        </div>

        <div>
            <label for="quote_qty" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
            <input type="number" id="quote_qty" name="quote_qty" min="1" value="1"
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none" />
        </div>

        <div>
            <label for="quote_message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
            <textarea id="quote_message" name="quote_message" rows="4"
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none"
                      placeholder="Tell us about your requirements..."></textarea>
        </div>

        <input type="hidden" name="product_id" value="<?php echo esc_attr($product_id); ?>" />
        <input type="hidden" name="product_name" value="<?php echo esc_attr($product_title); ?>" />

        <button type="submit" name="submit_quote"
                class="w-full py-3 bg-[#1C2E42] text-white font-semibold rounded-lg hover:bg-[#2a4260] transition">
            Get Custom Quote
        </button>
    </form>

    <div class="mt-4 text-center">
        <a href="<?php echo esc_url($permalink); ?>"
           class="text-secondary text-sm font-medium hover:underline">
            View Full Product Details &rarr;
        </a>
    </div>
</div>
