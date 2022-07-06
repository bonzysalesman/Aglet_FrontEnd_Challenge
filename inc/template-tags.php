<?php
/**
 * Custom template tags for this theme.
 * @package Glauss
 * @since Glauss 1.0
 */


if ( ! function_exists( 'glauss_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since 1.0
 */
function glauss_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
	<nav class="comment-navigation" role="navigation">
		<ul class="pager">
			<?php
			if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'glauss' ) ) ) :
				printf( '<li class="nav-previous previous">%s</li>', $prev_link );
			endif;

			if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments ', 'glauss' ) ) ) :
				printf( '<li class="nav-next next">%s</li>', $next_link );
			endif;
			?>
		</ul><!-- .nav-links -->
	</nav><!-- end .navigation -->
	<?php
	endif;
}
endif; // glauss_comment_nav


if ( ! function_exists( 'glauss_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since 1.0
 */
function glauss_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo esc_attr( $nav_class ); ?>" role="navigation">
		<ul class="pager">

			<?php if ( is_single() ) : // navigation links for single posts ?>

<?php previous_post_link( '<li class="nav-previous previous">%link</li>', '<span class="meta-nav">' . esc_html__('Previous', 'glauss' ) . '</span>' ); ?>
<?php next_post_link( '<li class="nav-next next">%link</li>', ' <span class="meta-nav">' . esc_html__('Next', 'glauss' ) . '</span>' ); ?>

			<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

				<?php if ( get_next_posts_link() ) : ?>
					<li class="nav-previous previous"><?php next_posts_link( esc_html__( '<span class="meta-nav">&larr;</span> Older posts', 'glauss' ) ); ?></li>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
					<li class="nav-next next"><?php previous_posts_link( esc_html__( 'Newer posts <span class="meta-nav">&rarr;</span>', 'glauss' ) ); ?></li>
				<?php endif; ?>

			<?php endif; ?>

		</ul>
	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // glauss_content_nav


if ( ! function_exists( 'glauss_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since 1.0
 */
function glauss_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation">
		<h3 class="screen-reader-text"><?php esc_html__( 'Post navigation', 'glauss' ); ?></h3>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', esc_html__('Previous', 'glauss' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     esc_html__('Next', 'glauss' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif; // glauss_post_nav


if ( ! function_exists( 'glauss_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * 
 * @since 1.0
 */
function glauss_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'glauss' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'glauss' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<ul class="footer-blog-ic"><li class="posted-on">' . $posted_on . '</li><li class="byline"> ' . $byline . '</li></ul>'; // WPCS: XSS OK.

}
endif; // glauss_posted_on



if ( ! function_exists( 'glauss_entry_footer' ) ) :

function glauss_entry_footer() {

	if ( 'post' == get_post_type() ) {

		$categories_list = get_the_category_list( esc_html__( ', ', 'glauss' ) );
		if ( $categories_list && glauss_categorized_blog()) { ?>
			<span class="cat-links">
				<?php printf( esc_html__( 'Categories %1$s ', 'glauss' ), $categories_list ); ?>
			</span>
		<?php } 

		$tags_list = get_the_tag_list( '', esc_html__( ' ', 'glauss' ) );
		if ( $tags_list ) { ?>
			<span class="tags-links">
				<?php printf( esc_html__( 'Tags %1$s ', 'glauss' ), $tags_list ); ?>
			</span>
		<?php }

	} // get_post_type

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
		<span class="comments-link">
			<?php comments_popup_link( esc_html__( 'Leave a comment ', 'glauss' ), esc_html__( '1 Comment', 'glauss' ), esc_html__( '% Comments ', 'glauss' ) ); ?>
		</span>
	<?php }
}
endif; // glauss_entry_footer


if ( ! function_exists( 'glauss_link_format_helper' ) ) :
/**
 * Returns the first post link and/or post content without the link.
 * Used for the "Link" post format.
 *
 * @since 1.0
 */
function glauss_link_format_helper( $output = false ) {

	if ( ! $output )
		_doing_it_wrong( __FUNCTION__, esc_html__( 'You must specify the output you want - either "link" or "post_content".', 'glauss' ), '1.0.1' );

	$post_content = get_the_content();
	$link_start = stristr( $post_content, "http" );
	$link_end = stristr( $link_start, "\n" );

	if ( ! strlen( $link_end ) == 0 ) {
		$link_url = substr( $link_start, 0, -( strlen( $link_end ) + 1 ) );
	} else {
		$link_url = $link_start;
	}

	$post_content = substr( $post_content, strlen( $link_url ) );

	// Return the first link in the post content
	if ( 'link' == $output )
		return $link_url;

	// Return the post content without the first link
	if ( 'post_content' == $output )
		return $post_content;
}
endif; // glauss_link_format_helper


if ( ! function_exists( 'glauss_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since 1.0
 */
function glauss_the_attached_image() {
	$post = get_post();
	$attachment_size     = apply_filters( 'glauss_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}
		 
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif; // glauss_the_attached_image

function glauss_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'glauss_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'glauss_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats >= 1 ) {
		// This blog has more than 1 category  
		return true;
	} else {
		// This blog has only 1 category  categorized_blog should return false.
		return false;
	}
}


if ( ! function_exists( 'glauss_post_thumbnail' ) ) :

function glauss_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) : ?>

	<?php 
	$full_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full-size');
	$img_src= $full_img[0];
	?>
	<div class="post-thumbnail">
		
		<a href="<?php echo esc_attr( $img_src ); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail( 'post-thumbnailpost-thumbnailpost-thumbnailpost-thumbnail', array( 'class' => 'single-featured')); ?>
		</a>
	</div>

	<?php else : ?>
 
	
<div class="post-thumbnail">
	<a href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
		the_post_thumbnail( 'post-thumbnail', array( 'class' => 'single-featured', 'alt' => get_the_title() ) );
		?>
	</a>
</div>
	<?php endif; // End is_singular()
}
endif; // glauss_post_thumbnail


function glauss_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'glauss_category_transient_flusher' );
add_action( 'save_post',     'glauss_category_transient_flusher' );
