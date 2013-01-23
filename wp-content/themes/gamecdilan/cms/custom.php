<?php

/***************************************************
# Custom Post Types
***************************************************/

add_action( 'init', 'gamecdilan_custom_post_type' );
function gamecdilan_custom_post_type() {
	
	// Atividade
	register_post_type('atividade', array(
		'label' => 'Atividades',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'atividade'),
		'query_var' => true,
		'has_archive' => 'atividades',
		'menu_position' => 5,
		'supports' => array('title','editor','excerpt','thumbnail','comments'),
		'taxonomies' => array('episodio','tag_atividade'),
		'labels' => array(
			'name' => 'Atividades',
			'singular_name' => 'Atividade',
			'menu_name' => 'Atividades',
			'add_new' => 'Adicionar Atividade',
			'add_new_item' => 'Adicionar Nova Atividade',
			'edit' => 'Editar',
			'edit_item' => 'Editar Atividade',
			'new_item' => 'Nova Atividade',
			'view' => 'Visualizar Atividade',
			'view_item' => 'Visualizar Atividade',
			'search_items' => 'Buscar Atividade',
			'not_found' => 'Nenhuma Atividade Encontrado',
			'not_found_in_trash' => 'Nenhuma Atividade Encontrado na Lixeira',
			'parent' => 'Atividade Pai',
			),
		)
	);

	// Entrega
	register_post_type('entrega', array(
		'label' => 'Entregas',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'entrega'),
		'query_var' => true,
		'has_archive' => 'entregas',
		'menu_position' => 5,
		'supports' => array('title','editor','excerpt','thumbnail','comments','author','custom-fields'
),
		'taxonomies' => array('tag_atividade'),
		'labels' => array(
			'name' => 'Entregas',
			'singular_name' => 'Entrega',
			'menu_name' => 'Entregas',
			'add_new' => 'Adicionar Entrega',
			'add_new_item' => 'Adicionar Nova Entrega',
			'edit' => 'Editar',
			'edit_item' => 'Editar Entrega',
			'new_item' => 'Nova Entrega',
			'view' => 'Visualizar Entrega',
			'view_item' => 'Visualizar Entrega',
			'search_items' => 'Buscar Entrega',
			'not_found' => 'Nenhuma Entrega Encontrado',
			'not_found_in_trash' => 'Nenhuma Entrega Encontrado na Lixeira',
			'parent' => 'Entrega Pai',
			),
		)
	);
	
}

/***************************************************
# Custom Taxonomies
***************************************************/

add_action( 'init', 'gamecdilan_custom_taxonomy' );
function gamecdilan_custom_taxonomy() {

	//Episódio
	register_taxonomy( 'episodio', array('atividade'), array(
        'hierarchical' => true,
        'label' => 'Episódios',
        'show_ui' => true,
        'show_in_tag_cloud' => false,
        'query_var' => true,
		'rewrite' => array('slug' => 'episodio'),
		'labels' => array(
		    'name' => 'Episódios',
		    'singular_name' => 'Episódio',
		    'search_items' =>  'Buscar Episódios',
		    'all_items' => 'Todos os Episódios',
		    'parent_item' => 'Episódio Pai',
		    'parent_item_colon' => 'Episódio Pai:',
		    'edit_item' => 'Editar Episódio',
		    'update_item' => 'Atualizar Episódio',
		    'add_new_item' => 'Adicionar Novo Episódio',
		    'new_item_name' => 'Novo Episódio',
		    'menu_name' => 'Episódios',
			),
        )
    );

	//atividade
	register_taxonomy( 'tag_atividade', array('atividade','entrega'), array(
        'hierarchical' => true,
        'label' => 'Tag Atividade',
        'show_ui' => true,
        'show_in_tag_cloud' => false,
        'query_var' => true,
		'rewrite' => array('slug' => 'tag_atividade'),
		'labels' => array(
		    'name' => 'Tag Atividade',
		    'singular_name' => 'Tag Atividade',
		    'search_items' =>  'Buscar Tag Atividade',
		    'all_items' => 'Todos as Tag Atividade',
		    'parent_item' => 'Tag Atividade Pai',
		    'parent_item_colon' => 'Tag Atividade Pai:',
		    'edit_item' => 'Editar Tag Atividade',
		    'update_item' => 'Atualizar Tag Atividade',
		    'add_new_item' => 'Adicionar Nova Tag Atividade',
		    'new_item_name' => 'Nova Tag Atividade',
		    'menu_name' => 'Tag Atividade',
			),
        )
    );    

}

/***************************************************
Campos personalizados
***************************************************/

