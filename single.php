<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="nav-above" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div><!-- #nav-above -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="page-title"><?php the_title(); ?></h1>

					<div id="dw_author">
					<p>by <?php the_author_posts_link(); ?></p>
					</div><!-- #dw_author -->

					<div class="entry-content"><?php
				$curriculum_list = get_the_term_list( $post->ID, 'curriculum', '<strong>Curriculum:</strong> ', ', ', '' );  
				$age_grade_list = get_the_term_list( $post->ID, 'age_grade', '<strong>Age/Grade:</strong> ', ', ', '' );
				$subject_list = get_the_term_list( $post->ID, 'subject', '<strong>Subject:</strong> ', ', ', '' );
				$materials_list = get_the_term_list( $post->ID, 'materials', '<strong>Materials:</strong> ', ', ', '' );
				$institution_list = get_the_term_list( $post->ID, 'institutions', '<strong>Institution:</strong> ', ', ', '' );
				$location_list = get_the_term_list( $post->ID, 'location', '<strong>Location:</strong> ', ', ', '' );
				$duration_list = get_the_term_list( $post->ID, 'duration', '<strong>Duration:</strong> ', ', ', '' );
				
				?>
				
						
						<?php if(has_post_thumbnail()): ?>
			<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('large',  array('title' => trim(strip_tags($post->post_title)), 'alt' => trim(strip_tags($post->post_title)))); 
			?>
			</a>
			<?php
			if(!empty($post->post_content)) : ?>
						<p><a href="#more_images">View More Images</a></p>
						<?php endif; ?>
			<?php endif; ?>
			<h2>Categories</h2>
			<ul>
				<li><?php echo $curriculum_list; ?></li>
				<li><?php echo $age_grade_list; ?></li>
				<li><?php echo $subject_list; ?></li>
				<li><?php echo $materials_list; ?></li>
				<li><?php echo $institution_list; ?></li>
				<li><?php echo $location_list; ?></li>
				<li><?php echo $duration_list; ?></li>
				</ul>			
						
						 
						 <?php
						if(get_post_meta($post->ID, "_dwdescription_value", $single = true) != "") : ?>
						<h2>Description</h2><p><?php echo get_post_meta($post->ID, "_dwdescription_value", $single = true);?></p>
						<?php endif; ?>
						<?php
						if(get_post_meta($post->ID, "_objective_value", $single = true) != "") : ?>
						<h2>Objective</h2><p><?php echo get_post_meta($post->ID, "_objective_value", $single = true);?></p>
						<?php endif; ?>
						<?php
						if(get_post_meta($post->ID, "_resources_value", $single = true) != "") : ?>
						<h2>Resources</h2><p><?php echo get_post_meta($post->ID, "_resources_value", $single = true);?></p>
						<?php endif; ?>
						<?php
						if(get_post_meta($post->ID, "_materials_value", $single = true) != "") : ?>
						<h2>Materials</h2><p><?php echo get_post_meta($post->ID, "_materials_value", $single = true);?></p>
						<?php endif; ?>
						<?php
						if(get_post_meta($post->ID, "_procedure_value", $single = true) != "") : ?>
						<h2>Procedure</h2><p><?php echo get_post_meta($post->ID, "_procedure_value", $single = true);?></p>
						<?php endif; ?>
						<?php
						if(get_post_meta($post->ID, "_questions_value", $single = true) != "") : ?>
						<h2>Questions</h2><p><?php echo get_post_meta($post->ID, "_questions_value", $single = true);?></p>
						<?php endif; ?>
						<?php
						if(get_post_meta($post->ID, "_extensions_value", $single = true) != "") : ?>
						<h2>Extensions</h2><p><?php echo get_post_meta($post->ID, "_extensions_value", $single = true);?></p>
						<?php endif; ?>
						<?php
						if(!empty($post->post_content)) : ?>
						<a name="more_images">&nbsp;</a>
						<h2>Images</h2>
						<?php the_content(); ?>
						<?php endif; ?>
						
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<?php if (the_author_image()): ?>
						<div id="author-avatar">
							<?php the_author_image(); ?> 
						</div><!-- #author-avatar -->
						<?php endif ?>
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

					<div class="entry-utility">
					&nbsp;
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div><!-- #nav-below -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
