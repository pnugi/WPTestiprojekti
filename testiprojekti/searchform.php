<form method="get" id="searchform" action="<?= esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="flex items-center">
		<input class="border w-full py-2 px-3 text-black" type="text" name="s" id="search" placeholder="<?php froggy_the_string('Kirjoita hakusana'); ?>" value="<?php the_search_query(); ?>" />
		<button type="submit" class="btn btn-primary"><?php froggy_the_string('Hae'); ?></button>
	</div>
</form>
