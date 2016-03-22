<?php

/**
 * Set up the content width value based on the theme's design.
 *
 * @see dacolour16_content_width()
 *
 */
if ( ! isset( $content_width ) ) {
    $content_width = 860;
}


add_action('after_setup_theme', 'dacolour16_setup');
if (!function_exists('dacolour16_setup')):

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     *
     *
     */
    function dacolour16_setup() {
        /* Make dacolour16 available for translation.
         * Translations can be added to the /languages/ directory.
         */
        load_theme_textdomain('dacolour16', get_template_directory() . '/languages');
        $locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";
        if (is_readable($locale_file))
            require_once( $locale_file );
        add_theme_support('automatic-feed-links');
        add_theme_support('post-formats', array('aside', 'link', 'gallery', 'status', 'quote', 'image', 'video', 'audio', 'chat'));
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
        add_theme_support('post-thumbnails');
    }

endif; // dacolour16_setup



/**
 * Adjust content_width value for image attachment template.
 */
function dacolour16_content_width() {
    if ( is_attachment() && wp_attachment_is_image() ) {
        $GLOBALS['content_width'] = 860;
    }
}
add_action( 'template_redirect', 'dacolour16_content_width' );

function dacolour16_menus() {
    register_nav_menus(
            array(
                'header-menu' => __('Header Menu', 'dacolour16'),
            )
    );
}

add_action('init', 'dacolour16_menus');

function dacolour16_the_post_header() {
    ?>
            <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(array('before' => __('Permalink to: ', 'dacolour16'), 'after' => '')); ?>" rel="bookmark">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </a>
    <?php else: ?>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(array('before' => __('Permalink to: ', 'dacolour16'), 'after' => '')); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    <?php
    endif;
}

function dacolour16_footer_meta() {
    ?>
    <p>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(array('before' => __('Permalink to: ', 'dacolour16'), 'after' => '')); ?>"><?php echo sprintf(__('%1$s @ %2$s', 'dacolour16'), get_the_date(), get_the_time()) ?></a>
        <span class="sep"> &middot; </span>
            <?php
            $show_sep = false;
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(__(', ', 'dacolour16'));
            if ($categories_list):
                ?>
            <span class="cat-links">
            <?php _e('Posted in ', 'dacolour16');
            echo $categories_list;
            $show_sep = true;
            ?>
            </span>
            <?php
            endif; // End if categories
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', __(', ', 'dacolour16'));
            if ($tags_list):
                if ($show_sep) :
                    ?>
                <span class="sep"> &middot; </span>
            <?php endif; // End if $show_sep  ?>
            <span class="tag-links">
        <?php _e('Tagged ', 'dacolour16');
        echo $tags_list;
        $show_sep = true;
        ?>
            </span>
    <?php endif; // End if $tags_list
    if ($show_sep) :
        ?>
            <span class="sep"> &middot; </span>
    <?php endif; // End if $show_sep ?>
        <span class="author">
    <?php _e('Author', 'dacolour16'); ?> <?php the_author(); ?>
        </span>
    <?php edit_post_link(__('Edit', 'dacolour16'), '<span class="edit-link"> &middot; ', '</span>'); ?>
    </p>
<?php
}


function dacolour16_sidebars() {

    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'dacolour16' ),
        'id'            => 'sidebar-flag',
        'description'   => __( 'Main sidebar that appears on the right.', 'dacolour16' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Search Area', 'dacolour16' ),
        'id'            => 'searchbar',
        'description'   => __( 'Searchbar in navbar.', 'dacolour16' ),
        'before_widget' => '<div class="searchfield">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'dacolour16' ),
        'id'            => 'sidebar-footer',
        'description'   => __( 'Appears in the footer section of the site.', 'dacolour16' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'dacolour16_sidebars' );