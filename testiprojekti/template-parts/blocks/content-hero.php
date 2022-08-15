<?php if (have_rows('hero')): ?>
<?php while (have_rows('hero')): the_row();
    ?>
<section class="text-gray-100">
    <div class="grid grid-cols-12 pt-12 lg:pt-24 mb-8 relative">
        <div class="col-start-2 -ml-4">
            <hr class="border-t-2 rounded-full border-primary-500 lg:mt-14 mt-10 mb-2 mr-4">
        </div>
        <header class="col-start-3 font-['Sora'] col-span-8 text-white ">
            <h1 class="lg:text-7xl md:text-6xl text-4xl mt-4 pb-4">
                Digitoimisto<br> isolla Teellä</h1>
            <p class="col-end-6 mb-8 text-sm md:text-base lg:text-lg text-light w-full lg:w-2/3">
                <?php echo get_sub_field('hero-text') ?></p>
        </header>
    </div>
</section>
<?php endwhile;?>
<?php endif;?>