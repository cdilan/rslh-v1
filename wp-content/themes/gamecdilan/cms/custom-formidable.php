<?php
/* funções relacionadas ao Formidable */

/*************************************************************
# Atualiza usermeta do jogador ao enviar cadastro
*************************************************************/

add_action('frm_after_create_entry','altera_usermeta_via_form_basico', 20,2);
add_action('frm_after_update_entry','altera_usermeta_via_form_basico', 20,2);

function altera_usermeta_via_form_basico ($entry_id, $form_id) {

	if ($form_id == 7) {
		update_user_meta ($_POST['item_meta'][95], 'first_name', $_POST['item_meta'][100]);
		update_user_meta ($_POST['item_meta'][95], 'last_name', $_POST['item_meta'][101]);
		update_user_meta ($_POST['item_meta'][95], 'nickname', $_POST['item_meta'][102]);
		update_user_meta ($_POST['item_meta'][95], 'lanhouse', $_POST['item_meta'][106]);

	}
}


/*************************************************************************
# Atualiza usuário de assinante para jogador ao enviar Termo de USO
*************************************************************************/

add_action('frm_after_create_entry', 'altera_assinante_para_jogador', 20, 2);
add_action('frm_after_update_entry', 'altera_assinante_para_jogador', 20, 2);

function altera_assinante_para_jogador($entry_id, $form_id) {

	if ($form_id == 6) {
		$user_id = get_current_user_id();
		$user_id_role = new WP_User($user_id);
		$user_id_role->set_role('jogador');
		update_user_meta ($user_id, 'show_admin_bar_front' , 'false');
	}
}

?>