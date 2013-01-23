<?php

//	##################################
	##          sconnect 			##
	## como usar:					##
	## 		[sconnect]				##
	##################################
add_shortcode( 'sconnect', 'sconnect_shortcode' );
	function sconnect_shortcode () {
		do_action( 'social_connect_form' );
	}

//	##########################################
	##				cubpoints				##
	## para usar:							##
	##		[cpoints uid=<id do usuário>]	##
	########################################## 

function pega_pontos_jogador ($atts) {
	extract( shortcode_atts ( array (
				'uid' => 'vazio',
	), $atts ) );
	$cpoints = cp_getPoints($uid);
	return $cpoints;
}
add_shortcode( 'cpoints', 'pega_pontos_jogador');
?>