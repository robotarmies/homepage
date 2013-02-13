<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bruner Home Page</title>
        <link type="text/css" href="css/wamp_dir_style.css" rel="stylesheet" />
        <link type="text/css" href="css/smoothness/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
        <link type="text/css" href="css/style.css" rel="stylesheet" />
        <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
        <script type="text/javascript" src="js/easypaginate.js"></script>
        <script type="text/javascript" src="js/jquery.simpleWeather.js"></script>
        <script type="text/javascript">
            $(function(){

                // Accordion
                $("#accordion").accordion({ 
                    header: "h3", 
                    active: false, 
                    collapsible: true 
                });

                // Tabs
                $('#tabs').tabs();

                // Dialog
                $('#dialog').dialog({
                    autoOpen: false,
                    width: 600,
                    buttons: {
                        "Ok": function() {
                            $(this).dialog("close");
                        },
                        "Cancel": function() {
                            $(this).dialog("close");
                        }
                    }
                });

                // Dialog Link
                $('#dialog_link').click(function(){
                    $('#dialog').dialog('open');
                    return false;
                });

                // Datepicker
                $('#datepicker').datepicker({
                    inline: true
                });

                // Slider
                $('#slider').slider({
                    range: true,
                    values: [17, 67]
                });

                // Progressbar
                $("#progressbar").progressbar({
                    value: 20
                });

                //hover states on the static widgets
                $('#dialog_link, ul#icons li').hover(
                function() { $(this).addClass('ui-state-hover'); },
                function() { $(this).removeClass('ui-state-hover'); }
            );

                //Easy Paginate
                $('ul#movie-list').easyPaginate({
                    step: 50,
                    delay: 30
                });

            });
        </script>
        <!--simple weather script-->
        <script>
            $.simpleWeather({
                zipcode: '29401',
                unit: 'f',
                success: function(weather) {
//    html = '<h2>'+weather.city+', '+weather.region+' '+weather.country+'</h2>';
                    html = '<img align="right" style="width:100px" src="'+weather.image+'">';
//    html += '<p class="temp"><strong>Today\'s High</strong>: '+weather.high+'&deg; '+weather.units.temp+'<br />';
//    html += '<strong>Today\'s Low</strong>: '+weather.low+'&deg; '+weather.units.temp+'</p>';
                    html += '<span class="temp-current"><strong>'+weather.temp+'&deg; '+weather.units.temp+'</strong></span>';
                    html += '<span class="temp">High of '+weather.high+'&deg; '+weather.units.temp+'<br />';
                    html += 'Low of '+weather.low+'&deg; '+weather.units.temp+'</span>';
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


    </head>
    <body>
        <div class="header">
            <div class="user-info-panel">
                <?php
                date_default_timezone_set('America/New_York');
                echo date('l, F jS Y'); ?>
                <br>

            </div>
        </div>