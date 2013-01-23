<?php
/**
 * Template Name: Login
 */
get_header(); ?>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                <section id="page" class="login">
                    <div class="container">
                        <div class="row">
                            <div class="span4">
                                <div class="entry">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <div class="span8">
                                <div id="video">
                                    <iframe width="560" height="315" src="http://www.youtube.com/embed/LcupC-KdkJ4" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <?php endwhile; ?>
            <?php endif; ?>

<?php get_footer(); ?>