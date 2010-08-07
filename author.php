<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">

<?php
	/* Queue the first post, that way we know who
	 * the author is when we try to get their name,
	 * URL, description, avatar, etc.
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

				<h1 class="page-title author"><?php printf( __( 'Contributor: %s', 'twentyten' ), "<span class='vcard'><a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a></span>" ); ?></h1>

<?php
// If a user has filled out their description, show a bio on their entries.
if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="entry-author-info">
						<?php if (the_author_image()): ?>
						<div id="author-avatar">
							<?php the_author_image(); ?> 
						</div><!-- #author-avatar -->
						<?php endif ?>
						<div id="author-description">
							<h2><?php printf( __( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<?php $author_stuff = get_the_author_meta('user_email', get_the_author_meta( 'ID' ));
							// echo '<pre>' .var_dump($author_stuff) . '</pre>'; ?>
						</div><!-- #author-description	-->
					</div><!-- #entry-author-info -->
<?php endif; ?>

<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the author archive page to output the authors posts
	 * If you want to overload this in a child theme then include a file
	 * called loop-author.php and that will be used instead.
	 */
	 /*get_template_part( 'loop', 'author' );*/
	 ?>
	<?php while ( have_posts() ) : the_post(); ?>
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

				
			

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
