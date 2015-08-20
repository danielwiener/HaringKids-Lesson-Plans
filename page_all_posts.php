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

<h1 class="page-title">Lessons by Title</h1>


<?php
/*
global $wp_query;
var_dump($wp_query);
*/

$wp_query = new WP_Query();
$wp_query->query('caller_get_posts=1&orderby=post_date&order=DESC&posts_per_page=12&paged='.$paged);


/* foreach($myposts as $post) : */
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
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

<?php numeric_pagination(); ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
