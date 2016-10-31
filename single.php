
<?php get_header(); ?>

<?php // List of Posts ?>
<?php if (have_posts()) : ?>

    <?php // Show all posts ?>
    <?php while (have_posts()) : the_post(); ?>

        <!-- Posts -->
        <section id="posts" class="single format-<?php echo(get_post_format()) ?>">

            <?php
                if ( has_post_thumbnail( $post -> ID ) ) {
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post -> ID ), 'single-post-thumbnail' );
                    $image = $image[0];
                } else {
                    $image = get_bloginfo('stylesheet_directory') . '/assets/img/thumbnail.jpg';
                }
            ?>

            <div class="post-details" style="background-image: url('<?php echo $image; ?>');">
                <header class="details">
                    <h3><?php the_title(); ?></h3>
                    <span><i></i> <?php the_author(); ?> | <?php the_time('m-d-Y'); ?> | <?php comments_number('No comments', '1 comment', '% comments'); ?></span>
                    <div class="at-above-post-page" style="margin-top:0.313em;"></div>
                </header>
            </div>

            <div class="row small-uncollapse medium-uncollapse large-uncollapse">

                <div class="column small-12 medium-12 large-12">

                    <div class="small-block-grid-1">

                        <!-- Post -->
                        <article class="item">
                            <?php // Post class ?>
                            <div <?php post_class(); ?>>
                                <?php // Attachement ?>
                                <p id="back"><a href="javascript:history.back()">Go back</a></p>
                                <?php // Post content ?>
                                <?php the_content('...'); ?>
                                <p class="categories">Categories: <?php the_category(' | '); ?></p>
                                <p class="tags"><?php the_tags('Tags: ', ' | ', ''); ?></p>
                                <?php // Comments Template ?>
                                <?php comments_template(); ?>
                            </div>
                        </article>

                    </div>

                </div>

            </div>

        </section>

    <?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>
