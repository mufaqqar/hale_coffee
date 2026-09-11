<?php if( have_rows('faqs_sections') ): ?>
<section class="bg-[#F5F5F5] py-20 mt-28" id="faqs-section">
    <div class="hale_container gap-6">
        <!-- FAQs -->
        <div id="faqs" class="pt-8">
            <h2 class="h2">
                Frequently Asked <span class="text-[#47AFC3]">Questions</span>
            </h2>
            <div class="mt-10 grid gap-1 grid-cols-2">
                <?php while( have_rows('faqs_sections') ): the_row(); 
                    $question = get_sub_field('title');       // your repeater field for question
                    $answer = get_sub_field('description');   // your repeater field for answer
                ?>
                    <div>
                        <div class="faq-item">
                            <h3 class="faq-title">
                                <?php echo esc_html($question); ?>
                                <span class="text-2xl"><i class="fa fa-chevron-down"></i></span>
                            </h3>
                            <div class="faq-content max-h-0 overflow-hidden transition-all duration-200">
                                <p class="">
                                    <?php echo wp_kses_post($answer); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function ($) {
        // FAQ toggle
        $('.faq-title').click(function () {
            var parent = $(this).closest('.faq-item');
            var content = parent.find('.faq-content');

            // Close other FAQs
            $('.faq-item').not(parent).find('.faq-content').removeClass('max-h-[300px]').addClass('max-h-0');

            // Toggle current FAQ
            if (content.hasClass('max-h-0')) {
                content.removeClass('max-h-0').addClass('max-h-[300px]');
            } else {
                content.removeClass('max-h-[300px]').addClass('max-h-0');
            }
        });
    });
</script>
<?php else: ?>

<?php endif; ?>
