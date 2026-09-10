<?php
defined('ABSPATH') || exit;

$cat_faqs = isset($args['cat_faqs']) ? $args['cat_faqs'] : array();

if (empty($cat_faqs) || !is_array($cat_faqs)) {
    return;
}
?>

<section class="py-14">
    <div class="hale_container max-w-3xl">
        <h2 class="text-3xl font-bold text-coff_black text-center mb-8">
            Frequently Asked Questions
        </h2>

        <div class="space-y-4">
            <?php foreach ($cat_faqs as $index => $faq) :
                $question = is_array($faq) && isset($faq['question']) ? $faq['question'] : (isset($faq['faq_question']) ? $faq['faq_question'] : '');
                $answer   = is_array($faq) && isset($faq['answer']) ? $faq['answer'] : (isset($faq['faq_answer']) ? $faq['faq_answer'] : '');

                if (empty($question)) {
                    continue;
                }
            ?>
                <div class="faq-item border border-gray-200 rounded-lg overflow-hidden">
                    <button type="button"
                            class="faq-toggle w-full flex items-center justify-between p-5 text-left bg-white hover:bg-gray-50 transition"
                            onclick="this.parentElement.classList.toggle('open'); this.nextElementSibling.classList.toggle('hidden');">
                        <span class="font-semibold text-coff_black pr-4">
                            <?php echo esc_html($question); ?>
                        </span>
                        <i class="fas fa-chevron-down text-gray-400 flex-shrink-0 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden px-5 pb-5 text-gray-600 leading-relaxed border-t border-gray-100">
                        <?php echo wpautop($answer); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.faq-toggle').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var icon = this.querySelector('.fa-chevron-down');
            if (icon) {
                icon.classList.toggle('rotate-180');
            }
        });
    });
});
</script>
