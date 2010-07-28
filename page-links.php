<?php
/*
Template Name: Page of Links
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

<h2>Links</h2>

<ul>

<?php 
/* global $authors; */
$args = array('show_description' => 1,
'between' => '<br />',
'category_order' => 'DESC');
wp_list_bookmarks($args);
?>  
</ul>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
