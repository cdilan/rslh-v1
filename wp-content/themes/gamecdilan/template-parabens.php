<?php
/**
 * Template Name: Parabéns
 */
get_header(); ?>
    
             <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                <script type="text/javascript">
                    $('#myModal').modal('show');
                </script>
                <section id="parabens">
                    <div class="container">
                        <div class="entry">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </section>

                <?php endwhile; ?>
            <?php endif; ?>

