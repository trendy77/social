<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

function get_search_users($where,$start,$results_per_page) {
	global $db;

	$query = "SELECT * 
		FROM users
		$where
		ORDER BY followers_count DESC
		LIMIT $start, $results_per_page";

	return $db->select_array($query);
}
?>