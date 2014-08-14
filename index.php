<?php require_once "includes/functions.php"; ?>
<?php date_default_timezone_set('America/New_York'); ?>
<!doctype html>
<html lang="en">
<head>
    <title>Bruner Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLING -->
    <link type="text/css" href="css/styles.css" rel="stylesheet" media="screen" />
    <link type="text/css" href="css/bootstrap.css" rel="stylesheet" media="screen"/>
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="js/easypaginate.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.simpleWeather.js"></script>
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
    <body>

        <header>
    <div class="container1">
        <h5 class="fontface title title-left"><?php echo getVersion(); ?></h5>
        <h5 class="fontface title title-right"><?php echo date('l, F jS Y') ?></h5>
    </div>
</header>

        <nav>
    <div class="menu">
        <ul>
            <li><a href="http://localhost">LOCALHOST</a></li>
            <li><a href="http://localhost/phpmyadmin">PHPMYADMIN</a></li>
            <li><a href="http://thepiratebay.se">PBAY</a></li>
            <li><a href="http://eztv.it">EZTV</a></li>
            <li><a href="http://www.mint.com">MINT</a></li>
            <li><a href="http://www.google.com">GOOGLE</a></li>
            <li><a href="http://www.gmail.com">GMAIL</a></li>
            <li><a href="http://media.robotarmies.com">MOVIE FINDER</a></li>
            <li><a href="http://ocw.mit.edu/index.htm">MIT CLASSES</a></li>
        </ul>
    </div>
</nav>
            <div id="wrapper"><!-- #wrapper -->
    <section id="main"><!-- #main content and sidebar area -->

<!--        <aside id="sidebar1"><!-- sidebar1 -->
<!--            <div id="weather" align="center"></div>-->
<!--        </aside><!-- end of sidebar1 -->


        <section id="content"><!-- #content -->






<!--            <article class="group3">-->
<!--                <h2><a href="#">First Interesting Section Title</a></h2>-->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. <a href="#">Duis sagittis ipsum</a>. Sed cursus ante dapibus diam. </p>-->
<!---->
<!--            </article>-->
<!---->
<!--            <article class="group3">-->
<!--                <h2><a href="#">Second Section or Article Title</a></h2>-->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.  </p>-->
<!--            </article>-->
<!--            <article class="group3">-->
<!--                <h2><a href="#">First Interesting Section Title</a></h2>-->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. <a href="#">Duis sagittis ipsum</a>. Sed cursus ante dapibus diam. Sed nisi.</p>-->
<!---->
<!--            </article>-->

            <article class="newsbox">
                    <form method="get" action="http://www.google.com/search">
                    <input type="text"   name="q" size="37" maxlength="255" value="" style="width: 545px"/>
                    <input type="submit" value="Google Search" style="font-size:16px; float: right"/>
                </form>
            </article>

            <div class="newsbox">
                <h5>Instruments</h5>
                <div class="craigslist feed">
                    <?php getCLFeed("http://charleston.craigslist.org/search/msa?query=bass&srchType=A&format=rss", 15); ?>
                </div>
                <h5>Motorcylces</h5>
                <div class="craigslist feed">
                    <?php getCLFeed("http://charleston.craigslist.org/search/mca?hasPic=1&maxAsk=2000&minAsk=400&srchType=A&format=rss", 15); ?>
                </div>
            </div>
        </section>

        <aside id="sidebar2"><!-- sidebar2 -->

            <div id="weather" align="center"></div>

            <h4>BA Blog</h4>
            <div class="blueacorn feed">
                <?php getFeed("http://www.blueacorn.com/feed", 5); ?>
            </div>


            <h4>Beanstalk</h4>
            <div class="beanstalk feed">
                <?php getBstalkFeed("https://james@blueacorn.com:pass4james@blueacorn.beanstalkapp.com/atom/65269fd822a19ab818d80f8a5a48d43771b60ae2", 10); ?>
            </div>








        </aside><!-- end of sidebar -->

    </section><!-- end of #main content and sidebar-->
</div>
        <footer>
    <div class="container1">
        <section id="footer-area">

