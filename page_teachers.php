<?php
/*
Template Name: List of Teachers
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

<h2>Contributors</h2>

<ul>

<?php 
global $authors;
$args = array(
    'optioncount'   => 1); 
wp_list_authors($args);
?>  
</ul>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
