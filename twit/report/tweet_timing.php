<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

require('../config.php');
require('../db_lib.php');
$db = new db();

// Get total number of tweets
$query = "SELECT count(*) AS cnt
	FROM tweets";
$results = $db->select($query);
$row = mysqli_fetch_assoc($results);
$total_tweets = $row['cnt'];

// Get number of tweets per day of week
require('../get_tweet_days.php');
$tweet_days = get_tweet_days();

// Create a string of data points for the Google chart
$day_chart_data = '';
foreach($tweet_days as $data){
	$tweet_day = $data['tweet_day'];
	$cnt = $data['cnt']/$total_tweets;
	$day_chart_data .= "['$tweet_day',$cnt],";		
}
// Clip off trailing comma
$day_chart_data = substr($day_chart_data,0,strlen($day_chart_data)-1);

// Get number of tweets per hour of day
require('../get_tweet_hours.php');
$tweet_hours = get_tweet_hours();

// Create a string of data points for the Google chart
$hour_chart_data = '';
foreach($tweet_hours as $data){
	$tweet_hour = $data['tweet_hour'];
	$cnt = $data['cnt']/$total_tweets;
	$hour_chart_data .= "['$tweet_hour',$cnt],";		
}
$hour_chart_data = substr($hour_chart_data,0,strlen($hour_chart_data)-1);

// Display report page with <div>s to hold charts
require('page_top.html');
print '<h2>Tweet Timing</h2>';
print '% of Tweets per day';
print '<div id="day_chart"></div>';

print "% of Tweets per hour (ET)";
print  '<div id="hour_chart"></div>';

?>
    
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	// Use Google charts API to display charts in these <div>s 

  // Load the Visualization API and the piechart package
  google.load('visualization', '1.0', {'packages':['corechart']});

  // Set a callback to run when the Google Visualization API is loaded
  google.setOnLoadCallback(drawDayChart);
  google.setOnLoadCallback(drawHourChart);
   
  function drawDayChart() {

    // Create the data table
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Day');
    data.addColumn('number', 'Tweets');
    data.addRows([ <?php print $day_chart_data; ?> ]);

    // Set chart options
    var options = {'width':500,
                   'height':400};

    // Draw the chart, passing in some options
    var chart = new google.visualization.ColumnChart(document.getElementById('day_chart'));
    chart.draw(data, options);
  }
  
  function drawHourChart() {

    // Create the data table
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Hour');
    data.addColumn('number', 'Tweets');
    data.addRows([ <?php print $hour_chart_data; ?> ]);

    // Set chart options
    var options = {'width':1000,
                   'height':400};

    // Draw the chart, passing in some options
    var chart = new google.visualization.ColumnChart(document.getElementById('hour_chart'));
    chart.draw(data, options);
  }
</script>

<?php
require('page_bottom.html');
?>