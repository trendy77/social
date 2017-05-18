<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

require('page_top.html');

require('../config.php');
require('../db_lib.php');
$db = new db();

$table_name = 'tweet_mentions';
$report_name = 'all_mentions.php';
require('select_date.php');

print '<h2>Top Mentions by all Accounts</h2>';

require('../get_all_mentions.php');
$users = get_all_mentions($where,$page*$results_per_page, $results_per_page);
require('display_users.php');

require('page_bottom.html');
?>