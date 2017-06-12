
<?php get_header(); ?>

<?php // List of Posts ?>
<?php if (have_posts()) : ?>

<!-- Posts -->
<section id="posts">

    <div class="row">

        <div class="column small-12 medium-12 large-12">

            <?php // For Archives Page ?>
            <?php if (is_category()) { ?>

                <?php // Display Category Name ?>
                <h3>Category: <?php single_cat_title(); ?></h3>

            <?php } elseif (is_author()) { ?>

                <?php // Display Author Name ?>
                <h3>Author: <?php the_author(); ?></h3>

            <?php } elseif (is_tag()) { ?>

                <?php // Display Tag Name ?>
                <h3>Tag: <?php single_tag_title(); ?></h3>

            <?php } ?>

        </div>

    </div>

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
                                <span><i></i> <?php the_author(); ?> / <?php the_time('m-d-Y'); ?> / <?php comments_number('No comments', '1 comment', '% comments'); ?></span>
                            </header>
                        </a>
                        <?php // Post content ?>
                        <?php // the_content('...') or the_excerpt() ?>
                        <?php the_excerpt(); ?>
                        <p class="categories">Categories: <?php the_category(' / '); ?></p>
                        <p class="tags"><?php the_tags('Tags: ', ' / ', ''); ?></p>
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
