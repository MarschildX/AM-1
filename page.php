<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.17.1/build/styles/github.min.css">
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.17.1/build/highlight.min.js"></script>
    <script>
        hljs.initHighlightingOnLoad();
    </script>
</head>

<body id="body-home">
    <div id="whole-page">
        <?php get_header(); ?>

        <div id="container-wrapper">
            <div id="container-page">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                ?>
                        <div class="post">
                            <div class="metainfo">
                                <h2>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <p class="postmetadata">
                                    <?php
                                    comments_popup_link('No Comment', '1 Comment', '% Comments');
                                    _e('&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;');
                                    the_date('Y-m-d');
                                    ?>
                                </p>
                            </div>
                            <div class="entry">
                                <?php
                                the_content();
                                ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div id="navigator">
                        <?php the_posts_pagination(array(
                            // 'prev_next' => false, 
                            'type' => 'list',
                            'screen_reader_text' => ' ',
                        ));
                        ?>
                    </div>
                <?php else : ?>
                    <h2>
                        <?php _e('Not Found :('); ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>

        <?php get_footer(); ?>

    </div>
</body>

</html>