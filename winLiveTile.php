<?php 
/// WINDOWS LIVE TILES FOR WEBSiTES
// IN HTML HEAD...
//

/**
 *
 */
function liveTile() {
		$url = home_url();				
	

	$picpath = '/home/organ151/public_html/ombiz/' . get_option('IDENTIFIER') . '/live/';

	echo '<meta name="application-name" content="' . $GLOBALS['name'] . '"/><meta name="msapplication-square70x70logo" content="' . $picpath . 'small.jpg"/>
	<meta name="msapplication-square150x150logo" content="' . $picpath . 'medium.jpg"/><meta name="msapplication-wide310x150logo" content="' . $picpath . 'wide.jpg"/>
	<meta name="msapplication-square310x310logo" content="' . $picpath . 'large.jpg"/><meta name="msapplication-TileColor" content="#ffffff"/><meta name="msapplication-notification" content="frequency=30;polling-uri=http://notifications.buildmypinnedsite.com/?feed=' . $url . '/feed&amp;id=1;polling-uri2=http://notifications.buildmypinnedsite.com/?feed=' . $url . '/feed&amp;id=2;polling-uri3=http://notifications.buildmypinnedsite.com/?feed='
	     . $url . '/feed&amp;id=3;polling-uri4=http://notifications.buildmypinnedsite.com/?feed=' . $url . '/feed&amp;id=4;polling-uri5=http://notifications.buildmypinnedsite.com/?feed=' . $url . '/feed&amp;id=5; cycle=1"/>';

}