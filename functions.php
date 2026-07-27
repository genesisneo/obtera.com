<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package obtera
 * @since 1.0.0
 */

if ( ! function_exists( 'obtera_enqueue_styles' ) ) :
  /**
   * Enqueues the theme stylesheet on the front.
   *
   * @since Obtera 1.0
   *
   * @return void
   */
  function obtera_enqueue_styles() {
    $src    = 'style.css';
    wp_enqueue_style(
      'obtera-style',
      get_parent_theme_file_uri( $src ),
      array(),
      wp_get_theme()->get( 'Version' )
    );
    wp_style_add_data(
      'obtera-style',
      'path',
      get_parent_theme_file_path( $src )
    );
  }
endif;
add_action( 'wp_enqueue_scripts', 'obtera_enqueue_styles' );

if ( ! function_exists( 'obtera_setup' ) ) :
  /**
   * Sets up theme defaults, menus, and supported features.
   *
   * @since Obtera 1.0
   *
   * @return void
   */
  function obtera_setup() {
    add_theme_support(
      'custom-logo',
      array(
        'height'      => 40,
        'width'       => 40,
        'flex-height' => true,
        'flex-width'  => true,
      )
    );

    add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

    register_nav_menus(
      array(
        'primary' => __( 'Primary Menu', 'obtera' ),
      )
    );
  }
endif;
add_action( 'after_setup_theme', 'obtera_setup' );

/**
 * Inject a unique post ID as a CSS variable onto the featured image element
  * @since Obtera 1.0
  *
  * @param string $block_content The HTML content of the block.
  * @param array  $block The block data.
  * @return void
 */
function obtera_featured_image_transition( $block_content, $block ) {
  $block_name = isset( $block['blockName'] ) ? $block['blockName'] : '';
  if ( 'core/post-featured-image' === $block_name ) {
    $post_id = isset( $block['context']['postId'] ) ? $block['context']['postId'] : get_the_ID();
    if ( $post_id ) {
      $inline_style = 'style="--featured-image-id: active-image-' . $post_id . ';"';
      $block_content = preg_replace( '/<img\s+/i', '<img ' . $inline_style . ' ', $block_content, 1 );
    }
  }
  return $block_content;
}
add_filter( 'render_block', 'obtera_featured_image_transition', 10, 2 );

if ( ! function_exists( 'obtera_default_site_logo' ) ) :
  /**
   * Fallback to a default logo if no custom logo has been set.
   *
   * @since Obtera 1.0
   *
   * @param string $html The HTML for the custom logo.
   * @param int    $blog_id The blog ID.
   * @return string
   */
  function obtera_default_site_logo( $html, $blog_id ) {
    if ( ! empty( $html ) ) {
      return $html;
    }

    if ( ! file_exists( get_template_directory() . '/assets/images/avatar.png' ) ) {
      return $html;
    }

    $logo_url = get_template_directory_uri() . '/assets/images/avatar.png';
    $site_name = get_bloginfo( 'name', 'display' );

    return sprintf(
      '<a href="%1$s" class="custom-logo-link" rel="home" aria-label="%2$s"><img width="40" height="40" src="%3$s" class="custom-logo" alt="%2$s" /></a>',
      esc_url( home_url( '/' ) ),
      esc_attr( $site_name ),
      esc_url( $logo_url )
    );
  }
endif;
add_filter( 'get_custom_logo', 'obtera_default_site_logo', 10, 2 );
