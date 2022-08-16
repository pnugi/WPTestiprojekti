<?php if (have_rows('services')): ?>
<?php while (have_rows('services')): the_row();
    $arrow = get_sub_field('services-link-arrow');
?>
<!-- Frontpage services content -->
<?php
    if (is_front_page()) {
?>
<section class="text-white opacity-90 pb-12 pt-24 lg:pt-20 md:pt-20">

    <div class="grid grid-cols-12 pt-12 mb-6">
        <div class="col-start-2 -ml-4">
            <hr class="border-t-2 rounded-full border-primary-500 mt-8 mb-2 mr-4">
        </div>
        <header class="col-start-3 col-span-9 font-['Sora'] border-b border-gray-600">
            <h1 class="text-4xl text-white text-slate mt-4">
                <?php echo get_sub_field('services-header') ?></h1>
        </header>
        <span class="text-white opacity-90 -ml-6 mt-8 font-['Sora'] font-light">01</span>
    </div>

    <div class="grid grid-cols-12 gap-4 pt-4">
        <div class="col-start-3 col-span-9">
            <div class="flex flex-col sm:flex-row">
                <!-- Description -->
                <p class="font-light font-sm mt-0 lg:w-96 sm:w-full pr-4"><?php echo get_sub_field('services-text') ?> </p>
                <!--- Links  -->
                <container class=" lg:ml-24 sm:ml-0 pt-4 md:pt-0 lg:pt-0">
                    <?php
                        if (have_rows('services-links')):
                        while (have_rows('services-links')): the_row();
                    ?>
                    <?php
                        $link = get_sub_field('services-link');
                            if ($link):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <div class="flex pb-2 transition hover:scale-105 hover:translate-x-2 duration-200">
                        <a class="text-xl text-white " href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title);?>
                        </a>
                        <img class="w-4 ml-4 " src="<?php echo $arrow ?>" alt="">
                    </div>
                    <?php 
                        endif;
                    ?>
                    <?php
                        endwhile;
                        endif;
                    ?>
                </container>
            </div>
        </div>        
    </div>
</section>
<?php }?>

<!-- Other pages with services content -->
<?php
    if (!is_front_page()) {
?>

<section class="text-white opacity-90">
    <div class="grid grid-cols-12 pt-16">
        <div class="col-start-2 -ml-4">
            <hr class="border-t-2 rounded-full border-primary-500 mt-10 mb-2 mr-4">
        </div>
        <header class="col-start-3 col-span-9 font-['Sora'] border-b border-gray-600 pb-2">
            <h1 class="text-5xl text-white text-slate mt-4">
                <?php echo get_sub_field('services-header') ?></h1>
        </header>
        <span class="text-white opacity-90 -ml-6 mt-8 font-['Sora'] font-light">01</span>
    </div>

    <!-- Services page text -->
    <div class="grid grid-cols-12 pt-4">
        <div class="col-start-3 col-span-9 text-xl lg:text-2xl">
            <p class="font-sora">Työkalut digiajan ratkaisuihin</p>
        </div>
        <div class="col-start-3 lg:col-start-7 pt-4 col-span-6 lg:col-span-5">
            <div class="flex flex-col sm:flex-row">
                <p class="font-light font-sm"><?php echo get_sub_field('services-text') ?></p>
            </div>
</section>
<?php }
?>

<?php endwhile;?>
<?php endif;?>