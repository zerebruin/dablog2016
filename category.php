<?php get_header();?>
<main role="main">
<?php if ( have_posts() ) : ?>
<header>
<h1>
<?php printf( __( 'Category Archives: %s', 'dacolour16' ), '<span>' . single_cat_title( '', false ) . '</span>' );?>
</h1>
<?php
$term_description = term_description();
if ( ! empty( $term_description ) )
printf( '<div class="taxonomy-description">%s</div>', $term_description );
?>
</header>
<?php /* Start the Loop */
while ( have_posts() ) : the_post();
get_template_part( 'content', get_post_format() );
endwhile;
endif; ?>
</main>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
<ul id="posts-nav">
<li class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'dacolour16' ) ); ?></li>
<li class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'dacolour16' ) ); ?></li>
</ul>
<?php endif;
get_footer(); ?>