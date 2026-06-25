<?php get_header(); ?>

<div id="white-background">
    <!-- content -->
    <div id="content" class="container clearfix" style="padding-bottom: 0;">

        <div class="container">
            <div class="page-title-heading">
                <h2><?php the_title(); ?><?php if ( !get_post_meta($post->ID, 'snbpd_pagedesc', true)== '') { ?> / <?php }?> <span><?php echo get_post_meta($post->ID, 'snbpd_pagedesc', true); ?></span></h2>
                <div class="container">
                    <div class="content">
                        <div id="single-portfolio-pagination">
                            <div class="project-pagination">
                                <div class="project-pagination-prev">
                                    <?php previous_post_link('%link', ''.__('', 'site5framework')) ?>
                                </div>
                                <div class="project-pagination-next">
                                    <?php next_post_link('%link', __('', 'site5framework') . ''); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-border"></div>

        <div class="container">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="one-third-block">
                        <div class="portfolio-image resize">
                            <?php
                            $thumbId = get_image_id_by_link ( get_post_meta($post->ID, 'snbp_pitemlink', true) );
                            $thumb = wp_get_attachment_image_src($thumbId, 'full', false);
                            $large = wp_get_attachment_image_src($thumbId, 'full', false);

                            if (!$thumb == ''){ ?>
                                <a href="<?php echo $large[0] ?>" data-rel="prettyPhoto" title="<?php the_title(); ?>"><img src="<?php echo $thumb[0] ?>" alt="<?php the_title(); ?>"  /></a>
                                <?php }  ?>
                        </div>
                        <?php
                        //check if pricing URL exists and show link
                        global $post;
                        $button1_url = get_post_meta($post->ID, 'snbp_button1_url', TRUE);
                        $button1 = get_post_meta($post->ID, 'snbp_button1', TRUE);

                        if($button1_url != '') { ?>
                            <div class="audio-buy-button"><a href="<?php echo $button1_url ?>" title="<?php echo $button1 ?>"><?php echo $button1 ?></a></div>
                            <?php } ?>

                        <?php
                        //check if pricing URL exists and show link
                        global $post;
                        $button2_url = get_post_meta($post->ID, 'snbp_button2_url', TRUE);
                        $button2 = get_post_meta($post->ID, 'snbp_button2', TRUE);

                        if($button2_url != '') { ?>
                            <div class="audio-buy-button"><a href="<?php echo $button2_url ?>" title="<?php echo $button2 ?>"><?php echo $button2 ?></a></div>
                            <?php } ?>

                        <?php
                        //check if pricing URL exists and show link
                        global $post;
                        $button3_url = get_post_meta($post->ID, 'snbp_button3_url', TRUE);
                        $button3 = get_post_meta($post->ID, 'snbp_button3', TRUE);

                        if($button3_url != '') { ?>
                            <div class="audio-buy-button"><a href="<?php echo $button3_url ?>" title="<?php echo $button3 ?>"><?php echo $button3 ?></a></div>
                            <?php } ?>

                        <?php
                        //check if pricing URL exists and show link
                        global $post;
                        $button4_url = get_post_meta($post->ID, 'snbp_button4_url', TRUE);
                        $button4 = get_post_meta($post->ID, 'snbp_button4', TRUE);

                        if($button4_url != '') { ?>
                            <div class="audio-buy-button"><a href="<?php echo $button4_url ?>" title="<?php echo $button4 ?>"><?php echo $button4 ?></a></div>
                            <?php } ?>

                        <?php
                        //check if pricing URL exists and show link
                        global $post;
                        $button5_url = get_post_meta($post->ID, 'snbp_button5_url', TRUE);
                        $button5 = get_post_meta($post->ID, 'snbp_button5', TRUE);

                        if($button5_url != '') { ?>
                            <div class="audio-buy-button"><a href="<?php echo $button5_url ?>" title="<?php echo $button5 ?>"><?php echo $button5 ?></a></div>
                            <?php } ?>
                        <div class="space"></div>
                        <h5 class="release-date">
                            <?php
                            global $post;
                            $release_date = get_post_meta( $post->ID, 'snbp_release_date', true );
                            echo $release_date;
                            ?>
                        </h5>

                        <h5 class="music-genre">
                            <?php
                            global $post;
                            $genre = get_post_meta( $post->ID, 'snbp_genre', true );
                            echo $genre;
                            ?>
                        </h5>
                    </div> <!-- end one-third-block section -->

                    <?php if ($post->post_content != '') : ?>
                        <div class="two-third-block last" style="float: right;">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>

                    <?php endwhile; ?>
                    <?php else : ?>
                    <article id="post-not-found">
                        <header>
                            <h1><?php _e("Not Found", "site5framework"); ?></h1>
                        </header>
                        <section class="post_content">
                            <p><?php _e("Sorry, but the requested resource was not found on this site.", "site5framework"); ?></p>
                        </section>
                        <footer>
                        </footer>
                    </article>
                    <?php endif; ?>
                </div>
            </div> <!-- end content -->
        </div><!-- end #white-background -->

<?php get_footer(); ?>