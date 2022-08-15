<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Froggy
 */

get_header(); ?>

	<div id="primary" class="content-area py-24">
		<main id="main" class="site-main container" role="main">

			<section class="error-404 not-found">
				<header class="page-header text-center">
					<h2 class="text-[3rem] font-bold">404</h2>
					<h1 class="page-title"><?php froggy_the_string('Oho! Etsimääsi sivua ei löytynyt.'); ?></h1>
				</header><!-- .page-header -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
