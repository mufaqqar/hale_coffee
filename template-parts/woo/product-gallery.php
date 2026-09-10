<?php
defined('ABSPATH') || exit;

global $product;

if (empty($product)) {
    return;
}

$main_image_id = $product->get_image_id();
$gallery_ids   = $product->get_gallery_image_ids();
$all_images    = array_merge([$main_image_id], $gallery_ids);
$all_images    = array_filter($all_images);
?>

<div class="product-gallery">
    <!-- Main Image -->
    <div class="main-image mb-4 rounded-2xl overflow-hidden">
        <?php if ($main_image_id) : ?>
            <img id="main-product-image"
                 src="<?php echo esc_url(wp_get_attachment_image_url($main_image_id, 'woocommerce_single')); ?>"
                 alt="<?php echo esc_attr($product->get_name()); ?>"
                 class="w-full h-auto rounded-2xl cursor-zoom-in"
                 data-zoom-image="<?php echo esc_url(wp_get_attachment_image_url($main_image_id, 'full')); ?>" />
        <?php else : ?>
            <img src="<?php echo wc_placeholder_img_src('woocommerce_single'); ?>"
                 alt="<?php echo esc_attr($product->get_name()); ?>"
                 class="w-full h-auto rounded-2xl" />
        <?php endif; ?>
    </div>

    <!-- Thumbnails -->
    <?php if (count($all_images) > 1) : ?>
        <div class="product-thumbnails flex gap-3 overflow-x-auto pb-2">
            <?php foreach ($all_images as $index => $image_id) :
                $thumb_url = wp_get_attachment_image_url($image_id, 'woocommerce_thumbnail');
                $full_url  = wp_get_attachment_image_url($image_id, 'woocommerce_single');
                $zoom_url  = wp_get_attachment_image_url($image_id, 'full');
            ?>
                <button type="button"
                        class="thumb-btn flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 <?php echo $index === 0 ? 'border-secondary' : 'border-transparent'; ?> hover:border-secondary transition"
                        data-image="<?php echo esc_url($full_url); ?>"
                        data-zoom="<?php echo esc_url($zoom_url); ?>">
                    <img src="<?php echo esc_url($thumb_url); ?>"
                         alt="<?php echo esc_attr($product->get_name() . ' - ' . ($index + 1)); ?>"
                         class="w-full h-full object-cover" />
                </button>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var mainImage = document.getElementById('main-product-image');
    var thumbs = document.querySelectorAll('.thumb-btn');

    thumbs.forEach(function(thumb) {
        thumb.addEventListener('click', function() {
            if (mainImage) {
                mainImage.src = this.dataset.image;
                if (this.dataset.zoom) {
                    mainImage.setAttribute('data-zoom-image', this.dataset.zoom);
                }
            }
            thumbs.forEach(function(t) {
                t.classList.remove('border-secondary');
                t.classList.add('border-transparent');
            });
            this.classList.remove('border-transparent');
            this.classList.add('border-secondary');
        });
    });
});
</script>
