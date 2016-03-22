<?php get_header();?>
<main role="main" class="container-fluid">
<?php if ( have_posts() ) :
/* Start the Loop */
while ( have_posts() ) : the_post();
get_template_part( 'content', get_post_format() );
endwhile;
endif;?>
</main>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
<ul id="posts-nav">
<li class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'dacolour16' ) ); ?></li>
<li class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'dacolour16' ) ); ?></li>
</ul>
<?php endif;
get_footer(); ?>