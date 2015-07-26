<?php
/*
** @package Dag
*/
?>

<?php get_header();?>

<?php get_sidebar(); ?>

<div id="content">

	<?php if (have_posts()) : ?>
		
		<div id="main">    

		<?php while (have_posts()) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; ?>

		</div>

        	<div id="navigation">

        		<div class="previous"><?php next_posts_link( '' ) ?></div>
			<div class="next"><?php previous_posts_link( '' ) ?></div>

           	</div><!-- #navigation -->

	<?php else : ?>

		<?php get_template_part( 'content', '404' ); ?>

	<?php endif; ?>

</div><!-- #content -->

<?php get_footer(); ?>