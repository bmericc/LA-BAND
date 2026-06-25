            <?php if ( has_post_thumbnail() ) : ?>
            <div class="cm-featured-image">
                <?php if ( ! is_singular() ) : ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('cm-featured'); ?></a>
                <?php else : ?>
                    <?php the_post_thumbnail('cm-featured'); ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if ( ! is_singular() ) : ?>
            <h2 class="permalink"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'site5framework' ); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <?php endif; ?>

            <header>
                <div class="post-meta">
                    <div class="post-author"><span class="title"><?php _e("", "site5framework"); ?></span> <?php the_author_posts_link(); ?></div>
                    <time class="post-date" datetime="<?php echo the_time('Y-m-d'); ?>">
                        <span class="post-month"><?php the_time('M j, Y'); ?></span>
                    </time>
                    <div class="tags">    <span class="title"><?php _e("", "site5framework"); ?></span>
                    <span class="tag">
                        <?php the_tags('', ', ', ''); ?>
                    </span>
                    </div>
                    <div class="comments-link"><span class="title"><?php _e("", "site5framework"); ?></span> <?php comments_popup_link(__('0', 'site5framework'), __('1', 'site5framework'), __('%', 'site5framework')); ?></div>
                </div>
            </header> <!-- end article header -->
