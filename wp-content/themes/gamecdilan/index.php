<?php get_header(); ?>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                <section id="page">
                    <div class="container">
                        <div class="page-header">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div class="entry">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </section>

                <?php endwhile; ?>
            <?php endif; ?>

<?php get_footer(); ?>