<?php
/**
* 140dev_config.php
* Constants for the entire 140dev Twitter framework
* You MUST modify these to match your server setup when installing the framework
* 
* Latest copy of this code: http://140dev.com/free-twitter-api-source-code-library/
* @author Adam Green <140dev@gmail.com>
* @license GNU Public License
* @version BETA 0.30
*/

// OAuth settings for connecting to the Twitter streaming API
// Fill in the values for a valid Twitter app
define('TWITTER_CONSUMER_KEY','2vOkc55DN1UbX6NJjJawC7UNM');
define('TWITTER_CONSUMER_SECRET','tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V');
define('OAUTH_TOKEN','817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq');
define('OAUTH_SECRET','6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5');

// Settings for monitor_tweets.php
define('TWEET_ERROR_INTERVAL',10);
// Fill in the email address for error messages
define('TWEET_ERROR_ADDRESS','trendypublishingau@gmail.com');
?>