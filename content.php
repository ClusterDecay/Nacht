<?php
/*
** @package Dag
*/
?>

<div class="post" id="post-<?php the_ID(); ?>">
		
	<div class="meta_top">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><span class="date"><?php echo bm_human_time_diff_enhanced(); ?></span>
	</div><!-- .meta_top -->

	<div class="entry">
		<?php the_content('Read more &raquo;'); ?>		
	</div><!-- .entry -->

	<div class="meta_bottom">
		<span class="post_tags"><?php the_tags('', '', ''); ?></span><span class="separator"> · </span><?php comments_popup_link( '0 notes', '1 note', '% notes', 'notes-link', '0 notes'); ?>
	</div><!-- .meta_bottom -->

</div><!-- .post -->