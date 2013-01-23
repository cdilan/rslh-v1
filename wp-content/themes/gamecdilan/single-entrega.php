<?php get_header(); ?>
                    
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="span8">
                                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                        <div class="page-header">
                                            <h1><?php the_title(); ?></h1>
                                        </div>
                                        <div id="entrega" class="thumbnail entry">
                                            <?php the_content(); ?>
                                        </div>
                                    <?php endwhile; endif; ?>
                                    <?php
                                        global $post;
                                        $tmp_post = $post;
                                        $tag_atividade_id = wp_get_post_terms($post->ID, 'tag_atividade', array("fields" => "ids"));
                                        $args = array(  'numberposts' => 8,
                                                        'post_type'=>'entrega',
                                                        'orderby'=>'rand',
                                                        'tax_query'=> array ( array (   'taxonomy'=>'tag_atividade',
                                                                                        'field'=>'id',
                                                                                        'terms'=>$tag_atividade_id[0] ))) ;
                                        $myposts = get_posts( $args );
                                        if(!empty($myposts)) :
                                    ?>
                                        <section id="lista-entregas">
                                            <h3>Jogadores que entregaram essa atividade</h3>
                                            <ul class="thumbnails">
                                                <?php
                                                foreach( $myposts as $post ) :  setup_postdata($post); ?>
                                                    <li class="span2">
                                                        <div class="thumbnail">
                                                            <a href="<?php the_permalink(); ?>"><?php echo get_avatar( get_the_author_meta('ID'), 120 ); ?></a>
                                                            <h5><a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></h5>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </section>
                                    <?php endif; ?>
                                    <?php $post = $tmp_post; ?>
                                    <section id="comentarios">
                                        <?php wp_reset_query(); ?>
                                        <?php comments_template( '', true ); ?>
                                    </section>
                                </div>
                                <aside class="span4">
                                    <?php
                                        global $post;
                                        $tmp_post = $post;
                                        $tag_atividade_id = wp_get_post_terms($post->ID, 'tag_atividade', array("fields" => "ids"));
                                        $args = array(  'numberposts' => 1,
                                                        'post_type'=>'atividade',
                                                        'orderby'=>'rand',
                                                        'tax_query'=> array ( array (   'taxonomy'=>'tag_atividade',
                                                                                        'field'=>'id',
                                                                                        'terms'=>$tag_atividade_id[0] ))) ;
                                        $myposts = get_posts( $args );
                                        if(!empty($myposts)) : foreach( $myposts as $post ) :  setup_postdata($post);
                                    ?>
                                        <div id="btn-atividade">
                                            <a href="<?php the_permalink(); ?>" class="btn btn-large">Faça essa atividade</a>
                                        </div>
                                    <?php
                                        endforeach;
                                        endif;
                                        $post = $tmp_post;
                                    ?>
                                    <div id="entrega-jogador" class="well well-small">
                                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                        <?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
                                        <h3><?php the_author(); ?></h3>
                                        <h4><?php echo get_user_meta(get_the_author_meta('ID'),'lanhouse', true); ?></h4>
                                    <?php endwhile; endif; ?>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </section>
<?php get_footer(); ?>