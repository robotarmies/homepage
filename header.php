<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Bruner Home Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- STYLING -->
        <link type="text/css" href="css/bootstrap.css" rel="stylesheet" media="screen"/>
<!--        <link type="text/css" href="css/bootstrap-responsive.css" rel="stylesheet" media="screen"/>-->
        <link type="text/css" href="css/style.css" rel="stylesheet" media="screen" />
        <!-- JS -->
        <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
        <script type="text/javascript" src="js/easypaginate.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/jquery.simpleWeather.js"></script>
        <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->


        <!-- ADDITIONAL JAVASCRIPT -->
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


    </head>