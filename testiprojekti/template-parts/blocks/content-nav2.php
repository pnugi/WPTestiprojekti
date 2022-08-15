<header class="grid grid-cols-12 h-24 ">
    <!--- Hero img -->
    <div class="bg-black opacity-70">
        <img class="w-full items-center flex absolute h-70vh lg:h-80vh object-cover bg-path"
            src="<?php echo get_field('heroimg')['url'] ?>" alt="">
    </div>

    <!--- Nav --->
    <img class="w-12 col-start-2 -ml-4 relative justify-center h-24" src="<?php echo get_field('nav-logo')['url'] ?>"
        alt="">
    <nav class="col-span-8 col-start-3 relative">
        <ul class="justify-between centerlinks">
            <li class="">
                <?php
if (have_rows('nav-links')):
    while (have_rows('nav-links')): the_row();
        ?>
                <?php
        $link = get_sub_field('nav-link');
        if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>

                <?php
            $rowIndex = get_row_index();
            if ($rowIndex <= 3): ?>

                <a class="text-white text mr-4 hover:scale-105 ease-in-out py-4"
                    href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title);
            ?><span class="text-xs pl-1">0<?php echo $rowIndex ?></span></a>
                <?php endif;?>
                <?php endif;?>
                <?php
endwhile;
endif;
?>
            </li>
            <li class="">
                <?php
if (have_rows('nav-links')):
    while (have_rows('nav-links')): the_row();
        ?>
                <?php
        $link = get_sub_field('nav-link');
        if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>

                <?php
            $rowIndex = get_row_index();
            if ($rowIndex > 3): ?>

                <a class="text-white text-sm w-22 ml-4 py-4  hover:scale-105 duration-400"
                    href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title);
            ?><span class="text-xs pl-1"></span></a>
                <?php endif;?>
                <?php endif;?>
                <?php
endwhile;
endif;
?>
            </li>
        </ul>
    </nav>
    <div class="grid col-start-11 content-center justify-center relative ml-16">
        <p class="text-white text-sm"> FI | EN</p>
    </div>
</header>