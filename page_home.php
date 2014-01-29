<?php
/*
Template Name: Home
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
			<div id="content_alt" role="main">

<h2 class="page-title">Welcome to HaringKids Lesson Plans</h2>
<h3>Introduction and Recent Lessons</h3>
<a class="backward">prev</a>
<div class="images">

<?php


$query = array(
'posts_per_page' => 6,
'post_type' => 'post',
'orderby' => 'post_date',
'order' => 'DESC'
);
$wp_query = new WP_Query($query);

while ($wp_query->have_posts()) : $wp_query->the_post(); ?>


<!-- first slide -->
	<div>
	
		

		<h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
		<p>
		<?php the_post_thumbnail('medium', array( 'class' => 'alignleft' )); ?>		<?php
					if(get_post_meta($post->ID, "_dwdescription_value", $single = true) != "") : ?>
					<?php echo get_post_meta($post->ID, "_dwdescription_value", $single = true);?>
								
					<?php endif; ?> </p>
				</div>
<?php endwhile; 
wp_reset_query();?>
</div>

<!-- "next slide" button -->
<a class="forward">next</a><p>

<!-- the tabs -->
<div class="slidetabs">

	<a href="#"></a>
	<a href="#"></a>
	<a href="#"></a>
	<a href="#"></a>
	<a href="#"></a>
	<a href="#"></a>


	<!--
<a href="#"></a>
	<a href="#"></a>
-->
</div>

<div style="clear:both;margin:30px 0;padding-right:40px;margin-left:305px;">

<button onClick='jQuery(".slidetabs").data("slideshow").play();'>Play</button>
<button onClick='jQuery(".slidetabs").data("slideshow").stop();'>Stop</button>
</div>


<script language="JavaScript">
// What is $(document).ready ? See: http://flowplayer.org/tools/documentation/basics.html#document_ready
jQuery.noConflict();
jQuery(function()  {

jQuery(".slidetabs").tabs(".images > div", {

	// enable "cross-fading" effect
	effect: 'fade',
	fadeOutSpeed: "slow",
	
	// start from the beginning after the last tab
	rotate: true

// use the slideshow plugin. It accepts its own configuration
}).slideshow({autoplay:true});
});
</script>

				

			</div> <!-- #content_alt -->
			<div id = "content">
			
			<?php
$posts = query_posts($query_string.'pagename=home'); 
if ( have_posts() ) :
    the_post();
  ?>

		

		<h3><?php /* the_title() */ ?></h3>
		<p>
		<?php the_content(); ?>
								
					 </p>
					 <?php endif; ?>
			</div>
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
