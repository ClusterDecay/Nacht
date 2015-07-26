<?php
/*
** @package Dag
*/
?>

<?php get_header();?>

<?php get_sidebar(); ?>

<div id="content">

	<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

	<div id="main">

	<?php while (have_posts()) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

	<?php endwhile; ?>

	</div>

		<div class="navigation">

			<?php my_pagination(); ?>		
	
		</div><!-- .navigation -->

	<?php else : ?>

		<?php get_template_part( 'content', '404' ); ?>

	<?php endif; ?>

</div><!-- #content -->

<?php get_footer(); ?>