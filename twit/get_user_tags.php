<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

function get_user_tags($start,$results_per_page) {
	global $db;

	$query = "SELECT COUNT( * ) AS cnt, tag
		FROM user_tags
		GROUP BY user_tags.tag
		ORDER BY cnt DESC 
		LIMIT $start, $results_per_page";

	return $db->select_array($query);
}
?>