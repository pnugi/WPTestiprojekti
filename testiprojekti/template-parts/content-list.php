
<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Froggy
 */

?>

<article id="post-<?php the_ID(); ?>" class="py-3 border-b">

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title mb-2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php if(get_post_type() == 'post'): ?>
			<div class="entry-meta">
				<?php froggy_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if(has_excerpt()): ?>
		<div class="entry-content">
			<p><?php excerpt(15); ?></p>
		</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post-## -->
