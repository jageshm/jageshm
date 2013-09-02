<?php 
if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s <span class="by-author"> by %3$s</span>.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s <span class="by-author"> by %3$s</span>.', 'twentytwelve' );
	} else {
		$utility_text = __( 'This entry was posted <span class="by-author"> by %3$s</span>.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$author
	);
}
endif;

if ( ! function_exists( 'twentytwelve_posted_on' ) ) :
/**
 * Prints HTML date.
 *
 */
function twentytwelve_posted_on() {

	$date = sprintf( '<span class="posted_on"><time class="entry-date" datetime="%1$s" pubdate>%2$s</time></span>',
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'M j Y') )
	);

	$posted_on = __( '%1$s', 'twentytwelve' );

	printf(
		$posted_on,
		$date
	);
}
endif;
