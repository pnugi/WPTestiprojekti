<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Froggy
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php froggy_the_string('Mitään ei löytynyt'); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_search() ) : ?>

			<p><?php froggy_the_string('Hakusanalla ei löytynyt sisältöä. Koitahan toisella hakusanalla.'); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php froggy_the_string('Emme valitettavasti löytäneet etsimääsi.'); ?></p>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
