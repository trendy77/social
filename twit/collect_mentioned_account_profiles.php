<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

$query = "SELECT DISTINCT target_user_id AS user_id
	FROM tweet_mentions
	WHERE target_user_id NOT IN
		(SELECT user_id
		FROM users)
	LIMIT 15000";
	
require('collect_account_profiles.php');	
collect_account_profiles($query);
?>