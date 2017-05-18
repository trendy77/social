<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

require('page_top.html');

require('../config.php');
require('../db_lib.php');
$db = new db();

$table_name = 'tweet_retweets';
$report_name = 'leader_retweets.php';
require('select_date.php');

print '<h2>Top Leader Retweets</h2>';

require('../get_leader_retweets.php');
$users = get_leader_retweets($where,$page*$results_per_page, $results_per_page);
require('display_users.php');

require('page_bottom.html');
?>