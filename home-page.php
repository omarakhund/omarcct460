<?php
/**
* Template Name: customehomepage
*
* @package omarcct460
*/
	get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


	
	<div id="custompage">
	<?php
	//This function shows that there will be 1 posts shown from the category "nastynas"
			$args = array('showposts' => 1, 'category_name' => 'nastynas');
			$my_query = new WP_Query($args);
			?>
			<?php 
			//	WP Query to show posts on this specific page
			if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
			 
			?>
	</div>
			
			<div class="entry-content">	

			<?php get_template_part( 'template-parts/content' );?>	

			
			
			<?php endwhile; endif; wp_reset_query(); ?>

<?php
get_sidebar();
get_footer();
