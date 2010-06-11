<?php
/*
Template Name: List of Taxonomies
*/

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php get_header(); 
/* $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); */
global $post;
$page = get_page($post->ID);
echo '<br><br>';
global $taxonomy;
$taxonomy = get_taxonomy($page->post_name);
/* var_dump($taxonomy); */
?>
		<div id="container">
			<div id="content" role="main">

<?php printf( __( '%s', 'twentyten' ), '<h2>' . $taxonomy->labels->name . '</h2>' ); 
/* var_dump($taxonomy); */ ?>
<ul>
<?php $myterms = get_terms($taxonomy->name, 'orderby=name&hide_empty=0'); 

	foreach ($myterms as $myterm){
	echo '<li ><a href="' .get_term_link($myterm->slug,$taxonomy->name) .'">'.$myterm->name . '</a></li>';
	}?>
</ul>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
