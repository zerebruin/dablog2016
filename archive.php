<?php get_header();?>
<main role="main">
<?php if ( have_posts() ) : ?>
<header>
<h1>
<?php if ( is_day() ) :
printf( __( 'Daily Archives: %s', 'dacolour16' ), '<span>' . get_the_date() . '</span>' );
elseif ( is_month() ) :
printf( __( 'Monthly Archives: %s', 'dacolour16' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'dacolour16' ) ) . '</span>' );
elseif ( is_year() ) :
printf( __( 'Yearly Archives: %s', 'dacolour16' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'dacolour16' ) ) . '</span>' );
else :
_e( 'Blog Archives', 'fanoe' );
endif; ?>
</h1>
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