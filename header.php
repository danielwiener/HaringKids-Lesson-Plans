<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title>
	<?php // Returns the title based on what is being viewed
		if ( is_single() ) { // single posts
			single_post_title(); echo ' | '; bloginfo( 'name' );
		// The home page or, if using a static front page, the blog posts page.
		} elseif ( is_home() || is_front_page() ) {
			bloginfo( 'name' );
			if( get_bloginfo( 'description' ) )
				echo ' | ' ; bloginfo( 'description' );
			twentyten_the_page_number();
		} elseif ( is_page() ) { // WordPress Pages
			single_post_title( '' ); echo ' | '; bloginfo( 'name' );
		} elseif ( is_search() ) { // Search results
			printf( __( 'Search results for %s', 'twentyten' ), '"'.get_search_query().'"' ); twentyten_the_page_number(); echo ' | '; bloginfo( 'name' );
		} elseif ( is_404() ) {  // 404 (Not Found)
			_e( 'Not Found', 'twentyten' ); echo ' | '; bloginfo( 'name' );
		} else { // Otherwise:
			wp_title( '' ); echo ' | '; bloginfo( 'name' ); twentyten_the_page_number();
		}
	?>
	</title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */

	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
				</<?php echo $heading_tag; ?>>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>

				<?php
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : ?>
						<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
					<?php endif; ?>
			</div><!-- #branding -->

			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
				
				<div class="menu-header"><ul  id="menu-nav-menu" class="menu">
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/curriculum">Curriculum</a></li>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/subject">Subject</a><ul  class="submenu">
				<?php $myterms = get_terms('subject', 'orderby=name&hide_empty=0'); 

	foreach ($myterms as $myterm){
	echo '<li class="menu-item menu-item-type-taxonomy"><a href="' .get_term_link($myterm->slug,'subject') .'">'.$myterm->name . '</a></li>';
	}?>
	</ul>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/age_grade">Age/Grade</a><ul  class="submenu">
				<?php $myterms = get_terms('age_grade', 'orderby=name&hide_empty=0'); 

	foreach ($myterms as $myterm){
	echo '<li class="menu-item menu-item-type-taxonomy"><a href="' .get_term_link($myterm->slug,'age_grade') .'">'.$myterm->name . '</a></li>';
	}?>
				</ul></li>
				
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/materials">Materials</a></li>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/titles">Titles</a></li>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/teachers">Teachers</a></li>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/location">Locations</a></li>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/institutions">Institutions</a></li>

				
				</ul></div>
			</div><!-- #access -->
		</div><!-- #masthead -->
	</div><!-- #header -->

	<div id="main">
	<?php /*
$myterms = get_terms('subject', 'orderby=name&hide_empty=0'); 
	var_dump($myterms);
	
	echo $myterms->name . '<br>';
	foreach ($myterms as $myterm){
	echo '<li>'.$myterm->name . '</li>';
	}
	$my_list = get_the_term_list($post->ID);
	echo '<br><br>';
	var_dump($my_list);
	echo '<br><br>';
	var_dump(the_taxonomies());
	echo '<br><br>';
	var_dump(get_taxonomies());
	echo '<br><br>';
*/
	/*
global $wpdb;
	var_dump(get_term($wpdb, 'subject'));*/
	
	/* echo get_the_term_list( $post->ID, 'subject', 'Subject: ', ', ', '' );  */

	?>

