<?php get_header(); ?>
            
            <section id="lista-entregas">
                <div class="container">
                    <div class="page-header">
                        <h1><?php post_type_archive_title(); ?></h1>
                    </div>

                    <ul class="thumbnails">
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="span12">
                                    <div class="thumbnail">
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php the_excerpt(); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Visualizar entrega</a>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </section>

<?php get_footer(); ?>