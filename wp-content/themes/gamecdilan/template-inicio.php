<?php
/**
 * Template Name: Página inicial
 */
get_header(); ?>            
                    <section id="home">
                        <div class="container">
                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <div class="entry"><?php the_content(); ?></div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <div class="row">
                                <?php
                                $args = array(
                                    'posts_per_page' => 1,
                                    'post__in' => get_option('sticky_posts')
                                );
                                query_posts($args);
                                if (have_posts()) : while (have_posts()) : the_post();
                                ?>
                                    <div class="span6">
                                        <article class="home-news">
                                            <h2><strong><?php the_title(); ?></strong></h2>
                                            <p><?php echo get_the_excerpt(); ?></p>
                                            <a class="btn btn-mini" href="<?php the_permalink(); ?>">Saiba mais &raquo;</a>
                                        </article>
                                    </div>
                                    <div class="span6">
                                        <?php if (has_post_thumbnail()) { the_post_thumbnail(); } else { ?>
                                            <img src="<?php bloginfo('template_directory') ?>/img/home.png" />
                                        <?php } ?>
                                    </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                <? endif; ?>
                            </div>
                        </div>
                    </section>

                    <section id="home-links">
                        <div class="container">
                            <div class="row">
                                <div class="span4">
                                    <div class="well">
                                        <h2>Reinvente sua lanhouse</h2>
                                        <p class="lead">Navegue nos episódios e descubra novas estórias com mais atividades e ganhe pontos reinventando sua lanhouse.</p>
                                        <a href="<?php bloginfo('url'); ?>/episodios/" class="btn">Navegar nos episódios</a>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="well">
                                        <h2>Colabore com outros jogadores</h2>
                                        <p class="lead">Conheça outros jogadores e avalie suas atividades votando e enviando sua opnião.</p>
                                        <a href="../colabore-com-outros-jogadores" class="btn">Conhecer outros jogadores</a>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="well">
                                        <h2>Participe dos desafios</h2>
                                        <p class="lead">Ganhe prêmios! Saiba como funcionam os desafios, conheça as regras e veja como participar.</p>
                                        <a href="../desafios" class="btn">Ler a regulamentação</a>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    </section>
                


<?php get_footer(); ?>