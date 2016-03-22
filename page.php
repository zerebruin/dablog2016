<?php get_header();?>
<main role="main">
<?php /* Start the Loop */
while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="entry-header">
<?php dacolour16_the_post_header() ?>
</header><!-- .entry-header -->
<div class="entry-content">
<?php the_content();
wp_link_pages( array( 'before' => '<ul class="page-link"><li>' . __( 'Pages:', 'dacolour16' ) . '<ul>', 'after' => '</ul></div>', 'link_before' => '<li>', 'link_after' => '</li>', 'nextpagelink'     => __( 'Next page', 'dacolour16' ), 'previouspagelink' => __( 'Previous page', 'dacolour16' ), ) ); ?>
</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php comments_template( '', true ); ?>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>