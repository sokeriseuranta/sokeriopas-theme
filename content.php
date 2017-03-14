<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Deeblogi
 */
?>
<?php global $deeblogi_post_index; ?>

<article id="post-<?php the_ID(); ?>" class="<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>featured-post<?php endif; ?>">
	
	<div class="post_content">
		<header class="entry-header">
			<?php if ( $paged == 0 && $deeblogi_post_index <= 1) : ?>
				<?php the_post_thumbnail(); ?>
			<?php endif; ?>
		
			<?php if ( is_single() ) : ?>
				<h2 class="entry-title"><?php the_title(); ?></h2> 
			<?php else : ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php endif; // is_single() ?>
			
			<p class="post-meta"><i class="glyphicon glyphicon-calendar"></i> <?php echo get_the_date(); ?> | <i class="glyphicon glyphicon-comment"></i> <a href="<?php comments_link(); ?> "><?php echo comments_number(); ?></a> </p>
			
		</header>
		
		<?php
			if ( is_single() ) {
				the_content();
			}
			else {	
				echo '<div class="post_excerpt">';
				
				if ( $paged == 0 && $deeblogi_post_index <= 1 ) {
					the_content();
					}
				else {
					the_excerpt();
					echo '<p style="text-align: center;"><a href="' . get_the_permalink()  . '">Lue koko juttu <i class="fa fa-angle-double-right"></i></a></p>';
				}
				
				echo '<p style="text-align: center;"><i class="fa fa-ellipsis-h"></i></p>';
				echo '</div>';
			}
		?>
		
		<div class="post_footer">
			
			
			<?php if ( !is_single()) : ?>
				<div class="post_meta">
					<a href="<?php comments_link(); ?> "><?php echo comments_number(); ?></a> | <a href="<?php comments_link(); ?> ">Kommentoi <i class="fa fa-angle-double-right"></i></a>
				</div>
				
			<?php endif; ?>	
			
			<br>
			<div class="post_meta"> 
				<strong>Aihepiirit:</strong> <?php the_category(", "); ?>
			</div>
			<div class="post_meta">
				<?php the_tags("<strong>Asiasanat:</strong> ", ", "); ?>
			</div>
			<br>
			<?php if ( is_single()) : ?>
			
				 <?php 
					if ( function_exists('wp_related_posts') ) {
						wp_related_posts();
					}
				?>
			
				<?php dynamic_sidebar('lifter-sidebar-1'); ?>
			<?php endif; ?>	
		</div>
		
		<?php comments_template( '', true ); ?>
		
		<?php if (is_single()) : ?>
			<?php //get_template_part('author-info-row', ''); ?>
			<div class="single-post-nav">
				
				<hr>
				<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '<i class="fa fa-arrow-left"></i>', 'Previous post link', 'deeblogi' ) . '</span> %title' ); ?></div>
				
				<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '<i class="fa fa-arrow-right"></i>', 'Next post link', 'deeblogi' ) . '</span>' ); ?></div>
				<div style="clear:both"></div>
				<hr>
			</div>
			
			
			
		<?php endif; ?>
		
	</div>
	
	
	<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'deeblogi' ), 'after' => '</div>' ) ); ?>
	
	
</article><!-- #post -->

<hr class="post-divider">	