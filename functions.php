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
		array( 'hierarchical' => true,
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
		array( 'hierarchical' => true,
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
		array( 'hierarchical' => true,
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
		array( 'hierarchical' => true,
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

	$labels = array(
    'name' => _x( 'Locations', 'taxonomy general name' ),
    'singular_name' => _x( 'Location', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Locations' ),
    'popular_items' => __( 'Popular Locations' ),
    'all_items' => __( 'All Locations' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Locations' ), 
    'update_item' => __( 'Update Locations' ),
    'add_new_item' => __( 'Add New Location' ),
    'new_item_name' => __( 'New Location Name' ),
  );
	
	register_taxonomy(
	'location',
	'post',
		array( 'hierarchical' => true,
		'labels' => $labels,
		'_builtin' => false,
		'query_var' => true,
		'show_ui' => true,
		'rewrite' => true ) );   
 

	
	$labels = array(
    'name' => _x( 'Duration', 'taxonomy general name' ),
    'singular_name' => _x( 'Duration', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Duration' ),
    'popular_items' => __( 'Popular Durationss' ),
    'all_items' => __( 'All Durations' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Durations' ), 
    'update_item' => __( 'Update Durations' ),
    'add_new_item' => __( 'Add New Duration' ),
    'new_item_name' => __( 'New Duration Name' ),
  );
	
	register_taxonomy(
	'duration',
	'post',
		array( 'hierarchical' => true,
		'labels' => $labels,
		'_builtin' => false,
		'query_var' => true,
		'show_ui' => true,
		'rewrite' => true ) );   
 
	}
	
	/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
	add_action( 'after_setup_theme', 'twentyten_setup' );

	if ( ! function_exists( 'twentyten_setup' ) ):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 *
	 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
	 * functions.php file.
	 *
 		* When using a child theme (see http://codex.wordpress.org/Theme_Development and
		* http://codex.wordpress.org/Child_Themes), you can override certain functions
		* (those wrapped in a function_exists() call) by defining them first in your child theme's
		* functions.php file. The child theme's functions.php file is included before the parent
		* theme's file, so the child theme functions would be used.
		* http://ideapress.googlecode.com/svn-history/r9/trunk/functions.php
		*
	 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
	 * @uses register_nav_menus() To add support for navigation menus.
	 * @uses add_custom_background() To add support for a custom background.
	 * @uses add_editor_style() To style the visual editor.
	 * @uses load_theme_textdomain() For translation/localization support.
	 * @uses add_custom_image_header() To add support for a custom header. DW - GOT RID OF THIS.
	 * @uses register_default_headers() To register the default custom header images provided with the theme.  DW - GOT RID OF THIS.
	 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.  DW - GOT RID OF THIS, THOUGH I MADE MY OWN LOWER DOWN IN THE 
	 *
	 * @since Twenty Ten 1.0
	 */
	function twentyten_setup() {

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		// This theme uses post thumbnails
		add_theme_support( 'post-thumbnails' );

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Make theme available for translation
		// Translations can be filed in the /languages/ directory
		load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );

		$locale = get_locale();
		$locale_file = TEMPLATEPATH . "/languages/$locale.php";
		if ( is_readable( $locale_file ) )
			require_once( $locale_file );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Navigation', 'twentyten' ),
		) );

		// This theme allows users to set a custom background
		add_custom_background();

	
	}
	endif;
	
	
	
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

/* Adding my own quicktags script for multiple instances of custom metatags *******************************************

*/
add_action('admin_print_scripts', 'dw_quicktags');
function dw_quicktags() {
	wp_enqueue_script(
		'dw_quicktags',
		'/wp-content/themes/lesson_plans/js/dw_quicktags.js'
	);
}

/* Numeric Pagination *******************************************

This if from the Gravy template by Darren Hoyt. http://www.darrenhoyt.com 
*/

function numeric_pagination ($pageCount = 5, $query = null) {

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

/**
 * Makes some changes to the <title> tag, by filtering the output of wp_title().
 *
 * If we have a site description and we're viewing the home page or a blog posts
 * page (when using a static front page), then we will add the site description.
 *
 * If we're viewing a search result, then we're going to recreate the title entirely.
 * We're going to add page numbers to all titles as well, to the middle of a search
 * result title and the end of all other titles.
 *
 * The site title also gets added to all titles.
 *
 * @since Twenty Ten 1.0
 *
 * @param string $title Title generated by wp_title()
 * @param string $separator The separator passed to wp_title(). Twenty Ten uses a
 * 	vertical bar, "|", as a separator in header.php.
 * @return string The new title, ready for the <title> tag.
 */
function twentyten_filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'twentyten' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'twentyten_filter_wp_title', 10, 2 );


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
echo '	<script type="text/javascript">dw_edToolbar("' . $textarea_id . '")</script>';
echo '<textarea rows="6" class="form-input-tip" cols="80" name="'.$meta_box['name'].'_value" tabindex="' . $tab_index_count . '" id="' . $textarea_id . '" style="width: 97%">';
echo wpautop($meta_box_value);
echo '</textarea>';
/*echo 'edCanvas = document.getElementById("' . $textarea_id . '");</script>'; */
/* echo 'console.log(edToolbar())</script>';  */
echo '</div><hr width="60%"';
$tab_index_count++;
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


// search filter


function custom_search_join($join) {
    if ( is_search() && isset($_GET['s'])) {
        global $wpdb;

       $join = " LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id ";
    }
    return($join);
}
add_filter('posts_join', 'custom_search_join');

function custom_search_groupby($groupby) {
    if ( is_search() && isset($_GET['s'])) {
        global $wpdb;
        $groupby = " $wpdb->posts.ID ";
    }
    return($groupby);
}
add_filter('posts_groupby', 'custom_search_groupby');

function custom_search_where($where) {
    $old_where = $where;
    if (is_search() && isset($_GET['s'])) {
        global $wpdb;
        $customs = Array('_dwdescription_value', '_objective_value', '_materials_value', '_procedure_value', '_questions_value', '_resources_value', '_extensions_value');
        $query = '';
        $var_q = stripslashes($_GET['s']);
        if ($_GET['sentence']) {
            $search_terms = array($var_q);
        }
        else {
            preg_match_all('/".*?("|$)|((?<=[\\s",+])|^)[^\\s",+]+/', $var_q, $matches);
            $search_terms = array_map(create_function('$a', 'return trim($a, "\\"\'\\n\\r ");'), $matches[0]);
        }
        $n = ($_GET['exact']) ? '' : '%';
        $searchand = '';
        foreach((array)$search_terms as $term) {
            $term = addslashes_gpc($term);
            $query .= "{$searchand}(";
                        $query .= "($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
            $query .= " OR ($wpdb->posts.post_content LIKE '{$n}{$term}{$n}')";
            foreach($customs as $custom) {
                $query .= " OR (";
                $query .= "($wpdb->postmeta.meta_key = '$custom')";
                $query .= " AND ($wpdb->postmeta.meta_value  LIKE '{$n}{$term}{$n}')";
                $query .= ")";
            }
            $query .= ")";
            $searchand = ' AND ';
        }
        $term = $wpdb->escape($var_q);
        if (!$_GET['sentense'] && Count($search_terms) > 1 && $search_terms[0] != $var_q) {
            $search .= " OR ($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
            $search .= " OR ($wpdb->posts.post_content LIKE '{$n}{$term}{$n}')";
        }

        if (!empty($query)) {
            $where = " AND ({$query}) AND ($wpdb->posts.post_status = 'publish')  AND ($wpdb->posts.post_type = 'post') ";
        }
    }

    return($where);
}
add_filter('posts_where', 'custom_search_where');

// add google analytics to footer
function add_google_analytics() {
echo '<script type="text/javascript">';
echo "\n";
echo '  var _gaq = _gaq || [];';
echo '  _gaq.push(["_setAccount", "UA-17868145-1"]);';
echo '  _gaq.push(["_trackPageview"]);';
echo "\n";
echo '  (function() {';
echo '    var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;';
echo '    ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";';
echo '    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);';
echo '  })();';
echo "\n";
echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');


/*
function my_search_filter($query) {
   if ($query->is_search) {
      $query->set('post_type','post');
   }
   return $query;
}
add_filter('pre_get_posts','my_search_filter');
*/
// require( get_stylesheet_directory() . '/debug.php' );
?>