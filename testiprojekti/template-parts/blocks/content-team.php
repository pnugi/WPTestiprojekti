<?php if (have_rows('team-block')): ?>
<?php while (have_rows('team-block')): the_row();
    ?>
<section>

    <div class="grid grid-cols-12 pt-12 mb-4">
        <div class="col-start-2 -ml-4">
            <hr class="border-t-2 rounded-full border-primary-500 mt-10 mb-2 mr-4">
        </div>
        <header class="col-start-3 col-span-9 font-['Sora'] border-b border-gray-600 ">
            <h1 class="text-5xl font-medium text-white text-slate mt-4">
                <?php echo get_sub_field('team-header') ?></h1>
        </header>
        <span class="text-gray-100 -ml-6 mt-10 font-['Sora'] font-light">03</span>
    </div>

    <div class="grid grid-cols-12 pt-2">
        <div class="col-start-3 col-end-12">
            <div class="flex flex-col md:flex-row sm:flex-row">
                <img class="lg:w-3/5 sm:w-1/2 object-cover lg:pb-0"
                    src="<?php echo get_sub_field('team-image')['url'] ?>" alt="">
                <div class="text-white container -ml-4  flex flex-col lg:pt-28 pt-8">
                    <h2 class="text-xl lg:text-2xl mb-4"><?php echo get_sub_field('team-title') ?></h2>
                    <p class="mb-8 text-light text-sm"><?php echo get_sub_field('team-text') ?></p>

                    <?php
                        if (is_front_page()) {
                    ?>
                    <div class="flex flex-row">
                        <img class="w-8 animate-pulse" src="<?php echo get_sub_field('team-arrow')['url'] ?>" alt="">
                        <span class="text-xs text-light ml-2.5 mt-2">Tutustu meihin</span>
                    </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</section>
<?php endwhile;?>
<?php endif;?>