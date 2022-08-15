<?php
$companyName = get_field('company-name');
?>

<!-- Footer -->
<footer id="colophon" class="site-footer py-8 text-gray-100 grid grid-cols-12 text-s" role="contentinfo">
    <!-- logo, contact adress & links -->
    <div class="grid col-start-3 col-span-9 grid-cols-3 h-52">
        <container class="">
            <img src="<?php echo get_field('logo') ?>" class="w-16 hover:scale-105 transition ease-in-out" alt="">
        </container>
        <container class="text-xs lg:text-sm">
            <p class="font-semibold mt-0"><?php echo $companyName ?></p>
            <p class="font-light mb-0"> <?php echo get_field('company-address') ?></p>
            <p class="font-light mt-0"><?php echo get_field('company-postnumber') ?></p>
        </container>
        <container class="flex flex-col">
            <!-- UL LI listaus tahan linkeille TODO-->
            <?php
if (have_rows('footer-links')):
    while (have_rows('footer-links')): the_row();
        ?>
            <?php
        $link = get_sub_field('link');
        if ($link): $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';?>
            <a class="text-xs lg:text-sm font-light text-white container mt-0 pb-4"
                href="<?php echo esc_url($link_url); ?>"
                target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><?php if ($link_target != '_self'): ?><span
                    class="sr-only"><?=$external;?></span> ↗<?php endif;?></a>
            <?php endif;?> <?php
endwhile;
endif;
?>
        </container>
    </div>
    <!-- Description -->
    <div class="grid col-start-3 col-span-9 site-info border-t border-gray-600 text-xs">
        <p class="col-start-1 col-end-2 mt-2">© <?php echo $companyName . " " . date("Y"); ?></p>
        <a href="" class="col-start-2 col-end-9 mt-2 sm:-ml-4 text-white">Tietosuojaseloste</a>
        <!-- LOGOT TAHAN LOOPILLA-->
    </div>
</footer>

</div>