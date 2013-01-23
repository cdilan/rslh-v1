<?php
/**
 * Template Name: Lista de entregas
 */
get_header();
?>
<ul>
<?php
global $post;
$args = array( 	'numberposts' => 20,
			 	'post_type'=>'entrega',
			 	'tax_query'=> array ( array (	'taxonomy'=>'tag_atividade',
			 									'field'=>'id',
			 									'terms'=>43 ))) ;
$myposts = get_posts( $args );
foreach( $myposts as $post ) :	setup_postdata($post); ?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>
