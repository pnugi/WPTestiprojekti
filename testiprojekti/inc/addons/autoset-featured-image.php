<?php

/**
 *  Automatically set youtube-image for post if youtube-link added to content
 */
function youtube_auto_set_featured_image()
{
    global $post;
    $post_id = $post->ID;
    if ('post' == get_post_type($post_id)) {
        $featured_image_exists = has_post_thumbnail($post_id);
        if (!$featured_image_exists) {
            $content = get_the_content($post_id);
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $content, $match)) {
                $video_id = $match[1];
                $yt_image_url = 'https://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg';
                $description = get_the_title($post_id);
                $return = 'id';
                if ($yt_image_url) {
                    $image = media_sideload_image($yt_image_url, $post_id, $description, $return);
                    set_post_thumbnail($post_id, $image);
                }
            }
        }
    }
}
/* Actions */
// add_action('the_post', 'youtube_auto_set_featured_image');
// add_action('new_to_publish', 'youtube_auto_set_featured_image');
// add_action('draft_to_publish', 'youtube_auto_set_featured_image');
// add_action('pending_to_publish', 'youtube_auto_set_featured_image');
// add_action('future_to_publish', 'youtube_auto_set_featured_image');

/**
 * Automatically set featured-image for posts
 */
function auto_set_featured_image()
{
    global $post;
    $post_id = $post->ID;
    if ('post' == get_post_type($post_id)) {
        $json = get_post_meta($post_id, 'attributes', true);
        $json = json_decode($json, true);
        $featured_image_exists = has_post_thumbnail($post_id);
        if (!$featured_image_exists) {
            $image_urls = $json['productImages'];
            foreach ($image_urls as $url) {
                if ($url['coverPhoto'] == true) {
                    $image_url = $url['largeUrl'];
                }
            }
            $description = get_the_title($post_id);
            $return = 'id';
            if ($image_url) {
                $image = media_sideload_image($image_url, $post_id, $description, $return);
                set_post_thumbnail($post_id, $image);
            }
        }
    }
}
/* Actions */
// add_action('the_post', 'auto_set_featured_image');
// add_action('new_to_publish', 'auto_set_featured_image');
// add_action('draft_to_publish', 'auto_set_featured_image');
// add_action('pending_to_publish', 'auto_set_featured_image');
// add_action('future_to_publish', 'auto_set_featured_image');