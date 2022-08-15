<?php

/* echo '<pre>';
print_r(get_field('authors'));
echo '</pre>';
die(); */
?>

<div class="container grid grid-cols-3 m-8 content-center">
    <?php
if (have_rows('repeaterblock')):
    while (have_rows('repeaterblock')): the_row();
        $repTitle = get_sub_field('title');
        $repText = get_sub_field('copy');
        $repImage = get_sub_field('logo')['url'];
        ?>
    <div class="">
        <img src="<?php echo $repImage ?>" alt="">
        <h1 class="font-bold"><?php echo $repTitle ?></h1>
        <p><?php echo $repText ?></p>
    </div>
    <?php
    endwhile;
else:
endif;
?>
</div>