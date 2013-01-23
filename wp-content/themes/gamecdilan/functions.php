<?php

/***************************************************
#Carregando Custom Post Types
***************************************************/

require_once(TEMPLATEPATH . '/cms/custom.php');

/***************************************************
#Carregando Shortcodes
***************************************************/

require_once(TEMPLATEPATH . '/cms/shortcodes.php');

/***************************************************
#Carregando Customizações Formidable
***************************************************/

require_once(TEMPLATEPATH . '/cms/custom-formidable.php');

/***************************************************
#Carregando Javascripts
***************************************************/

add_action('template_redirect', 'js_head_load');
function js_head_load(){

	//Load jQuery
	wp_enqueue_script('jquery');

	//Load Bootstrap Scripts
	wp_register_script('bootstrap', get_bloginfo('template_directory').'/js/bootstrap.js');
	wp_enqueue_script('bootstrap');

	//Load Modernizr
	wp_register_script('modernizr', get_bloginfo('template_directory').'/js/modernizr.min.js');
	wp_enqueue_script('modernizr');

	//Load Modernizr
	wp_register_script('game', get_bloginfo('template_directory').'/js/game.js');
	wp_enqueue_script('game');	

	if(is_page_template( 'template-episodios.php' )){

		//Load BoxSlider
		wp_register_script('boxslider', get_bloginfo('template_directory').'/js/boxslider.min.js');
		wp_enqueue_script('boxslider');	

		//Load BoxSlider
		wp_register_script('episodios', get_bloginfo('template_directory').'/js/episodios.js');
		wp_enqueue_script('episodios');

	}

}

/***************************************************
# Configurações gerais do tema
***************************************************/

//habilita imagem destacada
add_theme_support('post-thumbnails');

//habilita shortcodes nos widgets
add_filter('widget_text', 'do_shortcode');

//habilita menu dinamico
if ( function_exists( 'register_nav_menu' ) ) {
    register_nav_menus(
        array(
            'topmenu' => 'Menu no topo da pagina',
            'footermenu' => 'Menu no rodapé'
        )
    );
}

//show admin bar only for admins
if (!current_user_can('manage_options')) {
	add_filter('show_admin_bar', '__return_false');
}

/********************************************************************
# Adicionando as classes css no menu dropdown
********************************************************************/

class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_lvl( &$output, $depth ) {
		$indent = str_repeat( "\t", $depth );
		$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";		
	}

	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;           

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = ($args->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

        // new addition for active class on the a tag
        if(in_array('current-menu-item', $classes)) {
            $attributes .= ' class="active"';
        }

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		//$item_output .= '</a>';
		$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) ) 
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) ) 
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
				unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);

	}
}

