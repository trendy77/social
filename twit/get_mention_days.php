<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

function get_mention_days() {
	global $db;

	$query = "SELECT dayname(created_at) AS tweet_day, count(*) AS cnt
		FROM tweet_mentions
		GROUP BY dayname(created_at)
		ORDER BY dayofweek(created_at)";

	return $db->select_array($query);
}
?>