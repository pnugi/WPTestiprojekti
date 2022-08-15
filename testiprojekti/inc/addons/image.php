<?php

/**
 * Post thumbnail versions
 */

function get_image_srcset_urls_post_pixel($post_id)
{
    /**
     * Create pixel density -versions of src and srcset urls for background-image when using post thumbnail
     * 
     * @param int $post_id post ID
     * @return array $src[0] = image url, $src[1] = image srcset
     * 
     * Usage example: <div style="background-image: url(<?php echo esc_url($src[0]); ?>); background-image: image-set( <?php echo esc_html($src[1]); ?> ); background-image: -webkit-image-set( <?php echo esc_html($src[1]); ?> );"></div>
     */

    // Declare empty srcset variable
    $image_srcset = '';

    // Set image sizes
    $sizes = array(
        'thumbnail',
        'medium',
        'large'
    );

    // More image variants can be added, if needed, e.g. 3x, 4x || 
    foreach ($sizes as $size) :
        if ($size == 'large') :
            $src = get_the_post_thumbnail_url($post_id, $size);
            $src = 'url("' . $src . '") 2x';
            $image_srcset .= $src;
        elseif ($size == 'medium') :
            $src = get_the_post_thumbnail_url($post_id, $size);
            $src = 'url("' . $src . '") 1x, ';
            $image_srcset .= $src;
        endif;
    endforeach;
    $size = 'thumbnail';
    $image_src = get_the_post_thumbnail_url($post_id, $size);

    if (!$image_src) :
        return false;
    endif;

    $src = array(
        $image_src,
        $image_srcset
    );

    return $src;
}

function get_image_srcset_urls_post_width($post_id)
{
    /**
     * Create window width -versions of src and srcset urls for image when using post thumbnail
     * 
     * @param int $post_id post ID
     * @return array $src[0] = image url, $src[1] = image srcset, $src[2] = image alt
     * 
     * Usage example: <img src="<?= $src[0]; ?>" srcset="<?= $src[1]; ?>" alt="<?= $src[2]; ?>">
     */

    // Declare empty srcset variable
    $image_srcset = '';

    // Set image sizes
    $sizes = array(
        'thumbnail',
        'medium',
        'large'
    );

    // More image variants can be added, if needed || 
    foreach ($sizes as $size) :
        if ($size == 'thumbnail') :
            $src = get_the_post_thumbnail_url($post_id, $size);
            $width = 480; // max-width of window
            $src = $src . ' ' . $width . 'w, ';
            $image_srcset .= $src;
        elseif ($size == 'medium') :
            $src = get_the_post_thumbnail_url($post_id, $size);
            $width = 1280; // max-width of window
            $src = $src . ' ' . $width . 'w, ';
            $image_srcset .= $src;
        elseif ($size == 'large') :
            $src = get_the_post_thumbnail_url($post_id, $size);
            $width = 2560; // max-width of window
            $src = $src . ' ' . $width . 'w';
            $image_srcset .= $src;
        endif;
    endforeach;
    $size = 'thumbnail';
    $image_src = get_the_post_thumbnail_url($post_id, $size);
    $image_alt = get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true);

    if (!$image_src) :
        return false;
    endif;

    $src = array(
        $image_src,
        $image_srcset,
        $image_alt
    );

    return $src;
}

/**
 * ACF Image Field versions
 */

