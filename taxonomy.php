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
					printf( __( '%s', 'twentyten' ), '<h2><a href="/lesson_plans/' . $taxonomy->query_var . '">' . $taxonomy->labels->name . '</a>: ' . $term->name . '</h2>' );
					
					
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
