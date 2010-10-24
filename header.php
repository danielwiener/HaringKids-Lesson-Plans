<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage HaringKids Database -> Twenty_Ten
 * @since HaringKids .1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

	?></title>
	<?php wp_enqueue_script("jquery"); ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
	<?php if( is_home() || is_front_page() ): ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/tabs_slideshow.css" />
	<?php endif; ?>
	
	

	
	
	
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	/*
if ( is_singular() && get_option( 'thread_comments' ) ):
		wp_enqueue_script( 'comment-reply' );
		endif;
*/
	 ?>
	 

	

   <?php

	wp_head();?>
	<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery.tools.min.js"></script>



</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<div id="dw_branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
				</<?php echo $heading_tag; ?>>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>

							</div><!-- #dw_branding -->

			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				
				
				<div class="menu-header"><ul  id="menu-nav-menu" class="menu">
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/curriculum">Curriculum</a><ul  class="submenu">
				<?php $myterms = get_terms('curriculum', 'orderby=name&hide_empty=0'); 

	foreach ($myterms as $myterm){
	echo '<li class="menu-item menu-item-type-taxonomy"><a href="' .get_term_link($myterm->slug,'curriculum') .'">'.$myterm->name . '</a></li>';
	}?>
	</ul></li>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/subject">Subject</a><ul  class="submenu">
				<?php $myterms = get_terms('subject', 'orderby=name&hide_empty=0'); 

	foreach ($myterms as $myterm){
	echo '<li class="menu-item menu-item-type-taxonomy"><a href="' .get_term_link($myterm->slug,'subject') .'">'.$myterm->name . '</a></li>';
	}?>
	</ul></li>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/age_grade">Age/Grade</a><ul  class="submenu">
				<?php $myterms = get_terms('age_grade', 'orderby=name&hide_empty=0'); 

	foreach ($myterms as $myterm){
	echo '<li class="menu-item menu-item-type-taxonomy"><a href="' .get_term_link($myterm->slug,'age_grade') .'">'.$myterm->name . '</a></li>';
	}?>
				</ul></li>
				
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/materials">Materials</a><ul  class="submenu">
				<?php $myterms = get_terms('materials', 'orderby=name&hide_empty=0'); 

	foreach ($myterms as $myterm){
	echo '<li class="menu-item menu-item-type-taxonomy"><a href="' .get_term_link($myterm->slug,'materials') .'">'.$myterm->name . '</a></li>';
	}?>
				</ul></li>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/titles">Titles</a></li>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/contributors">Contributors</a></li>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/location">Locations</a></li>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/institutions">Institutions</a></li>
				<li  class="menu-item menu-item-type-post_type"><a href="/lesson_plans/duration">Duration</a><ul  class="submenu">
				<?php $myterms = get_terms('duration', 'orderby=name&hide_empty=0'); 

	foreach ($myterms as $myterm){
	echo '<li class="menu-item menu-item-type-taxonomy"><a href="' .get_term_link($myterm->slug,'duration') .'">'.$myterm->name . '</a></li>';
	}?>
				</ul></li>

				
				</ul></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
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

