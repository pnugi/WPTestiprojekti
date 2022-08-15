<?php

/* echo '<pre>';
print_r(get_field('content-footer'));
echo '</pre>';
die(); */
?>
<section class="bg-white">
    <div class="grid grid-cols-12 ">
        <header class="col-start-3 col-span-9 mt-2 border-b border-gray-600">
            <h1 class="opacity-80 text-lg text-accent-300 mb-2 mt-4 font-['Sora'] font-medium">
                <?php echo get_field('client-header') ?></h1>
        </header>
    </div>
    <div class="mt-0 grid grid-cols-12 pb-12">
        <!-- Empty space-->
        <!-- Images -->
        <div class="grid col-start-3 col-span-9 grid-cols-3 lg:grid-cols-4 ">
            <?php
if (have_rows('content-client')):
    while (have_rows('content-client')): the_row();
        ?>
            <container class="grid justify-start hover:scale-105 transition ease-in-out cursor-pointer">
                <img class="h-20 w-full object-contain" src="<?php echo get_sub_field('logo')['url'] ?>" class=""
                    alt="">
            </container>
            <?php
    endwhile;
endif;
?>
        </div>
    </div>
</section>