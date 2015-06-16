<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 6/15/2015
 * Time: 8:58 PM
 * Use this file to pull feeds on the cron and write them to a data file.
 */
require_once ('core.php');
$core = new Homepage_Core_Functions();

// Craigslist
$core->cacheFeed('http://charleston.craigslist.org/search/msa?query=bass&srchType=A&format=rss', 'craigslist.txt');
$core->cacheFeed('http://charleston.craigslist.org/search/mca?hasPic=1&maxAsk=2000&minAsk=400&srchType=A&format=rss', 'craigslist2.txt');

// Beanstalk - Do we even need this?
$core->cacheFeed('https://james@blueacorn.com:pass4james@blueacorn.beanstalkapp.com/atom/65269fd822a19ab818d80f8a5a48d43771b60ae2', 'beanstalk.txt');

// NASA Image(s) of the Day
$core->cacheFeed('http://www.nasa.gov/rss/dyn/lg_image_of_the_day.rss', 'nasa_images.txt');