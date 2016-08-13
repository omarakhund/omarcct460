<?php
/**
* Template Name: Custom query for PDF related posts
*
* @package omarcct460
*/
	get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h2 class="post-title"> </h2>

			<?php 
				
			//This function shows that there will be 6 posts shown from the category "pdfutm"
			$args = array('showposts' => 6, 'category_name' => 'pdfutm');
			$my_query = new WP_Query($args);
			?>
	
			<?php 
			//	WP Query to show posts on this specific page
			if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
			 
			?>

			
			<div class="entry-content">

			<?php get_template_part( 'template-parts/content' );?>	

			<?php
			//posts thumbnails
			if ( has_post_thumbnail()){
				the_post_thumbnail();

			}
			?>
			
			<?php endwhile; endif; wp_reset_query(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>