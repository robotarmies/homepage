<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 6/14/2015
 * Time: 1:31 PM
 */

class Homepage_Core_Functions {

    public function getBackground() {
        $bg_array = array(
            "co_4.jpg",
            "co_5.jpg",
            "co_2.jpg",
            "space_1.jpg",
            "space_2.jpg",);
        return "img/bg/".$bg_array[array_rand($bg_array)];
    }

    public function getCLFeed($feed_url, $count = 100) {
        $content = file_get_contents($feed_url);
        $x = new SimpleXmlElement($content);
        echo "<ul>";
        $i = 0;
        foreach ($x->item as $entry) {
            if ($i < $count) {
                $date = new DateTime($entry->pubDate);
                echo "<li>" . $date->format('m/j') . " - <a href='$entry->link' title='$entry->title' target='_blank'>" . $entry->title . "</a></li>";
            }
            $i++;
        }
        echo "</ul>";
    }

    public function getBStalkFeed($feed_url, $count = 10) {
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
                    echo "<li>" . $entry->title . "</li>";
                }
                $i++;
            }
            echo "</ul>";
        } catch (Exception $e) {
            //fail silently for now.
        }

    }
}