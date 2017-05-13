<?php

$fb = new Facebook\Facebook([
  'app_id' => $GLOBALS['fbappid'];,
  'app_secret' => <?php $GLOBALS['fbscrt'];,
  'default_graph_version' => 'v2.9',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($GLOBALS['url'] . '/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';