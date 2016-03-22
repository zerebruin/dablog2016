<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php dacolour16_the_post_header() ?>
    </header><!-- .entry-header -->
    <div class="entry-content">
       <div class="post-img"><?php if ( has_post_thumbnail() ) {
            the_post_thumbnail();
        } 
        ?>
        </div>
        
         <?php  the_content(__('Continue reading ', 'dacolour16') . the_title('&quot;', '&quot;', false));
        wp_link_pages(array('before' => '<ul class="page-link"><li>' . __('Pages:', 'dacolour16') . '<ul>', 'after' => '</ul></div>', 'link_before' => '<li>', 'link_after' => '</li>', 'nextpagelink' => __('Next page', 'dacolour16'), 'previouspagelink' => __('Previous page', 'dacolour16'),));
        ?>
    </div><!-- .entry-content -->
    <footer class="entry-meta">
<?php dacolour16_footer_meta() ?>
    </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->