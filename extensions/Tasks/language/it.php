?<?php
/**
 * Italian language file for the 'Tasks' extension (by BrokenArrow)
 */

// We will add messages to the global cache
global $wgMessageCache;

// Add messages
$wgMessageCache->addMessages(
	array(
		'tasks_tab' => 'Attivit�',
		'tasks_title' => "Attivit� per \"$1\"",
		'tasks_form_new' => "Crea attivit�",
		'tasks_form_comment' => "Commento",
		'tasks_error1' => "Impossibile creare l'attivit� (attivit� gi� esistente).",
		'tasks_ok1' => "Attivit� creata",
		'tasks_create_header' => "Crea una nuova attivit�",
		'tasks_existing_header' => "Attivit� esistenti",
		'tasks_existing_table_header' => "Attivit�|Date|Commento iniziale|Assegnazione/Azioni/Pagina",
		'tasks_noone' => "nessuno",
		'tasks_assign_me' => "Assegna a me stesso",
		'tasks_assign_to' => "Assegna a",
		'tasks_unassign_me' => "Elimina assegnazione",
		'tasks_close' => "Chiudi attivit�",
		'tasks_wontfix' => "Ignora",
		'tasks_delete' => "Elimina",
		'tasks_no_task_delete_title' => "Operazione non consentita",
		'tasks_no_task_delete_texe' => "L'eliminazione delle attivit� � riservata ai soli amministratori.",
		'tasks_action_delete' => "Attivit� eliminata.",
		'tasks_task_was_deleted' => "L'attivit� � stata eliminata correttamente.",
		'tasks_reopen' => "Riapri attivit�",
		'tasks_assignedto' => "Assegnata a $1",
		'tasks_created_by' => "Creata da $1",
		'tasks_discussion_page_link' => "Pagina di discussione dell'attivit�",
		'tasks_closedby' => "Chiusa da $1",
		'tasks_assigned_myself_log' => "Autoassegnazione dell'attivit� \"$1\"",
		'tasks_discussion_page_for' => "Questa attivit� � relativa alla pagina \"$1\". L'elenco di tutte le attivit� relative alla pagina � $2.",
		'tasks_sidebar_title' => "Attivit� aperte",
		'tasks_here' => "qui",
		'tasks_returnto' => "Reindirizzamento in corso. Se il reindirizzamento non viene eseguito entro pochi secondi, fare clic $1.",
		'tasks_see_page_tasks' => "(attivit� per questa pagina)",
		'tasks_task_is_assigned' => "(assegnata)",
		'tasks_plain_text_only' => "(solo testo, massimo 256 caratteri)",
		'tasks_help_page' => "Attivit�",
		'tasks_help_page_link' => "?",
		'tasks_help_separator' => "$2 | $1",
		'tasks_more_like_it' => "altre",

		'tasks_task_types' => "1:cleanup:Aiutare|2:wikify:Wikificare|3:rewrite:Riscrivere|4:delete:Cancellare|5:create:Creare|6:write:Scrivere|7:check:Verificare",
		'tasks_significance_order' => "rewrite<delete",
		'tasks_creation_tasks' => "5,6",
		
		'tasks_event_on_creation' => "check",
		'tasks_event_on_creation_anon' => "check",
		'tasks_on_creation_comment' => "Attivit� generata automaticamente alla creazione della voce",
		
		'tasks_link_your_assignments' => "attivit� assegnate aperte",
		'tasks_see_your_assignments' => "Attivit� assegnate aperte in questo momento: $1. Si veda $2.",
		'tasks_my_assignments' => "Attivit� assegnate",
		'tasks_table_header_page' => "Pagina",
		'tasks_you_have_no_assignments' => "Nessuna attivit� assegnata aperta",
		'tasks_search_form_title' => "Ricerca",
		'tasks_search_tasks' => "Attivit�",
		'tasks_search_status' => "Stato",
		'tasks_search_no_tasks_chosen_note' => "(nessuna selezione = cerca tutte le attivit�)",
		'tasks_search_results' => "Risultati della ricerca",
		'tasks_previous' => "Precedenti",
		'tasks_next' => "Successivi",
		'tasks_sort' => "Ordine",
		'tasks_ascending' => "Cronologico",
		'tasks_search_limit' => "10",
		
		'tasks_status_open' => "Aperta",
		'tasks_status_assigned' => "Assegnata",
		'tasks_status_closed' => "Chiusa",
		'tasks_status_wontfix' => "Ignorata",
		'tasks_action_open' => "Attivit� \"$1\" aperta.",
		'tasks_action_assigned' => "Attivit� \"$1\" assegnata.",
		'tasks_action_closed' => "Attivit� \"$1\" chiusa.",
		'tasks_action_wontfix' => "Attivit� \"$1\ ignorata.",
		
		'tasks_sign_delete' => "<b>Per questa pagina � stata richiesta la cancellazione.</b>",
		
		'tasks_logpage' => "Registro attivit�",
		'tasks_logpagetext' => 'Registro delle modifiche alle attivit�',
		'tasks_logentry' => 'Per "[[$1]]"',
		
		'tog-show_task_comments' => 'Inclusione della pagina dei commenti dell\'attivit�',
	)
);
?>
