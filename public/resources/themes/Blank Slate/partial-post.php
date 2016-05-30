<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?> role="article">
    <div class="inner">
        <header>
            <h1>
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h1>
        </header>
        <section class="clearfix">
            <?php the_content( __("Read more", THEME_TD) ); ?>
        </section>
        <footer class="clearfix">
            <?php the_tags_hashed(); ?>
            <div class="date">
                <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('M j, Y'); ?></time>
            </div>
        </footer>
    </div>
</article>