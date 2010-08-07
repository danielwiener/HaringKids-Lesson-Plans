<?php
/*
Template Name: Advanced Search
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
<div id="post">
<?php  if (!empty($_GET)): ?>

	
<?php

$query = "SELECT wpost.*, rel1.object_id, ";
$list_of_term_ids = $_GET;
$rel_count = 1;
$inner_join = '';
$select_list = '';
$term_ids_equal_to = '';
foreach ($list_of_term_ids as $term_key => $term_value) {
if($term_key == 's') {
} else {
	$select_list .= "rel{$rel_count}.term_taxonomy_id, ";
	$term_ids_equal_to .= "and rel{$rel_count}.term_taxonomy_id = $term_value ";
	
	if ($rel_count > 1) {
		$inner_join .= "INNER JOIN $wpdb->term_relationships rel{$rel_count} ON rel1.object_id = rel{$rel_count}.object_id ";
	}
	$rel_count++;
}
}
$select_list = substr($select_list,0,-2);
$query .= $select_list;
$query .= " FROM $wpdb->posts as wpost";
$query .= " ";
$query .= "INNER JOIN $wpdb->term_relationships rel1 ON ( wpost.ID = rel1.object_id ) ";
$query .= $inner_join;
$query .= " ";
$query .= $term_ids_equal_to;
// echo $query;

$my_posts=$wpdb->get_results($query, OBJECT);
if ($wpdb->num_rows > 0):?>
	
	<h1 class="page-title">Lessons Found</h1>
	<p><a href="/lesson_plans/advanced-search" title="Advanced Search">Search Again</a></p>
<?php else: ?>

<h1 class="page-title">No Lessons Found</h1>
<p>Try your search again.</p>
<div class="entry-summary">
<?php include(STYLESHEETPATH . '/includes/advanced_search_form.php'); ?>
</div> 
<?php endif;

if ($my_posts) :
  foreach($my_posts as $post) :
    setup_postdata($post);
    ?>
   
		<h3 class="toc_title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>


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
  <?php endforeach;
		endif; //end if my_posts
		
elseif(empty($_GET)):
?>	
<h1 class="page-title">Advanced Search</h1>
	<div class="entry-summary">
	<?php include(STYLESHEETPATH . '/includes/advanced_search_form.php'); ?>
	</div>
<?php endif; ?>
<div class="entry-utility">
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
