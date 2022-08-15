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

// Data for columns

// Data for listing

// Data for settings
$pt = get_field('padding_top');
$pb = get_field('padding_bottom');
$anchor = get_field('block_anchor') ? get_field('block_anchor') : 'column-' . $block['id'];

$theme = get_field('block_theme');
$visibility = get_field('visibility');
$link = get_field('link');
$image = get_field('background_image');

/* echo '<pre>';
print_r($image);
echo '</pre>';
die(); */

?>

<?php
$link = get_field('link');
if ($link):
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
	<a class="btn btn-blue" href="<?php echo esc_url($link_url); ?>"
	    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
	<?php endif;?>

<h1><?php echo $heading ?></h1>
<p><?php echo $content ?></p>
<img src="<?php echo $image['url'] ?>" alt="">