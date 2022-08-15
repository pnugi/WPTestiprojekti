<?php
/**
 * Gutenberg setup
 *
 * @package Froggy
 */

/*
 * Register block categories
 */
add_filter('block_categories_all', 'froggy_block_categories', 10, 2);
function froggy_block_categories($categories, $post)
{
    return array_merge(
        $categories,
        [
            [
                'slug' => 'hero-blocks',
                'title' => 'Hero/sivun aloitus',
            ],
            [
                'slug' => 'featured-blocks',
                'title' => 'Nosto',
            ],
            [
                'slug' => 'content-blocks',
                'title' => 'Sisältö',
            ],
            [
                'slug' => 'listing-blocks',
                'title' => 'Listaukset',
            ],
            [
                'slug' => 'client-blocks',
                'title' => 'Asiakaskohtaiset',
            ],
        ]
    );
}

/*
 * Register acf gutenberg blocks
 */
add_action('acf/init', 'froggy_acf_blocks');
function froggy_acf_blocks()
{
    if (function_exists('acf_register_block')) {

        /*
         * ACF Register blocks -> https://www.advancedcustomfields.com/resources/acf_register_block_type/
         * name = Slugi, tee tällä nimellä tiedosto blocks kansioon (template-parts/blocks).
         * title = Hallinnan puolella näkyvä otsikko.
         * description = Hallinnan puolella näkyvä kuvausteksti.
         * category = Hallinnan puolella lohkovalitsimen kategoria. Voit valita oletuksista: common | formatting | layout | widgets | embed tai tehdä/käyttää omia froggy_block_categories() funktion avulla.
         * icon = Hallinnan puolella näkyvä ikoni - https://developer.wordpress.org/resource/dashicons/
         * keywords = Hallinnan puolella haussa näkyvät hakusanat.
         * post_types = Sisältötyypit missä kyseinen blokki on käytettävissä.
         * mode = Miten blokki näytetään editointi näkymässä, käytä aina "auto"-valintaa jos vain mahdollista. Valinnat: auto | preview | edit
         * supports = Lisämäärityksiä (align, mode, multiple). Määritetään leveykset itse, joten poistetaan align-valinta käytöstä.
         * render_callback = froggy_acf_block_render -> Meidän oma funkkari, joka hakee blokkien templaten.
         */

        // x block
        acf_register_block([
            'name' => 'froggy-x',
            'title' => 'Pohjalohko',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-blocks',
            'icon' => 'admin-comments',
            'keywords' => ['keyword-x'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => false,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
        // Image block
        acf_register_block([
            'name' => 'content-bg-image',
            'title' => 'Background image',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-blocks',
            'icon' => 'admin-appearance',
            'keywords' => ['image'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => true,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
        // Client logo block
        acf_register_block([
            'name' => 'content-client',
            'title' => 'Client logos',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-blocks',
            'icon' => 'admin-appearance',
            'keywords' => ['client'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => true,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
        // Client logo block
        acf_register_block([
            'name' => 'content-footer',
            'title' => 'Footer',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-blocks',
            'icon' => 'admin-appearance',
            'keywords' => ['footer'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => true,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
        // Subheader
        acf_register_block([
            'name' => 'content-quote',
            'title' => 'Quote box',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-blocks',
            'icon' => 'admin-appearance',
            'keywords' => ['quote'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => true,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
        acf_register_block([
            'name' => 'content-stream',
            'title' => 'Office stream',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-stream',
            'icon' => 'admin-appearance',
            'keywords' => ['stream'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => true,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
        acf_register_block([
            'name' => 'content-team',
            'title' => 'Team description',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-stream',
            'icon' => 'admin-appearance',
            'keywords' => ['team'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => true,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
        acf_register_block([
            'name' => 'content-services',
            'title' => 'Services / Palvelut',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-stream',
            'icon' => 'admin-appearance',
            'keywords' => ['service'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => true,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
        acf_register_block([
            'name' => 'content-hero',
            'title' => 'Hero',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-stream',
            'icon' => 'admin-appearance',
            'keywords' => ['hero'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => true,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
        acf_register_block([
            'name' => 'content-nav',
            'title' => 'Nav',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-stream',
            'icon' => 'admin-appearance',
            'keywords' => ['nav'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => true,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
        acf_register_block([
            'name' => 'content-services-page',
            'title' => 'Services page services',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-services-page',
            'icon' => 'admin-appearance',
            'keywords' => ['services'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => true,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
        acf_register_block([
            'name' => 'content-news',
            'title' => 'News',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-news',
            'icon' => 'admin-appearance',
            'keywords' => ['news'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => true,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
        acf_register_block([
            'name' => 'content-workers',
            'title' => 'Workers',
            'description' => 'Kaikki kentät näkyvillä',
            'category' => 'content-workers',
            'icon' => 'admin-appearance',
            'keywords' => ['news'],
            'post_types' => ['post', 'page'],
            'mode' => 'auto',
            'supports' => [
                'align' => false,
                'multiple' => true,
            ],
            'render_callback' => 'froggy_acf_block_render',
        ]);
    }
}

/*
 * Disable gutenberg default blocks - Allow ACF-blocks and some core blocks
 */
add_filter('allowed_block_types_all', 'froggy_allowed_block_types');
function froggy_allowed_block_types($allowed_block_types)
{
    return [
        /* Core blocks */
        'core/block',

        /* ACF Blocks */
        'acf/froggy-x',
        'acf/content-bg-image',
        'acf/content-client',
        'acf/content-footer',
        'acf/content-quote',
        'acf/content-stream',
        'acf/content-team',
        'acf/content-services',
        'acf/content-services-page',
        'acf/content-hero',
        'acf/content-nav',
        'acf/content-news',
        'acf/content-workers'
    ];
}

/*
 * Gutenberg setup
 */
add_action('after_setup_theme', 'gutenberg_setup');
function gutenberg_setup()
{
    // Adding support for core block visual styles.
    add_theme_support('wp-block-styles');
    // Add support for full and wide align images.
    add_theme_support('align-wide');
    // Disables the Color picker option in editor
    add_theme_support('disable-custom-colors');
    // Add support for responsive embeds.
    add_theme_support('responsive-embeds');
}

/*
 * ACF - Render blocks
 */
function froggy_acf_block_render($block)
{
    $slug = str_replace('acf/', '', $block['name']);
    if (file_exists(get_template_directory() . "/template-parts/blocks/{$slug}.php")) {
        include get_template_directory() . "/template-parts/blocks/{$slug}.php";
    }
}

/**
 * Tailwind css to admin edit-page
 */
add_action('after_setup_theme', 'tailwind_to_admin');
function tailwind_to_admin()
{
    add_theme_support('editor-styles');
    add_editor_style('dist/admin.css');
}