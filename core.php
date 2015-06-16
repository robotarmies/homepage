<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 6/14/2015
 * Time: 1:31 PM
 */

class Homepage_Core_Functions {

    public function getBackground() {

//        $bg_array = $this->getNasaImage($count = 20);
        $bg_array = $this->getDirectoryList('img/bg');
//        $bg_array = array(
//            "co_4.jpg",
//            "co_5.jpg",
//            "co_2.jpg",
//            "space_1.jpg",
//            "space_2.jpg",);
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
        $content = file_get_contents($feed_url);
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

    public function getBStalkFeed($feed_url, $count = 10, $cache = true)
    {
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

//        echo "<li>" . $date->format('F jS, Y') . " <a href='$link' title='$entry->title'>" . $entry->content . "</a></li>";
                    echo "<li>" . $entry->title . "</li>";
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
}