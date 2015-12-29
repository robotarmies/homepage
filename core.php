<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 6/14/2015
 * Time: 1:31 PM
 */

class Homepage_Core_Functions {

    public function getBackground() {
        $bg_array = $this->getDirectoryList('img/bg');
        return "img/bg/".$bg_array[array_rand($bg_array)];
    }

    public function cacheFeed($feed_url = 'http://robotarmies.com', $name = 'feed.txt') {
        $content = file_get_contents($feed_url);
        $dir = 'feeds/';
        //open the file
        $file = fopen($dir.$name, "w+");
        //update the file
        $writeFile = fwrite($file, $content);
        //close and save
        fclose($file);
    }

    public function getCLFeed($feed_url, $count = 100, $next = null, $cache = true) {
        if ($cache == true){
            $feed_url = 'feeds/craigslist'.$next.'.txt';
        }
        $content = utf8_encode(file_get_contents($feed_url));

        $x = new SimpleXmlElement($content);
        echo "<ul>";
        $i = 0;
        foreach ($x->item as $entry) {
            if ($i < $count) {
                $date = new DateTime($entry->pubDate);
                echo "<li>" . $date->format('m/j') . " - <a href='$entry->link' title='$entry->description' target='_blank'>" . $entry->title . "</a></li>";
            }
            $i++;
        }
        echo "</ul>";
    }

    public function getNasaImage ($url = null, $count = 20, $cache = true) {
        $i = 0;
        $image = array();
        if ($cache == true){
            $url = 'feeds/nasa_images.txt';
        }
        $content = file_get_contents($url);
        $xml = new SimpleXmlElement($content);
        foreach ($xml->channel->item as $item) {
            $i++;
            if ($i < $count){
                $image[] = $item->enclosure->attributes()->url;
            }
        }
        return $image;
    }

    public function getBStalkFeed($feed_url, $count = 10, $cache = true) {
        try {
            if ($cache == true){
                $feed_url = 'feeds/beanstalk.txt';
            }
            $content = file_get_contents($feed_url);
            $x = new SimpleXmlElement($content);
            echo "<ul>";
            $i = 0;
            foreach ($x->entry as $entry) {
                if ($i < $count) {
                    $date = new DateTime($entry->updated);
                    $link = (string)$entry->link;
                    $newContent = preg_replace("/[\n]+/", "", $entry->content);
                    $newContent = preg_replace("/<p/", "<div", $newContent);
                    $newContent = preg_replace("/p>/", "div>", $newContent);
                    $title = strstr($entry->title, '/', true);
//                    echo "<li>" . $title . "</li>";
                    echo "<li>" . $date->format('F jS, Y') ." - " . (string)$entry->author->name . ": " . $title ."</li>";
                }
                $i++;
            }
            echo "</ul>";
        } catch (Exception $e) {
            //fail silently for now.
        }
    }

    public function getDirectoryList($directory) {
            // create an array to hold directory list
            $results = array();
            // create a handler for the directory
            $handler = opendir($directory);
            // open directory and walk through the filenames
            while ($file = readdir($handler)) {
                // if file isn't this directory or its parent, add it to the results
                if ($file != "." && $file != "..") {
                        $results[] = $file;
                }
            }
            // tidy up: close the handler
            closedir($handler);
            // done!
            return $results;
        }

    public function getCurrentWeather() {
        $json_string = file_get_contents("http://api.wunderground.com/api/3d9047991415094c/conditions/q/SC/Charleston.json");
        $parsed_json = json_decode($json_string);
        $location = $parsed_json->{'location'}->{'city'};
        $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
        //echo "Current temperature in ${location} is: ${temp_f}\n";
    }

    public function getForecast() {
        $json_string = file_get_contents("http://api.wunderground.com/api/3d9047991415094c/forecast/q/SC/Charleston.json");
        $parsed_json = json_decode($json_string);
        $forecast = $parsed_json->forecast->simpleforecast->forecastday;
        return $forecast;
    }

    public function getOutfit($high=null,$low=null,$rain=null,$hum=null,$wind=null) {
    //start with the basic thresholds
        $temp_index= array(
            'hot' => 90,
            'warm' => 75,
            'nice' => 65,
            'cool' => 55,
            'cold' => 45,
            'freezing' => 32);

        $outfit = NULL;
        $avg_temp = ($high + $low)/2;
        $temp_desc = null;

        foreach($temp_index as $key=>$val) {
            if ($avg_temp < $val || $low < $val) {
                $temp_desc = $key;
            }
        }

        // very basic men's outfit based on temp
        $outfit_matrix = array(
            'hot' => 'ssleeve,shorts',
            'warm' => 'ssleeve,pants',
            'nice' => 'lsleeve,pants',
            'cool' => 'lsleeve,pants,sweater',
            'cold' => 'lsleeve,pants,hoodie',
            'freezing' => 'lsleeve,pants,sweater,jacket'
        );
        $outfit = explode(',',$outfit_matrix[$temp_desc]);
        $results = array(
            'outfit'=>$outfit,
            'cond'=>$temp_desc
        );
        return $results;
    }

}