<?php
// debug.php by wjm <776a6d # gmail.com>

add_action( 'template_include', '_childtheme_print_template_name' );
function _childtheme_print_template_name( $template_name ) {
	global $childtheme_template_name;
	$childtheme_template_name = $template_name;
	add_action( 'wp_footer', 'childtheme_print_template_name', 100 );
	return $template_name;
}

function childtheme_print_template_name( ) {
	global $childtheme_template_name, $wp_query, $wp_options;
	echo "
<!-- 
DEBUG INFO:
Active Template: ".$childtheme_template_name."\n";
	childtheme_print_matched_rewrite_rule();
	echo 'posts_per_page (default option) = '.get_option( 'posts_per_page' )."\n";
	echo "\n\nWP_QUERY: ";
	print_r($wp_query);
	echo '-->';
}

function childtheme_print_matched_rewrite_rule() {
	global $wp, $wp_rewrite;
	echo "\nREWRITE RULES: \n";
	echo 'matched_rule: '.$wp->matched_rule."\n";
	echo 'matched_query: '.$wp_rewrite->rules[$wp->matched_rule]."\n";
	echo 'matched_query (evaluated): '.$wp->matched_query."\n";
	print_r($wp_rewrite);
}

?>