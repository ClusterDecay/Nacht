<?php
/*
** @package Dag
*/
?>

<div id="sidebar">
	
	<div class="sidebox">

		<div class="bloginfo">
			<div class="icon">
			<a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_url'); ?>/images/avatar.png" alt=""></a>
			</div>

			<div class="title"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
			</div>
			<div class="desc">
			<?php bloginfo('description'); ?>
			</div>
		</div>

		<div class="menu">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</div>
	</div>

	<div class="sidebox">
		
		<h2>Top Tags</h2>		

		<div class="tag_cloud">
		<?php wp_tag_cloud('smallest=14&largest=14&unit=px&number=20&orderby=count&order=DESC'); ?>
		</div>

	</div>

	<div class="sidebox">

		<?php
		$domain = get_site_url();
		$domain = str_replace('http://', '', $domain);
		$domain = str_replace('www.', '', $domain);
		?>

		© 2013 - <?php echo date('Y'); ?> <?php echo $domain; ?>
	</div>

</div>