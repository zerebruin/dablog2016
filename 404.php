<?php get_header();?>
<main role="main">
<article id="post-0" class="post no-results not-found">
<header class="entry-header">
<h1 class="entry-title"><?php _e( '404 Nothing Found', 'dacolour16' ); ?></h1>
</header><!-- .entry-header -->
<div class="entry-content">
<p><?php _e( "Hey, there! What you're looking for just isn't here. Perhaps searching will help find a related post.", 'dacolour16' ); ?></p>
<img id="ateyouup" src='<?php echo get_template_directory_uri(); ?>/img/greatwhite.png' />
</div><!-- .entry-content -->
</article><!-- #post-0 -->
</main>
<?php get_sidebar();
get_footer(); ?>