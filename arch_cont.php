<?php
/*
Template Name: custom_archives
*/
?>

<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="content">

    <?php if (have_posts()): ?>

	<div id="main">

        <?php while (have_posts()): the_post(); ?>

		<div class="page">

			<div class="meta_top">
				<h2><?php the_title(); ?></h2>
			</div><!-- .meta_top -->
		
			<div class="archives">
		
			<?php

    // set up our archive arguments
    $archive_args = array(
      post_type => 'post',    // get only posts
      'posts_per_page'=> -1   // this will display all posts on one page
    );

    // new instance of WP_Quert
    $archive_query = new WP_Query( $archive_args );

  ?>

    <?php $date_old = ""; // assign $date_old to nothing to start ?>

    <?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); // run the custom loop ?>

	<?php $date_new = get_the_time("F Y"); // get $date_new in "Month Year" format ?>
	<?php $archive_year  = get_the_time('Y'); ?>
	<?php $archive_month = get_the_time('m'); ?>

      <?php if ( $date_old != $date_new ) : // run the check on $date_old and $date_new, and output accordingly ?>

        </ul><h2><a href="<?php echo get_month_link( $archive_year, $archive_month ); ?>"><?php echo $date_new; ?></a></h2><ul>
      <?php endif; ?>


        <li><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a><span class="date"><?php the_time("d F Y"); ?></span></li>


      <?php $date_old = $date_new; // update $date_old ?>

    <?php endwhile; // end the custom loop ?>

 

  <?php wp_reset_postdata(); // always reset post data after a custom query ?>

		</div><!-- .archives -->

		</div><!-- .page -->

        <?php endwhile; ?>
       
    	<?php else: ?>

        	<?php get_template_part( 'content', '404' ); ?>

	<?php endif; ?>

<?php get_footer(); ?>