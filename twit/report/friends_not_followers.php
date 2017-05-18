<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

require('page_top.html');

require('../config.php');
require('../db_lib.php');
$db = new db();

$report_name = 'friends_not_followers.php';
require('select_next_prev.php');

print '<h2>Friends who are not followers</h2>';

require('../get_friends_not_followers.php');
$users = get_friends_not_followers($page*$results_per_page, $results_per_page);
require('display_users.php');

require('page_bottom.html');
?>