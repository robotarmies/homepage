<?php

function getConfigDisplay(){
    $query = mysql_query("SELECT * FROM configuration");
    $return = '';
    if ($query){
        while ($config = mysql_fetch_assoc($query)) {
            $return .= $config['config'].": ".$config['value']."<br />";
        }
    }
    return $return;
}

function getVersion() {
    $content = file_get_contents('./config/version.xml');
    $x = new SimpleXmlElement($content);
    $version = 'build '.(string)$x->config->version;
    return $version;
}

function getFeed($feed_url, $count = 10) {
    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
    echo "<ul>";
    $i = 0;
    foreach ($x->channel->item as $entry) {
        if ($i < $count) {
        $date = new DateTime($entry->pubDate);
        echo "<li>" . $date->format('F jS') . "<span class='blog-title'><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></span></li>";
        }
        $i++;
    }
    echo "</ul>";
}

function getBStalkFeed($feed_url, $count = 10) {
    try {
        $content = file_get_contents($feed_url);
        $x = new SimpleXmlElement($content);
        echo "<ul>";
        $i = 0;
        foreach ($x->entry as $entry) {
            if ($i < $count) {
                $date = new DateTime($entry->updated);
                $link = (string) $entry->link;
                $newContent = preg_replace("/[\n]+/", "", $entry->content);
                $newContent = preg_replace("/<p/", "<div", $newContent);
                $newContent = preg_replace("/p>/", "div>", $newContent);

//        echo "<li>" . $date->format('F jS, Y') . " <a href='$link' title='$entry->title'>" . $entry->content . "</a></li>";
                echo "<li>" . $entry->summary . "</li>";
            }
            $i++;
        }
        echo "</ul>";
    } catch (Exception $e) {
        //fail silently for now.
    }

}

function getCLFeed($feed_url, $count = 100) {
    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
    echo "<ul>";
    $i = 0;
    foreach ($x->item as $entry) {
        if ($i < $count) {
        $date = new DateTime($entry->pubDate);
        echo "<li>" . $date->format('M jS') . " <a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
        }
        $i++;
    }
    echo "</ul>";
}

function getSOFeed($feed_url) {

    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
    echo "<ul>";
    foreach ($x->entry as $entry) {
        $date = new DateTime($entry->pubDate);
        echo "<li>" . $date->format('F jS, Y') . " <a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
    }
    echo "</ul>";
}

function cleanPbayTitle($title){
    $title = strtolower($title);
    $keywords = array('dvdrip','xvid','hdrip','brrip','lumix','ac3', 'line','r5','extended','(',')','-','lum1x','psig','playnow','unique','cocain','bdrip', 'sparks', 'retail','alliance');
    $x = str_replace($keywords, '', $title);
    $x = ucwords(str_replace('.',' ', $x));
    return $x;    
}

function makePirateFeed($url) {

    //grab the source file
    //if (file_exists($url)) {
        $raw = file_get_contents($url);
    //remove line breaks, extra spaces, etc.
        $newlines = array("\t", "\n", "\r", "\x20\x20", "\0", "\x0B");
        $content = str_replace($newlines, "", html_entity_decode($raw));
    //pull the content table
        $start = strpos($content, '<table id="searchResult">');
        $end = strpos($content, '</table>', $start) + 8;
        $table = substr($content, $start, $end - $start);
    //strip rows from the table
        preg_match_all("|<tr>(.*)</tr>|U", $table, $rows);
    //pull data from rows
        $i = 0;
        foreach ($rows[0] as $row) {
            $i++;
            if ($i < 17) {
                if ((strpos($row, '<th') === false)) {//don't pull table header
                    //extract div with data from row
                    //preg_match_all('|<div class="detName"(.*)</div>|U',$row,$div);
                    preg_match_all("|<td(.*)</td>|U", $row, $cells);
    //                roboDump($cells);
                    if (isset($cells[0][1])) {
                    $cell = $cells[0][1];
                    preg_match_all('|<div class="detName">(.*)</div>|U', $cell, $title);
                    $title = strip_tags($title[0][0]);
                    preg_match_all('|<a href="magnet(.*)" title=|U', $cell, $link);
                    $link = $link[1][0];
                    preg_match_all('|detDesc">(.*),|U', $cell, $date);
                    echo " <a style='text-decoration: none;' href='magnet" . $link . "'>link</a>: ";
                    echo cleanPbayTitle($title);
                    //echo "<br>";
    //                $formattedDate = $date[1][0];
    //                preg_match_all('|(.*)�|U', $formattedDate, $date);
    //                //var_dump($date);
    //                echo $date[1][0];
    //                echo " <a href='magnet" . $link . "'>magnet link</a>";
                    echo "<br>";}
                }
            } else {

            }
        }
    //}
    //else {echo "<span class='pbay-error'>feed not currently available</span>";}
}

