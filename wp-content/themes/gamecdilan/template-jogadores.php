<?php
/**
 * Template Name: Lista Jogadores
 */
 get_header(); ?>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                <section id="page" class="lista-jogadores">
                    <div class="container">
                        <div class="page-header">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <?php the_content(); ?>
                    </div>
                </section>

                <?php endwhile; ?>
            <?php endif; ?>

<?php get_footer(); ?>