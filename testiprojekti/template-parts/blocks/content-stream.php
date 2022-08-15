<section class="pt-6 pb-6">
    <div class="grid grid-cols-12 pt-12 pb-6">
        <div class="col-start-2 -ml-4 ">
            <hr class="border-t-2 rounded-full border-primary-500 mt-8 mr-4">
        </div>
        <header class="col-start-3 col-span-9 font-sora">
            <p class="text-3xl text-white text-slate mb-2 mt-4"><?php echo get_field('stream-title')?></p>
        </header>
    </div>

    <!-- SWIPER OFFICE STREAM // NEEDS FIX -->
    <div class="ml-20 md:ml-36 lg:ml-screen/5">
        <div class="streamSwiper h-92 lg:h-72 ">
            <div class="swiper-wrapper">
                <?php 
            $streamPosts = new WP_Query(array(
                'posts_per_page' => 4,
                'post_type' => 'office-stream'
            ));
            while($streamPosts->have_posts()){
            $streamPosts->the_post(); ?>

                <div class=" swiper-slide w-52 ">
                    <a href="<?php the_permalink();?>">
                        <img class="object-cover w-full h-40 pb-2"
                            src="<?php the_field('stream-image', get_the_ID())['url']?>" alt="">
                        <p class="pb-4"><?php the_title();?><img class="w-6 inline-block ml-2"
                                src="<?php echo get_field('arrow')?>" alt=""></p>
                    </a>
                    <hr class="border-b border-accent-700">
                </div>

                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
    /* TODO use swiper method to snap on grid?? */
    const streamSwiper = new Swiper(".streamSwiper", {
        slidesPerView: 1.5,
        spaceBetween: 20,
        autoplay: {
            delay: 4000,
        },
        breakpoints: {
            768: {
                slidesPerView: 2.1,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 2.2,
                spaceBetween: 40,
            }
        }
    });
    const newsSwiper = new Swiper(".newsSwiper", {
        slidesPerView: 1.5,
        spaceBetween: 20,
        autoplay: {
            delay: 4000,
        },
        breakpoints: {
            768: {
                slidesPerView: 2.5,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 3.5,
                spaceBetween: 40,
            }
        }
    });
    </script>

</section>