function queryPirateFeed($url, $query) {

//grab the source file
    $raw = file_get_contents($url);
//remove line breaks, extra spaces, etc.
    $newlines = array("\t", "\n", "\r", "\x20\x20", "\0", "\x0B");
    $content = str_replace($newlines, "", html_entity_decode($raw));
//pull the content table
    $start = strpos($content, '<table id="searchResult">');
    $end = strpos($content, '</table>', $start) + 8;
    $table = substr($content, $start, $end - $start);
//strip rows from the table
    preg_match_all("|<tr>(.*)</tr>|U", $table, $rows);
//pull data from rows
    $i = 0;
    foreach ($rows[0] as $row) {
        $i++;
        if ($i < 100) {
            if ((strpos($row, '<th') === false)) {//don't pull table header
                //extract div with data from row
                //preg_match_all('|<div class="detName"(.*)</div>|U',$row,$div);
                preg_match_all("|<td(.*)</td>|U", $row, $cells);
                $cell = $cells[0][1];
                preg_match_all('|<div class="detName">(.*)</div>|U', $cell, $title);
                $title = $title[0][0];
                $title = strip_tags($title);
                $title = strtolower($title);
                preg_match_all('|<a href="magnet(.*)" title=|U', $cell, $link);
                $link = $link[1][0];
                preg_match_all('|detDesc">(.*),|U', $cell, $date);
                $match = strpos($title, $query);
                if ($match !== false) {
                    header("Location: magnet$link");
                    exit();
                }
                //echo $match;
//                echo "<b>" . $title . "</b> ";
//                echo "<br>";
                //$formattedDate = $date[1][0];
                //preg_match_all('|(.*)�|U', $formattedDate, $date);
                //var_dump($date);
                //echo $date[1][0];
                //echo " <a href='magnet" . $link . "'>magnet link</a>";
            }
        } else {
            
        }
    }
    //header('Location: ../find_movies.php?results=0');
}

function getDirectoryList($directory) {
    // create an array to hold directory list
    $results = array();
    // create a handler for the directory
    $handler = opendir($directory);
    // open directory and walk through the filenames
    while ($file = readdir($handler)) {
        // if file isn't this directory or its parent, add it to the results
        if ($file != "." && $file != "..") {
            if (strpos($file, ".srt") == false) {
                $results[] = $file;
            }
        }
    }
    // tidy up: close the handler
    closedir($handler);
    // done!
    return $results;
}

function getMovieList() {
    $query = mysql_query("SELECT * FROM movies ORDER BY title ASC") or die(mysql_error());
    //$result = mysql_result($query);
    return $query;
}

function showPhotos($count) {
    $photos = array(
        0 => array(
            'id' => 1,
            'path' => 'path/to/file.png'
        ),
    );
    foreach ($photos as $photo){
        $x = "<span class='photos'>";
        $x .="<img src='".$photo['path']."'>";
        $x .= "</span>";
    }
    
}

function roboDump($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

/*
start of global functions
*/
 function getUser($id = NULL) {
     $id = 1;
     $query = mysql_query("SELECT * FROM users WHERE id = $id");
     $user = mysql_fetch_array($query);
     return $user;
 }

function getGoals(){
    $user = getUser();
    $userId = $user['id'];
    $query = mysql_query("SELECT * FROM  goals WHERE user_id = $userId");
    $array = NULL;
        if ($query) {
            while ($row = mysql_fetch_array($query)) {
                $array[] = $row;
            }
        }
    return $array;
}

function addGoalPoints($user, $goal, $points){
    mysql_query("INSERT INTO goals_log (user_id, goal_id, points_gained) VALUES ($user, $goal, $points )");
    $query = mysql_query("SELECT * FROM points WHERE user_id = $user");
    $pointsArray = mysql_fetch_array($query);
    $pointsToday = $pointsArray['points_today'] + $points;
    $pointsWeek = $pointsArray['points_week'] + $points;
    $pointsMonth = $pointsArray['points_month'] + $points;
    $pointsTotal = $pointsArray['points_total'] + $points;
        mysql_query("UPDATE points SET
            points_today = $pointsToday,
            points_week = $pointsWeek,
            points_month = $pointsMonth,
            points_total = $pointsTotal
        WHERE user_id = $user");
}

function showGoalsForm(){
    $goals = getGoals();
    $x = NULL;
    if (isset($goals)){
        foreach ($goals as $goal) {
            $id = $goal['id'];
            $x .= "<div class='levup-wrapper'><span class='goal'>GOAL: ";
            $x .= $goal['goal'];
            $x .= "</span><form action='functions/levelup.php' method='GET' id='goal-form-".$id."' >";
            $x .= "<input type='hidden' name='".$id."' value='1'>";
            $x .= "<input type='submit' class='button-levup' value='i did that today.' ></form></div>";
        }
    }
    else {
        $x .= '<i>you have no goals yet.</i>';
    }

    return $x;
}

function showPointTotals(){
    $user = getUser();
    $userId = $user['id'];
    $query = mysql_query("SELECT * FROM points WHERE user_id = $userId");
        if ($query) {
            $points = mysql_fetch_assoc($query);
        }
        $x = "<span class='lvlup-totals'>";
        $x .= "today: ". $points['points_today']."<br />";
//        $x .= "this week: ". $points['points_week']."<br />";
//        $x .= "this month: ".$points['points_month']."<br />";
        $x .= "total: ".$points['points_total']."<br /><br />";
    //Now we get the level and do the math
    $level = getLevel($user);
        $x .="<b>level ".$level."</b></span>";

    return $x;
}

function getLevel($user){
    $levelMarks = getLevelMarks();
    $level = $user['level'];
    $userId = $user['id'];
    $query = $query = mysql_query("SELECT * FROM points WHERE user_id = $userId");
        if ($query){
            $pointsArray = mysql_fetch_assoc($query);
        }
    $points = $pointsArray['points_total'];
    $nextLevel = ($level * 5);
    if ($points >= $nextLevel){
        //update level
        $level++;
        mysql_query ("UPDATE users SET level = $level WHERE id = $userId");
    }

        return $level;
}

function getLevelMarks(){
    $query = mysql_query("SELECT * FROM level_benchmarks");
    $levelMarks = array(
      0 => 0,
    );
    while ($row = mysql_fetch_array($query)){
        $levelMarks[] = $row;
    }
    return $levelMarks;
}
?>