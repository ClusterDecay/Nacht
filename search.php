<?php
/*
** @package Dag
*/
?>

<?php get_header();?>

<?php get_sidebar(); ?>

<div id="content">

	<?php if (have_posts()) : ?>

		<div class="pagetitle">
	     		<p>Search Results for: <?php echo $s ?></p>
		</div><!-- .pagetitle -->

	<?php while (have_posts()) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>
	
	<?php endwhile; ?>

		<div class="navigation">

			<?php my_pagination(); ?>		
	
		</div><!-- .navigation -->

	<?php else : ?>

		<?php get_template_part( 'content', '404' ); ?>

	<?php endif; ?>

</div><!-- #content -->

<?php get_footer ();?>