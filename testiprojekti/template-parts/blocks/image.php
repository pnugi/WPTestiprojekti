<?php

// Data for content
$heading = get_field('heading');
$level = get_field('heading_level');
$style = get_field('heading_style');

$content = get_field('text');
// Data for image
$image = get_field('image');
$caption = get_field('caption'); // Hidden / Under image / On top of image
$order = get_field('order');
$ratio = get_field('ratio');
$ordermobile = get_field('m-order');
$ratiomobile = get_field('m-ratio');?>

<!--
<div class="flex flex-row relative">
    <img src="<?php echo $image ?>" alt="">
    <div class="basis-2/6">
    </div>
    <div class="basis-4/6 absolute f">
        <h1 class="text-gray-100"><?php echo $heading ?></h1>
        <p class="text-gray-100"><?php echo $content ?></p>
    </div>

</div>
--->