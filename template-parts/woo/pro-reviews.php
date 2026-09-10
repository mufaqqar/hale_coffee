<?php
defined('ABSPATH') || exit;

global $product;

if (empty($product)) {
    return;
}

$reviews_enabled = get_option('woocommerce_enable_reviews') === 'yes';

if (!$reviews_enabled) {
    return;
}

$product_id     = $product->get_id();
$average_rating = $product->get_average_rating();
$review_count   = $product->get_review_count();

$reviews = get_comments([
    'post_id' => $product_id,
    'status'  => 'approve',
    'type'    => 'review',
    'number'  => 10,
]);

if (empty($reviews)) {
    return;
}
?>

<section class="py-14 bg-gray-50">
    <div class="hale_container max-w-4xl">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-coff_black">Customer Reviews</h2>
            <div class="flex items-center justify-center gap-2 mt-3">
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
                <span class="text-sm text-gray-500">
                    <?php echo esc_html(number_format($average_rating, 1)); ?> out of 5
                    (<?php echo esc_html($review_count); ?> <?php echo $review_count === 1 ? 'review' : 'reviews'; ?>)
                </span>
            </div>
        </div>

        <div class="space-y-6">
            <?php foreach ($reviews as $review) :
                $rating   = (int) get_comment_meta($review->comment_ID, 'rating', true);
                $author   = $review->comment_author;
                $date     = get_comment_date('M j, Y', $review->comment_ID);
                $content  = $review->comment_content;
            ?>
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center text-secondary font-bold text-sm">
                                <?php echo esc_html(mb_strtoupper(mb_substr($author, 0, 1))); ?>
                            </div>
                            <div>
                                <p class="font-semibold text-coff_black"><?php echo esc_html($author); ?></p>
                                <p class="text-xs text-gray-400"><?php echo esc_html($date); ?></p>
                            </div>
                        </div>
                        <?php if ($rating > 0) : ?>
                            <div class="flex text-yellow-400 text-sm">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <?php if ($i <= $rating) : ?>
                                        <i class="fas fa-star"></i>
                                    <?php else : ?>
                                        <i class="far fa-star"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <p class="text-gray-600 leading-relaxed"><?php echo esc_html($content); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-8">
            <a href="<?php echo esc_url(get_permalink($product_id)); ?>"
               class="text-secondary font-medium hover:underline">
                Write a Review &rarr;
            </a>
        </div>
    </div>
</section>
