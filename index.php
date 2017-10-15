
<?php get_header(); ?>

<?php // List of Posts ?>
<?php if (have_posts()) : ?>

<!-- Posts -->
<section id="posts">

    <div class="row small-uncollapse medium-uncollapse large-uncollapse">

        <div class="column small-12 medium-12 large-12">

            <div class="small-block-grid-1 medium-block-grid-2">

                <?php // Show all posts ?>
                <?php while (have_posts()) : the_post(); ?>

                <!-- Post -->
                <article class="item">
                    <?php // Post class ?>
                    <div <?php post_class(); ?>>
                        <a href="<?php the_permalink(); ?>" class="post-details">
                            <?php // Feature image ?>
                            <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail();
                                } else { ?>
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/thumbnail.jpg" class="wp-post-image">
                                <?php
                                }
                            ?>
                            <header class="details">
                                <h3><?php echo wp_trim_words( get_the_title(),10); ?></h3>
                                <span><i></i> <?php the_author(); ?> / <?php the_time('m-d-Y'); ?></span>
                            </header>
                        </a>
                        <?php // Post content ?>
                        <?php // the_content('...') or the_excerpt() ?>
                        <?php the_excerpt(); ?>
                        <p class="categories">Categories: <?php the_category(' / '); ?></p>
                    </div>
                </article>

                <?php endwhile; ?>

            </div>

        </div>

    </div>

    <div class="row">

        <div id="post-paginations" class="columns">
            <?php next_posts_link('Older posts'); ?>
            <?php previous_posts_link('Newer posts'); ?>
        </div>

    </div>

</section>

<?php endif; ?>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>
