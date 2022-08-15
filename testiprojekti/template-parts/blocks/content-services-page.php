    <div class="grid grid-cols-12 pt-12 pb-12">
        <!-- Categories looped -->
        <div class="col-start-3 col-end-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <?php
                    if (have_rows('services-list')):
                    while (have_rows('services-list')): the_row();
                ?>
                <div class="">
                    <img class="h-72 w-full object-cover mb-6" src="<?php echo get_sub_field('image')['url']?>" alt="">
                    <h2 class="text-accent-300 font-sora"><?php echo get_sub_field('title') ?></h2>
                    <p class="mt-4 mb-8 text-white"><?php echo get_sub_field('description') ?></p>

                    <!-- Loop over sub repeater rows. -->
                    <ul>
                        <?php
                    if (have_rows('categories')):
                    while (have_rows('categories')): the_row();
                    ?>
                        <li class="text-sm text-white"><?php echo get_sub_field('category') ?></li>
                        <?php
                    endwhile;
                    endif;
                    ?>
                    </ul>

                    <div class="pb-2 mt-8 flex ">
                        <a class="text-white text-xs hover:border-b border-primary-500 py-2"
                            href="<?php get_sub_field('service-link')['url'] ?>"
                            target="<?php echo get_sub_field('service-link')['target'] ?>">Tutustu
                            <?php echo get_sub_field('service-link')['title'] ?> projekteihin <img
                                class="w-4 inline-block ml-2" src="<?php echo get_field('link-arrow')?>" alt="">
                        </a>


                    </div>

                </div>
                <!-- End category loop -->

                <?php
                    endwhile;
                    endif;
                ?>
            </div>
            <hr class="border-b border-gray-600 mt-12">
        </div>
    </div>