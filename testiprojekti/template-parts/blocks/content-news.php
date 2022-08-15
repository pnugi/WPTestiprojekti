<section class="mb-12 pb-6">
    <div class="grid grid-cols-12 pt-12 pb-6">
        <div class="col-start-2 -ml-4 ">
            <hr class="border-t-2 rounded-full border-primary-500 mt-8 mr-4">
        </div>
        <header class="col-start-3 col-span-9 font-sora">
            <p class="text-3xl text-white text-slate mb-2 mt-4"><?php echo get_field('news-title')?></p>
        </header>
    </div>

    <!-- SWIPER OFFICE STREAM // NEEDS FIX on margin left -->
    <div class="ml-20 md:ml-36 lg:ml-screen/5">
        <div class="newsSwiper">
            <div class="swiper-wrapper h-40rem">
                <?php 
            $news = new WP_Query(array(
                'posts_per_page' => 4,
                'post_type' => 'uutiset'
            ));
            while($news->have_posts()){
            $news->the_post(); ?>

                <div class="swiper-slide w-52">
                    <a href="<?php the_permalink();?>">
                        <img class="object-cover w-full h-30rem pb-2"
                            src="<?php the_field('news-image', get_the_ID())['url']?>" alt="">
                        <!--  FIX TITLE ?? -->
                        <h3 class="text-accent-300">
                            <?php the_field('news-title', get_the_ID())?>
                        </h3>

                        <p class="text-xs border-b border-accent-700 pb-4 mt-8">
                            <?php the_field('news-text', get_the_ID())?>
                        </p>
                        <div class="flex justify-end">
                            <img class="w-6" src="<?php echo get_field('arrow')?>" alt="">
                        </div>
                    </a>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>




</section>