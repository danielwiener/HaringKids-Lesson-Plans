<?php

// Custom Taxonomy Code  
add_action( 'init', 'build_taxonomies', 0 );  
 
	function build_taxonomies() {  
	
	 $labels = array(
    'name' => _x( 'Curriculum', 'taxonomy general name' ),
    'singular_name' => _x( 'Curriculum', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Curriculum' ),
    'popular_items' => __( 'Popular Curriculum' ),
    'all_items' => __( 'All Curriculum' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Curriculum' ), 
    'update_item' => __( 'Update Curriculum' ),
    'add_new_item' => __( 'Add Curriculum' ),
    'new_item_name' => __( 'New Curriculum Name' ),
  ); 

	register_taxonomy(
	'curriculum',
	'post',
		array( 'hierarchical' => false,
		'labels' => $labels,
		'_builtin' => false,
		'query_var' => true,
		'show_ui' => true,
		'public' => true,
		'show_in_nav_menus' => true,
		'rewrite' => array( 'slug' => 'curriculum' ) ) );
		
	$labels = array(
    'name' => _x( 'Age/Grade', 'taxonomy general name' ),
    'singular_name' => _x( 'Age/Grade', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Age/Grade' ),
    'popular_items' => __( 'Popular Age/Grade' ),
    'all_items' => __( 'All Age/Grade' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Age/Grade' ), 
    'update_item' => __( 'Update Age/Grade' ),
    'add_new_item' => __( 'Add Age/Grade' ),
    'new_item_name' => __( 'New Age/Grade Name' ),
  ); 
		
	register_taxonomy(
	'age_grade',
	'post',
		array( 'hierarchical' => false,
		'labels' => $labels,
		'_builtin' => false,
		'query_var' => true,
		'show_ui' => true,
		'rewrite' => true ) );
		
			$labels = array(
    'name' => _x( 'Subject', 'taxonomy general name' ),
    'singular_name' => _x( 'Subject', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Subjects' ),
    'popular_items' => __( 'Popular Subjects' ),
    'all_items' => __( 'All Subjects' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Subject' ), 
    'update_item' => __( 'Update Subject' ),
    'add_new_item' => __( 'Add New Subject' ),
    'new_item_name' => __( 'New Subject Name' ),
  ); 
		
	register_taxonomy(
	'subject',
	'post',
		array( 'hierarchical' => false,
		'labels' => $labels,
		'_builtin' => false,
		'query_var' => true,
		'show_ui' => true,
		'rewrite' => true ) );
		
	$labels = array(
    'name' => _x( 'Materials', 'taxonomy general name' ),
    'singular_name' => _x( 'Material', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Materials' ),
    'popular_items' => __( 'Popular Materials' ),
    'all_items' => __( 'All Materials' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Material' ), 
    'update_item' => __( 'Update Material' ),
    'add_new_item' => __( 'Add New Material' ),
    'new_item_name' => __( 'New Material Name' ),
  ); 
		
	register_taxonomy(
	'materials',
	'post',
		array( 'hierarchical' => false,
		'labels' => $labels,
		'_builtin' => false,
		'query_var' => true,
		'show_ui' => true,
		'rewrite' => true ) );
		
	$labels = array(
    'name' => _x( 'Institutions', 'taxonomy general name' ),
    'singular_name' => _x( 'Institution', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Institutions' ),
    'popular_items' => __( 'Popular Institutions' ),
    'all_items' => __( 'All Institutions' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Institution' ), 
    'update_item' => __( 'Update Institution' ),
    'add_new_item' => __( 'Add New Institution' ),
    'new_item_name' => __( 'New Institution Name' ),
  ); 
		
	register_taxonomy(
	'institutions',
	'post',
		array( 'hierarchical' => true,
		'labels' => $labels,
		'_builtin' => false,
		'query_var' => true,
		'show_ui' => true,
		'rewrite' => true ) ); 
		
	register_taxonomy(
	'location',
	'post',
		array( 'hierarchical' => true,
		'label' => 'Locations',
		'query_var' => true,
		'rewrite' => true ) );   
 
	}
		


/* Numeric Pagination *******************************************

This if from the Gravy template by Darren Hoyt. http://www.darrenhoyt.com 
*/

function numeric_pagination ($pageCount = 2, $query = null) {

	if ($query == null) {
		global $wp_query;
		$query = $wp_query;
	}
	
	if ($query->max_num_pages <= 1) {
		return;
	}

	$pageStart = 1;
	$paged = $query->query_vars['paged'];
	
	// set current page if on the first page
	if ($paged == null) {
		$paged = 1;
	}
	
	// work out if page start is halfway through the current visible pages and if so move it accordingly
	if ($paged > floor($pageCount / 2)) {
		$pageStart = $paged	- floor($pageCount / 2);
	}

	if ($pageStart < 1) {
		$pageStart = 1;
	}

	// make sure page start is 
	if ($pageStart + $pageCount > $query->max_num_pages) {
		$pageCount = $query->max_num_pages - $pageStart;
	}
	
?>
	<div id="archive_pagination">
<?php
	if ($paged != 1) {
?>
	<a href="<?php echo get_pagenum_link(1); ?>" class="numbered page-number-first"><span>&lsaquo; <?php _e('Newest', 'twentyten'); ?></span></a>
<?php
	}
	// first page is not visible...
	if ($pageStart > 1) {
		//echo 'previous';
	}
	for ($p = $pageStart; $p <= $pageStart + $pageCount; $p ++) {
		if ($p == $paged) {
?>
		<span class="numbered page-number-<?php echo $p; ?> current-numeric-page"><?php echo $p; ?></span>
<?php } else { ?>
		<a href="<?php echo get_pagenum_link($p); ?>" class="numbered page-number-<?php echo $p; ?>"><span><?php echo $p; ?></span></a>

<?php
		}
	}
	// last page is not visible
	if ($pageStart + $pageCount < $query->max_num_pages) {
		//echo "last";
	}
	if ($paged != $query->max_num_pages) {
?>
		<a href="<?php echo get_pagenum_link($query->max_num_pages); ?>" class="numbered page-number-last"><span><?php _e('Oldest', 'gravy'); ?> &rsaquo;</span></a>
<?php } ?>
	
	</div>

<?php } ?>