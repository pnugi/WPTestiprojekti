<?php
/**
 * Block Name: X
 *
 * This is the template that displays froggy x
 */
?>

<?php
// create id attribute for specific styling

// Data for content
$heading = get_field('heading');
$level = get_field('heading_level');
$style = get_field('heading_style');

$content = get_field('text');

// Optional content data
$content_position = get_field('position');
$heading_color = get_field('heading_color');
$text_color = get_field('text_color');

// Data for single link, file
$link = get_field('link');
$file = get_field('file');
$external = froggy_get_string('Avautuu uuteen ikkunaan');
$btn_style = get_field('btn_style');
$tag_manager = get_field('tag_manager');

// Data for multiple links, files
$links = get_field('links');

// Data for image
$image = get_field('image');
$caption = get_field('caption'); // Hidden / Under image / On top of image
$order = get_field('order');
$ratio = get_field('ratio');
$ordermobile = get_field('m-order');
$ratiomobile = get_field('m-ratio');

// Data for columns

// Data for listing

// Data for settings
$pt = get_field('padding_top');
$pb = get_field('padding_bottom');
$anchor = get_field('block_anchor') ? get_field('block_anchor') : 'column-' . $block['id'];

$theme = get_field('block_theme');
$visibility = get_field('visibility');

?>

<section id="<?=$anchor;?>" class=" block-x bg-primary p-5">
    <?php // =Content ?>
    <?php if (!empty($heading)): ?>
    <h3>Otsikko</h3>
    <pre class="bg-gray-100 p-4 mb-4"><?=$heading;?>, taso <?=$level;?>, tyyli <?=$style;?></pre>
    <?php endif;?>
    <h3>Tekstisisältö</h3>
    <?php if (!empty($content)): ?>
    <pre class="bg-gray-100 p-4 mb-4"><?=$content;?></pre>
    <?php endif;?>
    <hr class="my-8">
    <h3>Yksittäinen linkki/tiedosto</h3>

    <?php if ($link): $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';?>
    <pre class="bg-gray-100 p-4 mb-4">Url <?=$link_url;?><br>Title <?=$link_title;?><br>Target <?=$link_target;?></pre>
    <a class="bg-primary-500 text-white btn transition-colors duration-100 inline-block font-bold mb-2 md:mr-2"
        href="<?php echo esc_url($link_url); ?>"
        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><?php if ($link_target != '_self'): ?><span
            class="sr-only"><?=$external;?></span> ↗<?php endif;?></a>
    <?php endif;?>
    <?php $file = get_field('file');if ($file): $file_url = $file['url'];
    $file_title = $file['title'];?>
    <pre class="bg-gray-100 p-4 mb-4">Url <?=$file_url;?><br>Title <?=$file_title;?></pre>
    <a class="bg-primary-500 text-white btn transition-colors duration-100 inline-block font-bold mb-2 mr-2"
        href="<?=$file_url;?>"><?=$file_title;?></a>
    <?php endif;?>

    <hr class="my-8">

    <h3>Useampi linkki</h3>
    <?php if ($links):
    echo '<nav class="flex flex-row">';
    foreach ($links as $link):
        if ($link['type'] == 'link'): ?>
    <?php $link_url = $link['link']['url'];
        $link_title = $link['link']['title'];
        $link_target = $link['link']['target'] ?: '_self';?>
    <a class="bg-primary-500 text-white btn transition-colors duration-100 inline-block font-bold mb-2 md:mr-2"
        href="<?php echo esc_url($link_url); ?>"
        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><?php if ($link_target != '_self'): ?><span
            class="sr-only"><?=$external;?></span> ↗<?php endif;?></a>
    <?php
else: ?>
    <?php $file_url = $link['file']['url'];
$file_title = $link['file']['title'];?>
    <a class="bg-primary-500 text-white btn transition-colors duration-100 inline-block font-bold mb-2 mr-2"
        href="<?=$file_url;?>"><?=$file_title;?></a>
    <?php endif;
endforeach;
echo '</nav>';
endif;?>

    <hr class="my-8">
    <h3>Kuvan lisäasetukset</h3>
    <pre
        class="bg-gray-100 p-4 mb-4">Deskari: <?=$order;?> <?=$ratio;?><br>Mobiili: <?=$ordermobile;?> <?=$ratiomobile;?></pre>
    <?php
$size = 'large';
if ($image) {
    $image_id = $image['id'];
    echo wp_get_attachment_image($image_id, $size);
}
?>
    <hr class="my-8">
    <h3>Asetukset</h3>
    <pre
        class="bg-gray-100 p-4 mb-4">Top: <?=$pt;?><br>Bottom: <?=$pb;?><br>Anchor: <?=$anchor;?><br>Theme: <?=$theme;?><br>Visibility: <?=$visibility;?></pre>

</section>