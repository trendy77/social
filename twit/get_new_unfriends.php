<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

function get_new_unfriends($where,$start,$results_per_page) {
	global $db;

	$query = "SELECT follow_log.created_at AS date, users.* 
		FROM follow_log, users
		WHERE follow_log.user_id = users.user_id
		AND follow_log.event =  'unfriend'
		$where
		ORDER BY follow_log.created_at DESC
		LIMIT $start, $results_per_page";

	return $db->select_array($query);
}
?>