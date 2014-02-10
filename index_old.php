<?php
require_once "header.php";
require_once "includes/functions.php";
require_once "includes/config.php";
?>
<body>
<div class="header">
    <div class="user-info-panel">
        <?php
        date_default_timezone_set('America/New_York');
        echo date('l, F jS Y'); ?>


    </div>
</div>
<!-- ADD VERSIONING TO THE MASTHEAD -->
<div id="version"><?php echo "build ".getVersion(); ?></div>

<table align="center" class="content">
    <tr>
        <!-- COLUMN ONE -->
        <td valign="top">
            <div class="quick-links">
                <ul>
                    <li><a href="http://localhost">LOCALHOST</a></li>
                    <li><a href="http://localhost/phpmyadmin">PHPMYADMIN</a></li>
                    <li><a href="http://thepiratebay.se">PBAY</a></li>
                    <li><a href="http://www.mint.com">MINT</a></li>
                    <li><a href="http://www.robotarmies.com">ROBOT ARMIES</a></li>
                    <li><a href="http://www.google.com">GOOGLE</a></li>
                    <li><a href="http://media.robotarmies.com">MOVIE FINDER</a></li>
                    <li><a href="http://ocw.mit.edu/index.htm">MIT CLASSES</a></li>
                </ul>
            </div>


            <div id="weather" align="center" style="width:200px"></div>
            <div id="clear"></div>
<!--            <div class="countdown">-->
<!--                --><?php
//                $days = ceil((strtotime("8/17/2013") - time())/(60*60*24));
//                $s='';
//                if ($days!=1) {
//                    $s='s';
//                }
//                echo $days. " day$s until Colorado"; ?>
<!--            </div>-->
            </td>

        <!-- COLUMN TWO -->
        <td valign="top">
            <div style="border: 0px solid black; padding: 4px; width: 470px; margin: 20px;">
                <form method="get" action="http://www.google.com/search">
                    <input type="text"   name="q" size="37" maxlength="255" value="" style="font-size: 25px;"/>
                    <input type="submit" value="Google Search" style="font-size:16px; float: right;"/>  
                </form>
            </div>
            
            <div class="pics">
                <?php //echo showPhotos(5); ?>
            </div>

            <div class="craigslist">
                <?php
                getCLFeed("http://charleston.craigslist.org/search/msa?query=bass&srchType=A&format=rss", 15);
                getCLFeed("http://charleston.craigslist.org/search/mca?hasPic=1&maxAsk=2000&minAsk=400&srchType=A&format=rss", 15);
                ?>
            </div>

        </td>

        <!-- COLUMN THREE -->
        <td class="links" valign="top">
            <h4>Blue Acorn Feed:</h4>
            <div class="feed-blueacorn">
                <?php getFeed("http://www.blueacorn.com/feed", 5); ?>
            </div>

            <h4>Beanstalk Deployments:</h4>
            <div class="feed-blueacorn">
                <?php getBstalkFeed("https://james@blueacorn.com:robot911@blueacorn.beanstalkapp.com/atom/ef0b02e24321253b13d87e445e5c2b54aea831dc", 10); ?>
            </div>
<!--            <h4>Pirate Bay Feed:</h4>-->
<!--                        <div class="feed-pbay">-->
<!--            --><?php //makePirateFeed("http://thepiratebay.se/top/201"); ?>
<!--<!--                            http://rss.thepiratebay.se/user/d17c6a45441ce0bc0c057f19057f95e1-->-->
<!--                        </div>-->

        </td>
    </tr>

    <!--ROW 2 -->
    <tr>
        <!-- COLUMN 1 -->
        <td align="top">
<!--            <div class="countdown">-->
<!--                --><?php
//                $days = ceil((strtotime("8/17/2013") - time())/(60*60*24));
//                $s='';
//                if ($days!=1) {
//                    $s='s';
//                }
//                echo $days. " day$s until Colorado"; ?>
<!--            </div>-->

        </td>

        
        <!-- COLUMN 2 -->
        <td valign="top">
            <div class="craigslist">        
            </div>
        </td>
        
        <!-- COLUMN 3 -->
        <td valign="top">



                       
            
                  <!--      <h4>Stack Overflow:</h4>
                        <div class="feed-blueacorn">
            <?php //getFeed("http://stackoverflow.com/feeds/user/833795"); ?>
                        </div>-->
        </td>
    </tr>

</table>
</body>
</html>