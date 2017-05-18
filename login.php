<?php

$fb = new Facebook\Facebook([
  'app_id' => get_option('fbappid'),
  'app_secret' => get_option('fbscrt'),
  'default_graph_version' => 'v2.9',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($_SERVER['home'] . '/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log into '<?php get_option('sitename');?>' with Facebook!</a>';

?>