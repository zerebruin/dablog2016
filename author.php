<?php get_header();?>
<main role="main">
<?php if ( have_posts() ) :
/* Queue the first post, that way we know
* what author we're dealing with (if that is the case).
*
* We reset this later so we can run the loop
* properly with a call to rewind_posts().
*/
the_post();?>
<header class="archive-header">
<h1>
<?php printf( __( 'All posts by %s', 'dacolour16' ), get_the_author() );?>
</h1>
<?php if ( get_the_author_meta( 'description' ) ) : ?>
<div class="author-description"><?php the_author_meta( 'description' ); ?></div>
<?php endif; ?>
</header>
<?php
/* Since we called the_post() above, we need to
* rewind the loop back to the beginning that way
* we can run the loop properly, in full.
*/
rewind_posts();
/* Start the Loop */
while ( have_posts() ) : the_post();
get_template_part( 'content', get_post_format() );
endwhile;
endif;
?>
</main>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
<ul id="posts-nav">
<li class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'dacolour16' ) ); ?></li>
<li class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'dacolour16' ) ); ?></li>
</ul>
<?php endif;
get_footer(); ?>