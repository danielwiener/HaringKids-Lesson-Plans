<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
			
<?php 
global $query;
/* var_dump($query); */ ?>
<?php if ( have_posts() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 /* get_template_part( 'loop', 'search' ); */
				?>
				<?php
				/*
$wp_query = new WP_Query();
$wp_query->query('caller_get_posts=1&orderby=post_date&order=DESC&post_type=post&post_status=publish&posts_per_page=2&paged='.$paged);
*/

/* query_posts($query_string.'&post_type=post'); */


while (/* $wp_query-> */have_posts()) : /* $wp_query-> */the_post(); 

?>
<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
			<h2 class="toc_title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>


			<div class="entry-summary">
			<?php if(has_post_thumbnail()): ?>
			<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('small-thumbnail',  array('class' => 'alignleft', 'title' => trim(strip_tags($post->post_title)), 'alt' => trim(strip_tags($post->post_title)))); 

			?>
			</a>
			<?php endif; ?>
			
			<?php
					if(get_post_meta($post->ID, "_dwdescription_value", $single = true) != "") : ?>
					<p><?php echo get_post_meta($post->ID, "_dwdescription_value", $single = true);?></p>
								
					<?php endif; ?>
				
			</div><!-- .entry-summary -->
			
			
			<div class="entry-utility">
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->
<?php endwhile; ?>
				<!-- <pre><?php /* var_dump($wp_query); */ ?></pre> -->
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'twentyten' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
