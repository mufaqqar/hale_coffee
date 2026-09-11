<section class="">

    <?php if ( have_rows('product_options', get_the_ID()) ) : ?>
    <?php while ( have_rows('product_options', get_the_ID()) ) : the_row(); ?>
    <div class="hale_container flex md:flex-row flex-col gap-5 border-b border-gray-300 py-16">
        <?php
      // group field (sub field) inside the repeater row
      $group = get_sub_field('group_type'); // returns array of fields inside the group
      $type_id  = $group['type'] ?? null;      // taxonomy field
      $related_posts  = $group['products_options'] ?? []; // relationship field

      $term = get_term($type_id, 'options_types');

  
   


    ?>
        <div class="md:w-1/5 w-full px-5">
            <h3 class="text-2xl font-bold text-title_Clr">
                <?php     echo $term->name; ?>
            </h3>
        </div>

        <div class="md:w-4/5 w-full grid md:grid-cols-4 grid-cols-1 gap-5">

            <?php
                    if ($related_posts) :
                    foreach ($related_posts as $post) :
                        setup_postdata($post);
                        $code = get_field('option_code', $post->ID); 
                        ?>

            <div
                class="materialBox shadow-[0_0_2px_0_rgba(23,43,77,0.4)] hover:shadow-lg transition-all ease-in-out duration-300">


                <?php if (has_post_thumbnail()) : ?>
                <div class="w-full">
                    <?php the_post_thumbnail('full'); ?>
                </div>
                <?php endif; ?>
                <div class="px-5 py-6 text-center">
                    <p class="text-base font-semibold text-title_Clr/80 mb-2">
                        <?php echo esc_html($code); ?>
                    </p>
                    <h3 class="text-lg leading-none font-semibold text-title_Clr">
                        <h3><?php the_title(); ?></h3>
                    </h3>
                </div>
            </div>

            <?php
                                endforeach;
                                wp_reset_postdata();
                            endif; 

                    ?>
        </div>





    </div>
    <?php endwhile; ?>
    <?php endif; ?>






</section>