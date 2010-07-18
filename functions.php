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
	
/* setting post thumbnails AND some extra sizes*/	
if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default thumbnail size
	add_image_size('small-thumbnail', 100, 100, true); // for TOC page thumbnails
	//add_image_size('single-post-thumbnail', 300, 180);  a different thumbnail size on single post pages
}
/* DW version of twentyten_posted_on, see twenty_ten functions.php for original*/
if ( ! function_exists( 'dw_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function dw_posted_on() {
	echo  the_author();
	
	
}
endif;


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
<?php } /* end of pagination */


/* Begin Meta Boxes */
$new_meta_boxes =  
array(  
"dwdescription" => array(  
"name" => "_dwdescription",  
"std" => "",  
"title" => "Description",  
"description" => "Write the Description"),
"objective" => array(  
"name" => "_objective",  
"std" => "",  
"title" => "Objective",  
"description" => "Write the Objective"),
"resources" => array(  
"name" => "_resources",  
"std" => "",  
"title" => "Resources",  
"description" => "Write the Resources"),
"materials" => array(  
"name" => "_materials",  
"std" => "",  
"title" => "Materials",  
"description" => "Write a list of Materials"),
"procedure" => array(  
"name" => "_procedure",  
"std" => "",  
"title" => "Procedure",  
"description" => "Enter the lesson procedure, step by step."),
"questions" => array(  
"name" => "_questions",  
"std" => "",  
"title" => "Questions",  
"description" => "Enter a list of questions you would like to ask the class."),
"extension" => array(  
"name" => "_extensions",  
"std" => "",  
"title" => "Extensions",  
"description" => "Enter more resources for students to pursue outside of class.")      
); 

function new_meta_boxes() {
global $post, $new_meta_boxes;

$tab_index_count = 30;

foreach($new_meta_boxes as $meta_box) {
$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

$textarea_name = $meta_box['name'];
$textarea_id = str_replace('_', '' , $textarea_name);


if($meta_box_value == "")
$meta_box_value = $meta_box['std'];

echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( basename(__FILE__) ).'" />';

echo '<h3>'. $meta_box['title'] .' - '. $meta_box['description'] .'</h3>';
/* var_dump($new_meta_boxes); */
echo '<div class="">';
echo '	<script type="text/javascript">edToolbar()</script>';
echo '<textarea rows="6" class="form-input-tip" cols="80" name="'.$meta_box['name'].'_value" tabindex="' . $tab_index_count . '" id="' . $textarea_id . '" style="width: 97%">';
echo wpautop($meta_box_value);
echo '</textarea> <script type="text/javascript">';
echo 'edCanvas = document.getElementById("' . $textarea_id . '");</script>';
echo '</div><hr width="60%"';
/* $tab_index_count++; */
}
}
function create_meta_box() {
global $theme_name;
if ( function_exists('add_meta_box') ) {
add_meta_box( 'new-meta-boxes', 'Lesson Plans', 'new_meta_boxes', 'post', 'normal', 'high' );
}
}

function save_postdata( $post_id ) {
global $post, $new_meta_boxes;

foreach($new_meta_boxes as $meta_box) {
// Verify
if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], basename(__FILE__) )) {
return $post_id;
}

if ( 'page' == $_POST['post_type'] ) {
if ( !current_user_can( 'edit_page', $post_id ))
return $post_id;
} else {
if ( !current_user_can( 'edit_post', $post_id ))
return $post_id;
}

$data = $_POST[$meta_box['name'].'_value'];

if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
update_post_meta($post_id, $meta_box['name'].'_value', $data);
elseif($data == "")
delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
}
}
add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');
// end Custom Meta Boxes - Write Panels
// Custom Admin Top Logo
add_action('admin_head', 'my_custom_logo');

function my_custom_logo() {
   echo '<style type="text/css">
         #header-logo { background-image: url('.get_bloginfo('stylesheet_directory').'/assets/haringkids_admin_logo.gif) !important; }</style>';
}

function example_remove_dashboard_widgets() {
	// Globalize the metaboxes array, this holds all the widgets for wp-admin
 	global $wp_meta_boxes;

	// Remove the incomming links widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);	

	// Remove right now
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
}

// Hoook into the 'wp_dashboard_setup' action to register our function
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );

function custom_colors() {
   echo '<style type="text/css">#wphead{background:#FF9900}</style>';
}

add_action('admin_head', 'custom_colors');


function custom_footer() {
echo ('<span id="footer-thankyou">' . __('Dashboard modifications by <a href="http://www.danielwiener.com">Daniel Wiener</a> for <a href="http://www.haringkids.com">HaringKids Lesson Plans</a>').'</span>');
}

add_action('admin_footer_text', 'custom_footer');
?>