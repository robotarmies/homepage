<?php
    require_once ('core.php');
    $core = new Homepage_Core_Functions();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/icon" href="img/favicon.ico">

    <title>Be Awesome, Dude</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400|Englebert' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' type='text/css'>

    <!-- Custom Theme CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- Custom Random BG script -->
    <style>
    .intro {background: url(<?php echo $core->getBackground() ?>) no-repeat top center scroll !important;}
    </style>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">
                    <i class="fa fa-clock-o"></i>
                    <span class="light"><?php echo date('l, F jS Y') ?> / </span>
                    <div id="weather" align="center">69° F & Sunny</div> /
                    <div id="clock">4:20:00 PM</div>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#feeds">Feeds</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#work">Work</a>
                    </li>
<!--                    <li class="page-scroll">-->
<!--                        <a href="#ideas">Ideas</a>-->
<!--                    </li>-->
                    <li class="page-scroll">
                        <a href="#etc">Etc.</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <section class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-offset-2">
                        <!-- Google Search -->
                        <article class="newsbox">
                            <form method="get" action="http://www.google.com/search">
                                <input type="text" name="q" size="50" maxlength="255" value="" style="font-size: 1.7em; width: 60%; margin: 0 5px 10px 0"/>
                                <input type="submit" value="Learn" style="font-size:2em; display: inline;"/>
                            </form>
                        </article>
<!--                        <h1 class="brand-heading">Be Awesome</h1>-->
<!--                        <p class="intro-text">Or at least <i>try</i> to kick some butt every day.</p>-->
<!--                        <div class="page-scroll">-->
<!--                            <a href="#about" class="btn btn-circle">-->
<!--                                <i class="fa fa-angle-double-down animated"></i>-->
<!--                            </a>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="feeds" class="container content-section text-center">
        <div class="row">
            <div class="col-md-6 text-left">
                <div class="service-item">
                    <i class="service-icon fa fa-music cl-icon"></i>
                    <h4 class="cl-feed">Instruments</h4>
                    <div class="craigslist feed">
                        <?php $core->getCLFeed("http://charleston.craigslist.org/search/msa?query=bass&srchType=A&format=rss", 15); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6 text-left">
                <div class="service-item">
                    <i class="service-icon fa fa-motorcycle cl-icon"></i>
                    <h4 class="cl-feed">Motorcycles</h4>
                    <div class="craigslist feed">
                        <?php $core->getCLFeed("http://charleston.craigslist.org/search/mca?hasPic=1&query=cafe%20racer&srchType=A&format=rss", 15, 2); ?>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="work" class="container content-section text-center">
        <div class="row">

            <div class="col-md-12 text-left">
                <div class="service-item">
                    <i class="service-icon fa fa-cloud-upload cl-icon"></i>
                    <h4 class="cl-feed">Beanstalk</h4>
                    <div class="beanstalk feed">
                        <?php $core->getBstalkFeed("https://james@blueacorn.com:pass4james@blueacorn.beanstalkapp.com/atom/65269fd822a19ab818d80f8a5a48d43771b60ae2", 10); ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
<!--
    <section id="etc" class="container content-section text-center">
        <div class="row">
            <div class="col-md-9 col-md-offset-2 text-center">
                <div class="service-item">
                    <?php //foreach ($core->getNasaImage('http://www.nasa.gov/rss/dyn/lg_image_of_the_day.rss') as $image){ echo "<img class='nasa' src='$image'/>";} ?>
                </div>
            </div>
        </div>
    </section>
-->
    <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - You will need to use your own API key to use the map feature -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYuzmdEv6OGJxZVtu9PkMsZSAJ6-GI--M&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>
    <script type="text/javascript" src="js/jquery.simpleWeather.js"></script>

</body>
</html>