function get_image_srcset_urls_acf_pixel($field_name, $option = false, $id = '')
{
    /**
     * Create pixel density -versions of src and srcset urls for background-image when using ACF Image -field
     * 
     * @param string $field_name ACF Image field name
     * @param boolean $option ACF Image inside options
     * @param int $id post ID
     * @return array $src[0] = image url, $src[1] = image srcset
     * 
     * Usage example: Usage example: <div style="background-image: url(<?php echo esc_url($src[0]); ?>); background-image: image-set( <?php echo esc_html($src[1]); ?> ); background-image: -webkit-image-set( <?php echo esc_html($src[1]); ?> );"></div>
     */

    // Declare empty srcset variable
    $image_srcset = '';

    // Get ACF Field
    if ($option) :
        if (get_field("$field_name", 'option')) :
            $image = get_field("$field_name", 'option');
        else :
            $image = get_sub_field("$field_name", 'option');
        endif;
    elseif ($id) :
        if (get_field("$field_name", $id)) :
            $image = get_field("$field_name", $id);
        else :
            $image = get_sub_field("$field_name", $id);
        endif;
    else :
        if (get_field("$field_name")) :
            $image = get_field("$field_name");
        else :
            $image = get_sub_field("$field_name");
        endif;
    endif;

    // Set image sizes
    $sizes = array(
        'thumbnail',
        'medium',
        'large'
    );

    if (!$image) :
        return false;
    endif;

    // More image variants can be added, if needed || 
    foreach ($sizes as $size) :
        if ($size == 'large') :
            $src = $image['sizes'][$size];
            $src = 'url("' . $src . '") 2x';
            $image_srcset .= $src;
        elseif ($size == 'medium') :
            $src = $image['sizes'][$size];
            $src = 'url("' . $src . '") 1x, ';
            $image_srcset .= $src;
        endif;
    endforeach;
    $size = 'thumbnail';
    $src = $image['sizes'][$size];
    $image_src = $src;

    $src = array(
        $image_src,
        $image_srcset
    );

    return $src;
}

function get_image_srcset_urls_acf_width($field_name, $option = false, $id = '')
{
    /**
     * Create window width -versions of src and srcset urls for background-image when using ACF Image -field
     * 
     * @param string $field_name ACF Image field name
     * @param boolean $option ACF Image inside options
     * @param int $id post ID
     * @return array $src[0] = image url, $src[1] = image srcset, $src[2] = image alt (uses title if alt not set)
     * 
     * Usage example: <img src="<?= $src[0]; ?>" srcset="<?= $src[1]; ?>" alt="<?= $src[2]; ?>">
     */

    // Declare empty srcset variable
    $image_srcset = '';

    // Get ACF Field
    if ($option) :
        if (get_field("$field_name", 'option')) :
            $image = get_field("$field_name", 'option');
        else :
            $image = get_sub_field("$field_name", 'option');
        endif;

    elseif ($id) :
        if (get_field("$field_name", $id)) :
            $image = get_field("$field_name", $id);
        else :
            $image = get_sub_field("$field_name", $id);
        endif;
    else :
        if (get_field("$field_name")) :
            $image = get_field("$field_name");
        else :
            $image = get_sub_field("$field_name");
        endif;
    endif;

    // Set image sizes
    $sizes = array(
        'thumbnail',
        'medium',
        'large'
    );

    if (!$image) :
        return false;
    endif;

    // More image variants can be added, if needed || 
    foreach ($sizes as $size) :
        if ($size == 'thumbnail') :
            $src = $image['sizes'][$size];
            $width = 480; // max-width of window
            $src = $src . ' ' . $width . 'w, ';
            $image_srcset .= $src;
        elseif ($size == 'medium') :
            $src = $image['sizes'][$size];
            $width = 1280; // max-width of window
            $src = $src . ' ' . $width . 'w, ';
            $image_srcset .= $src;
        elseif ($size == 'large') :
            $src = $image['sizes'][$size];
            $width = 2560; // max-width of window
            $src = $src . ' ' . $width . 'w, ';
            $image_srcset .= $src;
        endif;
    endforeach;
    $size = 'thumbnail';
    $src = $image['sizes'][$size];
    $image_src = $src;

    $image_alt = $image['alt'];
    $image_title = $image['title'];
    if (!$image_alt) :
        $image_alt = $image_title;
    endif;

    $src = array(
        $image_src,
        $image_srcset,
        $image_alt,
    );

    return $src;
}
