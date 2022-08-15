<section class="bg-white">
    <div class="grid grid-cols-12 pt-20">
        <div class="col-start-2 -ml-4 ">
            <hr class="border-t-2 rounded-full border-gray-800 opacity-75 mt-8 mb-2 mr-6">
        </div>
        <header class="col-start-3 col-span-9 border-b border-gray-600 font-['Sora']">
            <h2 class="opacity-90 text-3xl lg:text-4xl font-medium text-accent-300 mb-2 mt-4">
                <?php echo get_field('quote-header') ?>
            </h2>
        </header>
    </div>

    <div class="grid grid-cols-12 p-12">
        <img class="col-start-3 col-end-4 w-16 pr-0 sm:pr-4 pt-2 lg:pt-0" src="<?php echo get_field('quote-logo') ?>"
            alt="">
        <p class="col-span-8 container lg:text-lg italic pt-2 lg:pt-4"><?php echo get_field('quote-text') ?></p>
    </div>
</section>