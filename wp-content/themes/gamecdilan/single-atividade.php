<?php get_header(); ?>

<?php
	//PEGADA - Sistema para salvar o rastro, quando o jogador visita a página salva no banco de dados
    //Checa se já foi completada, para não alterar tarefa completada para visitada
    $iscompleted = get_user_meta(get_current_user_id(),$post->ID);
    //Somente altera para visita se não estiver completada
    if($iscompleted[0]!="completed")
	$insereDados = update_user_meta(get_current_user_id(),$post->ID, "visited");
    //Tipo de cookie para salver a última página visitada pelo jogador, como o formidable não passa o ID do post e o WordPress não salve cookie
    update_user_meta(get_current_user_id(),"last_visited",$post->ID);
	//
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>

            <section id="atividade">
                <div class="container">
                    <div class="page-header">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="row">
                        <div class="span8">
                            <div class="entry thumbnail" id="texto-inspirador">
                                <?php the_content(); ?>
                            </div>
                            
                            <?php if(get_post_meta($post->ID, 'form_atividade', true)) : ?>
                                <div class="alert alert-info" id="formulario">
                                    <?php echo do_shortcode(get_post_meta( $post->ID, 'form_atividade', true )); ?>
                                </div>
                            <?php endif; ?>

                            <?php
                                global $post;
                                $tmp_post = $post;
                                // pega tag_atividade deste post
                                $tag_atividade_id = (wp_get_post_terms($post->ID, 'tag_atividade', array("fields" => "ids")));
                                //lista entregas com essa tag_atividade
                                $args = array(  'numberposts' => 20,
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
                                <div class="container" >
                                    <?php comments_template( '', true ); ?>
                                </div>
                            </section>
                        </div>

                        <aside class="span4">
                            <?php if(get_post_meta($post->ID, 'sugeridas_atividade', true)) : ?>
                                <div id="sugeridas" class="widget">
                                    <h3>Onde fazer</h3>
                                    <div class="well">
                                        <?php echo do_shortcode(get_post_meta( $post->ID, 'sugeridas_atividade', true )); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if(get_post_meta($post->ID, 'dicas_atividade', true)) : ?>
                                <div id="dicas" class="widget">
                                    <h3>Dicas</h3>
                                    <div class="well">
                                        <?php echo do_shortcode(get_post_meta( $post->ID, 'dicas_atividade', true )); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php
                                $episodio_atividade = wp_get_post_terms($post->ID, 'episodio', array("fields" => "ids"));
                                $args = array(
                                    'numberposts' => 20,
                                    'post_type'=>'atividade',
                                    'tax_query'=> array(
                                        array(
                                            'taxonomy'=>'episodio',
                                            'field'=>'id',
                                            'terms'=>$episodio_atividade[0]
                                            )
                                        )
                                    );
                                $episodio_atividade = get_posts( $args );
                                if(!empty($episodio_atividade)) :
                            ?>
                            <div class="widget">
                                <h3>Outras atividades</h3>
                                <div class="well">
                                    <ul>
                                        <?php
                                            
                                            $outras_atividades = get_posts($args);
                                            foreach( $outras_atividades as $post ) : setup_postdata($post);
                                        ?>
                                            <li>
                                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <?php endif; ?>
                        </aside>                            
                    </div>
                </div>
            </section>
            <?php
        endwhile;
    endif;
    wp_reset_postdata();

get_footer(); ?>