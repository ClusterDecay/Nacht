<?php
/*
** @package Dag
*/
?>

<div class="page" id="post-<?php the_ID(); ?>">
		
	<div class="meta_top">
		<h2><?php the_title(); ?></h2>
	</div><!-- .meta_top -->

	<div class="entry">
		<?php the_content('Read more &raquo;'); ?>
	</div><!-- .entry -->

</div><!-- .page -->