// Campo para form

add_action('add_meta_boxes', 'gamecdilan_atividade_meta_boxes');
function gamecdilan_atividade_meta_boxes() {
    add_meta_box(
        'form_atividade_metabox_id',
        'Formulário de entrega',
        'form_atividade_inner_meta_box',
        'atividade',
        'normal',
        'high'
    );
    add_meta_box(
        'dicas_atividade_metabox_id',
        'Dicas',
        'dicas_atividade_inner_meta_box',
        'atividade',
        'normal',
        'high'
    );    
    add_meta_box(
        'sugeridas_atividade_metabox_id',
        'Atividades sugeridas',
        'sugeridas_atividade_inner_meta_box',
        'atividade',
        'normal',
        'high'
    );       
}

function form_atividade_inner_meta_box($post) {

    global $post; 
    $values = get_post_custom( $post->ID );
    $form = isset( $values['form_atividade'] ) ? esc_attr( $values['form_atividade'][0] ) : '';
    
    wp_nonce_field( 'form_atividade_box_nonce', 'form_atividade_meta_box_nonce' ); 

    wp_editor( html_entity_decode($form), 'form_atividade', array( 'textarea_name' => 'form_atividade', 'media_buttons' => true, 'textarea_rows' => 2) );

}

function dicas_atividade_inner_meta_box($post) {

	global $post;
    $values = get_post_custom( $post->ID );
    $dicas = isset( $values['dicas_atividade'] ) ? esc_attr( $values['dicas_atividade'][0] ) : '';

	wp_nonce_field( 'dicas_atividade_box_nonce', 'dicas_atividade_meta_box_nonce' ); 

	wp_editor( html_entity_decode($dicas), 'dicas_atividade', array( 'textarea_name' => 'dicas_atividade', 'media_buttons' => false, 'textarea_rows' => 5 ) );

}


function sugeridas_atividade_inner_meta_box($post) {

	global $post;
    $values = get_post_custom( $post->ID );
    $sugeridas = isset( $values['sugeridas_atividade'] ) ? esc_attr( $values['sugeridas_atividade'][0] ) : '';

	wp_nonce_field( 'sugeridas_atividade_box_nonce', 'sugeridas_atividade_meta_box_nonce' ); 

	wp_editor( html_entity_decode($sugeridas), 'sugeridas_atividade', array( 'textarea_name' => 'sugeridas_atividade', 'media_buttons' => false, 'textarea_rows' => 5 ) );

}

add_action( 'save_post', 'gamecdilan_form_atividade_save_post' );  
function gamecdilan_form_atividade_save_post( $post_id )
{  
    /* --- security verification --- */  
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {  
      return $id;  
    } // end if  
  
    if(!current_user_can('edit_page', $id)) {  
        return $id;  
    } // end if  
    /* - end security verification - */  
  
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['form_atividade_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['form_atividade_meta_box_nonce'], 'form_atividade_box_nonce' ) ) return; 
  
    // Make sure your data is set before trying to save it  
    if(isset( $_POST['form_atividade']))
        update_post_meta( $post_id, 'form_atividade', $_POST['form_atividade'] );  

} 

add_action( 'save_post', 'gamecdilan_dicas_atividade_save_post' );  
function gamecdilan_dicas_atividade_save_post( $post_id )
{  
    /* --- security verification --- */  
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {  
      return $id;  
    } // end if  
  
    if(!current_user_can('edit_page', $id)) {  
        return $id;  
    } // end if  
    /* - end security verification - */  
  
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['dicas_atividade_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['dicas_atividade_meta_box_nonce'], 'dicas_atividade_box_nonce' ) ) return; 
  
    // Make sure your data is set before trying to save it  
    if(isset( $_POST['dicas_atividade']))
        update_post_meta( $post_id, 'dicas_atividade', $_POST['dicas_atividade'] );  

}


add_action( 'save_post', 'gamecdilan_sugeridas_atividade_save_post' );  
function gamecdilan_sugeridas_atividade_save_post( $post_id )
{  
    /* --- security verification --- */  
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {  
      return $id;  
    } // end if  
  
    if(!current_user_can('edit_page', $id)) {  
        return $id;  
    } // end if  
    /* - end security verification - */  
  
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['sugeridas_atividade_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['sugeridas_atividade_meta_box_nonce'], 'sugeridas_atividade_box_nonce' ) ) return; 
  
    // Make sure your data is set before trying to save it  
    if(isset( $_POST['sugeridas_atividade']))
        update_post_meta( $post_id, 'sugeridas_atividade', $_POST['sugeridas_atividade'] );  

} 

?>