<!--            <section id="footer-outer-block">-->
<!--                <aside class="footer-segment">-->
<!--                    <h4>News</h4>-->
<!--                    <ul>-->
<!--                        <li><a href="#">U.S.</a></li>-->
<!--                        <li><a href="#">Local</a></li>-->
<!--                        <li><a href="#">World</a></li>-->
<!--                    </ul>-->
<!--                </aside><!-- end of #first footer segment -->
<!---->
<!--                <aside class="footer-segment">-->
<!--                    <h4>About Us</h4>-->
<!--                    <ul>-->
<!--                        <li><a href="#">Corporate HQ</a></li>-->
<!--                        <li><a href="#">Staff</a></li>-->
<!--                        <li><a href="#">History</a></li>-->
<!--                    </ul>-->
<!--                </aside><!-- end of #second footer segment -->
<!---->
<!--                <aside class="footer-segment">-->
<!--                    <h4>Contact Us</h4>-->
<!--                    <ul>-->
<!--                        <li><a href="#">Customer Support</a></li>-->
<!--                        <li><a href="#">Divisions</a></li>-->
<!--                        <li><a href="#">Investor Relations</a></li>-->
<!--                        <li><a href="#">Job Opportunities</a></li>-->
<!--                    </ul>-->
<!--                </aside><!-- end of #third footer segment -->

<!--                <aside class="footer-segment">-->
<!--                    <h4>Blahdyblah</h4>-->
<!--                    <p>&copy; 2010 <a href="#">yoursite.com</a> Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</p>-->
<!--                </aside><!-- end of #fourth footer segment -->
<!---->
<!--            </section><!-- end of footer-outer-block -->

        </section><!-- end of footer-area -->
    </div>
</footer>
        <!-- Free template distributed by http://freehtml5templates.com -->

        <!-- SIMPLE WEATHER -->
        <script>
    $.simpleWeather({
        zipcode: '29464',
        unit: 'f',
        success: function(weather) {
//    html = '<h2>'+weather.city+', '+weather.region+' '+weather.country+'</h2>';
            html = '<img align="right" style="width:100px" src="'+weather.image+'">';
//    html += '<p class="temp"><strong>Today\'s High</strong>: '+weather.high+'&deg; '+weather.units.temp+'<br />';
//    html += '<strong>Today\'s Low</strong>: '+weather.low+'&deg; '+weather.units.temp+'</p>';
            html += '<span class="temp-current"><strong>'+weather.temp+'&deg; '+weather.units.temp+'</strong></span>';
            html += '<span class="temp">High: '+weather.high+'&deg; '+weather.units.temp+' | ';
            html += 'Low: '+weather.low+'&deg; '+weather.units.temp+'</span>';
            //                html += '<p><strong>Thumbnail</strong>: <img src="'+weather.thumbnail+'"></p>';
//    html += '<p><strong>Wind</strong>: '+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+' <strong>Wind Chill</strong>: '+weather.wind.chill+'</p>';
//    html += '<p><strong>Currently</strong>: '+weather.currently+' - <strong>Forecast</strong>: '+weather.forecast+'</p>';
            //                html += '<p><strong>Humidity</strong>: '+weather.humidity+' <strong>Pressure</strong>: '+weather.pressure+' <strong>Rising</strong>: '+weather.rising+' <strong>Visibility</strong>: '+weather.visibility+'</p>';
            //                html += '<p><strong>Heat Index</strong>: '+weather.heatindex+'"></p>';
//                    html += '<span class="sunrise"><strong>Sunrise</strong>: '+weather.sunrise+' - <strong>Sunset</strong>: '+weather.sunset+'</span>';
            //                html += '<p><strong>Tomorrow\'s Date</strong>: '+weather.tomorrow.day+' '+weather.tomorrow.date+'<br /><strong>Tomorrow\'s High/Low</strong>: '+weather.tomorrow.high+'/'+weather.tomorrow.low+'<br /><strong>Tomorrow\'s Forecast</strong>: '+weather.tomorrow.forecast+'<br /> <strong>Tomorrow\'s Image</strong>: '+weather.tomorrow.image+'</p>';
//    html += '<p><strong>Last updated</strong>: '+weather.updated+'</p>';
            //                html += '<p><a href="'+weather.link+'">View forecast at Yahoo! Weather</a></p>';

            $("#weather").html(html);
        },
        error: function(error) {
            $("#weather").html("<p>"+error+"</p>");
        }
    });
</script>

    </body>
</html>
