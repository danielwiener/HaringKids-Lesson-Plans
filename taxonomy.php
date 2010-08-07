<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php get_header();
global $taxonomy; 

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  
$taxonomy = get_taxonomy($term->taxonomy);
/* echo '<pre>'.var_dump($term). '</pre>';  */
/* echo '<pre>'.var_dump($taxonomy). '</pre>'; */
?>

		<div id="container">
			<div id="content" role="main">

				<h1 class="page-title"><?php
				
				/*
if ($term->name == '') {
				
				echo 'This is ' . $term->taxonomy;
				}
*/
					printf( __( '%s', 'twentyten' ), '<a href="/lesson_plans/' . $taxonomy->query_var . '">' . $taxonomy->labels->name . ':</a> ' . $term->name);
					
					
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				
				/*get_template_part( 'loop', 'category' ); */
				?>
			
			
			<!-- <pre>Before Query taxonomy: <?php // var_dump($taxonomy); ?></pre> -->
			<?php
			 global $paged, $wp_query, $wp;
			 			 
			 			 			$args = wp_parse_args($wp->matched_query);
			 			 
			 			 			if ( !empty ( $args['paged'] ) && 0 == $paged ) {
			 			 						
			 			 								  $wp_query->set('paged', $args['paged']);
			 			 						
			 			 								  $paged =  1;// $args['paged'];
			 			 						
			 			 								}
			 			 
			 			 			$temp = $wp_query;
			 			 
			 			 			$wp_query= null;
			


			$wp_query = new WP_Query();
			$args_2 = array(
			'is_paged' => true,
			'paged' => $paged,
			'posts_per_page' => 12,
			$taxonomy->query_var => $term->slug
			);

			$wp_query->query($args_2);
			?>
			<!-- <pre><?php // var_dump($wpdb); ?></pre>
					<pre><?php // var_dump($wp_rewrite); ?></pre>
					<pre><?php // var_dump($wp_query); ?></pre>
					<pre><?php // var_dump($term); ?></pre>
					<pre><?php // var_dump($paged); ?></pre>
					<pre><?php // var_dump($taxonomy); ?></pre> -->
			<?php 
			while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
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
<?php  numeric_pagination();  ?>

<!-- <div class="navigation">



	<div class="alignleft"><?php previous_posts_link('&laquo; Previous') ?></div>



	<div class="alignright"><?php next_posts_link('More &raquo;') ?></div>



</div> -->


<?php $wp_query = null; $wp_query = $temp; ?>		
			
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
