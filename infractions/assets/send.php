<?php

	// Sends all the parameters to the newly created table.
	$ct->table($params);
	$ct->pager = theSexyLoadingSystem('ct',$page,$ct->total_items,$ct->items_per_page);


	// I used a post request to push the AJAX display
	if ($_POST['ajax_option']!='') {
		echo json_encode($ct->display($_POST['ajax_option'],true));
		exit;
	} else {
		$out=$ct->display();
	}

?>