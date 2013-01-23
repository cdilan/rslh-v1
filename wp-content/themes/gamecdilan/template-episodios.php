<?php
/**
 * Template Name: Lista de episódios
 */
get_header(); ?>
    
            <section id="lista-episodios">
                <div class="container">
                    <div class="page-header">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <ul id="episodios">
                    <?php 
                        $terms = get_terms('episodio', 'orderby=count&hide_empty=0');
                        $count = count($terms);
                        
                        if ($count > 0) {                
                            foreach ($terms as $term) {        
                    ?>
                        <li>
                            <div class="thumbnail">
                                <h2><?php echo $term->name; ?></h2>
                                <p>
                                    <strong><?php echo $term->count; ?> Atividades</strong>
                                    <br />
                                    <?php echo substr($term->description, 0, 280); ?>...
                                </p>
                                <a href="<?php echo get_term_link($term->slug, 'episodio'); ?>" class="btn btn-primary">Ver episódio <i class="icon-chevron-right icon-white"></i></a>
                            </div>
                        </li>
                    <?php                    
                            }  
                        }
                    ?>
                    </ul>
                </div>
            </section>

<?php get_footer(); ?>