<?php
/*
Template Name: All Posts
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

<?php get_header(); ?>
		<div id="container">
			<div id="content" role="main">

<h2>Lessons by Title</h2>

<ul>
<?php
/*
global $wp_query;
var_dump($wp_query);
*/
/*
$myposts = get_posts('numberposts=-1&offset=$debut');
var_dump($myposts);
*/
$wp_query = new WP_Query();
$wp_query->query('caller_get_posts=1&orderby=post_date&order=DESC&posts_per_page=2&paged='.$paged);

/* foreach($myposts as $post) : */
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li> 
<?php /* endforeach; */ ?>
<?php endwhile; ?>
</ul>
<?php numeric_pagination(); ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
