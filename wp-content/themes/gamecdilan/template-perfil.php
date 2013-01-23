<?php
/**
 * Template Name: Perfil
 */
get_header(); ?>            
                    <section id="player">
                        <div class="container">
                            <div class="row">
                                <?php if (have_posts()) : ?>
                                    <?php while (have_posts()) : the_post(); ?>                            
                                        <div class="span8 offset2">
                                            <?php the_content(); ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <!-- <aside id="sidebar" class="span4">
                                    <div class="widget">
                                        <h3>Titulo do sidebar</h3>
                                        <div class="well">
                                            <p>Algum conteúdo relacionado ao perfil</p>
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <h3>Titulo do sidebar</h3>
                                        <div class="well">
                                            <p>Algum conteúdo relacionado ao perfil</p>
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <h3>Titulo do sidebar</h3>
                                        <div class="well">
                                            <p>Algum conteúdo relacionado ao perfil</p>
                                        </div>
                                    </div>
                                </aside> -->
                            </div>
                        </div>
                    </section>

                    <?php
                        $id_do_jogador = $_GET['uid'];
                        if (!$id_do_jogador) {
                            $id_do_jogador = get_current_user_id();
                        }
                        $entregas_do_jogador = $wpdb->get_results(   "
                                                                        SELECT *
                                                                        FROM $wpdb->posts
                                                                        WHERE post_status = 'publish'
                                                                            AND post_author = $id_do_jogador
                                                                            AND post_type = 'entrega'
                                                                        ");
                        if ($entregas_do_jogador) { ?>

                            <section id="lista-entregas">
                                <div class="container">
                                    <div class="row">
                                        <div class="span8 offset2">
                                            <h3>Atividades realizadas</h3>
                                            <ul class="thumbnails">
                                                <?php foreach ($entregas_do_jogador as $post) {
                                                    setup_postdata($post);
                                                    ?>
                                                        <li>
                                                            <div class="thumbnail">
                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                            </div>
                                                        </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <?php } ?>
<?php get_footer(); ?>