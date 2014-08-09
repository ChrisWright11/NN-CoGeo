<!DOCTYPE html>

<html>
<head>

    <title>Submit</title>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <!-- jquery -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- jquery UI-->
    <script src="//code.jquery.com/ui/1.11.0/jqueryui/1.11.0/jquery-ui.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


    <!-- background line: url("http://wallpaperscraft.com/image/mountain_peak_stars_sky_night_light_snow_46057_1920x1200.jpg?orig=1"); -->
    <style>


        body {
            text-align: center;
            background-image: url("galaxy.jpg");
        <!-- background : url("http://wallpaperscraft.com/image/mountain_peak_stars_sky_night_light_snow_46057_1920x1200.jpg?orig=1");
        --> background-size : cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-repeat: no-repeat;
            background-position: position;

        }

        .controls {
            margin-top: 16px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        .sliders {

            width: 700px;
            margin-left: auto;
            margin-right: auto;

        }

        .low {
            float: left;
        }

        .high {
            float: right;
        }

        #map-canvas {
            height: 300px;
            margin: 0px;
            padding: 0px;
        }

        #place-input {
            background-color: #fff;
            padding: 0 11px 0 13px;
            width: 400px;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 3000;
            text-overflow: ellipsis;
        }

        #place-input:focus {
            border-color: #4d90fe;
            margin-left: -1px;
            padding-left: 14px;
            width: 401px;
        }

        h1 {
            text-align: center;
            color: white;
        }

        p {
            text-align: center;
            color: white;
        }

        h3 {
            text-align: center;
            color: white;
        }

        @media (max-width: 1000px) {

            .sliders {

                width: auto;
                margin-left: auto;
                margin-right: auto;

            }

            p {
                text-align: center;
                color: white;
            <!-- font-size : 8 px;
            -->
            }

            h3 {
                text-align: center;
                color: white;
            <!-- font-size : 16 px;
            -->
            }
			
			
		body {
			text-align: center;
			background-image: url("mobile.jpg");
			background-size: cover;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-repeat: no-repeat;
			background-position: center center fixed;

		}
	

        }


    </style>


</head>


<body>

<header class="navbar">
    <div class="container">


        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">CoGeo</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="places.php">Search</a></li>
                        <li class="active"><a href="submit.php">Add Spot</a></li>

                    </ul>


                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
</header>

<div class="container">

    <h1> Add your spot!</h1>

    <p>
        Enter the name of your spot below and then rate it on the feelings shown from 0 - 10;
    </p>

    <h3></h3>
    </br>
    </br>

    <input id="place-input" type="text" class="controls" name="name1" placeholder="Enter Here"/>

    <form action="dynamodbUploader.php" method="post" name="uploadForm" id="uploadForm">


        <input id="placeId" type="hidden" name="placeId" value=""/>
        <input id="placeReference" type="hidden" name="placeReference" value="">

        <br/>

        <div class="sliders">
            <h3>Chatty</h3>
            <br/>

            <p><span class="low">Quiet Time</span> Conversational <span class="high">Outgoing<span></p>
            <input id="feeling1" type="range" name="feeling1" min="0" max="10" value="5" step="1"
                   onchange="showValue(this)"/>

            <p><span id="range"></span></p>

            <script type="text/javascript">


                function get_nextsibling(n) {
                    x = n.nextSibling;
                    while (x.nodeType != 1) {
                        x = x.nextSibling;
                    }
                    return x;
                }

                function showValue(self) {
                    get_nextsibling(self).innerHTML = self.value;
                }
            </script>


            <h3>Buzz</h3>
            <br/>

            <p><span class="low">Relaxed</span> Eager <span class="high">Wild<span></p>
            <input id="feeling2" type="range" name="feeling2" min="0" max="10" value="5" step="1"
                   onchange="showValue(this)"/>

            <p><span id="range"></span></p>


            <h3>Pump</h3>
            <br/>

            <p><span class="low">Rest</span> Sweaty <span class="high">Intense<span></p>
            <input id="feeling3" type="range" name="feeling3" min="0" max="10" value="5" step="1"
                   onchange="showValue(this)"/>

            <p><span id="range"></span></p>


            <h3>Adventure</h3>
            <br/>

            <p><span class="low">Comfortable</span> Explorative <span class="high">Fearless<span></p>
            <input id="feeling4" type="range" name="feeling4" min="0" max="10" value="5" step="1"
                   onchange="showValue(this)"/>

            <p><span id="range"></span></p>


            <h3>Bustle</h3>
            <br/>

            <p><span class="low">Lone Wolf</span> Amongst It <span class="high">Sardine Can<span></p>
            <input id="feeling5" type="range" name="feeling5" min="0" max="10" value="5" step="1"
                   onchange="showValue(this)"/>

            <p><span id="range"></span></p>


            <h3>Lovey Dovey</h3>
            <br/>

            <p><span class="low">Platonic</span> Flirty <span class="high">Intimate<span></p>
            <input id="feeling6" type="range" name="feeling6" min="0" max="10" value="5" step="1"
                   onchange="showValue(this)"/>

            <p><span id="range"></span></p>


            <h3>Trackies</h3>
            <br/>

            <p><span class="low">Casual</span> Smart <span class="high">Formal<span></p>
            <input id="feeling7" type="range" name="feeling7" min="0" max="10" value="5" step="1"
                   onchange="showValue(this)"/>

            <p><span id="range"></span></p>
            </br>
        </div>
    </form>


</div>

</br>
</br>


<div class="submit-btn">
    </br>
    <!-- Indicates a successful or positive action -->
    <a href="#">
        <button type="button" class="btn btn-success btn-lg" onclick="uploadSpot()">Submit!</button>
    </a>
    </br>
</div>
<br/><br/>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script type="text/javascript">


    function uploadSpot() {
        document.getElementById("uploadForm").submit();
    }

    function initialize() {

        var input = document.getElementById('place-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.setTypes(['establishment']);

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.uploadForm.placeId.value = place.id;
            document.uploadForm.placeReference.value = place.reference;
        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);


</script>


</body>

</html>