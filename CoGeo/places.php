<!DOCTYPE html>

<html>
<head>

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

    </style>


</head>

<body>
<header class="navbar">
    <div class="container">


        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">CoGeo</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="places.php">Search</a></li>
						<li><a href="submit.php">Add Spot</a></li>
                        

                    </ul>


                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
</header>
<div class="container">
    <h1> Search for a Location</h1>

    <p>
        Describe how you are feeling or wish to feel using the feeling sliders below
    </p>

    <h3></h3>
    </br>
    </br>
    <form action="results.php" method="post" name="uploadForm" id="uploadForm">
        <h3>Chatty</h3>
        <br/>

        <p>Quiet Time -----> Conversational -----> Outgoing</p>
        <input id="feeling1" type="range" name="feeling1" min="0" max="10" value="5" step="1"
               onchange="showValue(this)"/>

        <p><span id="range">5</span></p>
        </br>
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
            function uploadSpot() {
                document.getElementById("uploadForm").submit();
            }
        </script>


        <br/>

        <h3>Buzz</h3>
        <br/>

        <p>Relaxed -----> Eager -----> Wild</p>
        <input id="feeling2" type="range" name="feeling2" min="0" max="10" value="5" step="1"
               onchange="showValue(this)"/>

        <p><span id="range">5</span></p>
        </br>

        <br/>

        <h3>Pump</h3>
        <br/>

        <p>Rest -----> Sweaty -----> Intense</p>
        <input id="feeling3" type="range" name="feeling3" min="0" max="10" value="5" step="1"
               onchange="showValue(this)"/>

        <p><span id="range">5</span></p>
        </br>

        <br/>

        <h3>Adventure</h3>
        <br/>

        <p>Comfortable -----> Explorative -----> Fearless</p>
        <input id="feeling4" type="range" name="feeling4" min="0" max="10" value="5" step="1"
               onchange="showValue(this)"/>

        <p><span id="range">5</span></p>
        </br>

        <br/>

        <h3>Bustle</h3>
        <br/>

        <p>Lone Wolf -----> Amongst It -----> Sardine Can</p>
        <input id="feeling5" type="range" name="feeling5" min="0" max="10" value="5" step="1"
               onchange="showValue(this)"/>

        <p><span id="range">5</span></p>
        </br>


        <br/>

        <h3>Lovey Dovey</h3>
        <br/>

        <p>Platonic -----> Flirty -----> Intimate</p>
        <input id="feeling6" type="range" name="feeling6" min="0" max="10" value="5" step="1"
               onchange="showValue(this)"/>

        <p><span id="range">5</span></p>
        </br>


        <br/>

        <h3>Trackies</h3>
        <br/>

        <p>Casual -----> Smart -----> Formal</p>
        <input id="feeling7" type="range" name="feeling7" min="0" max="10" value="5" step="1"
               onchange="showValue(this)"/>

        <p><span id="range">5</span></p>
        </br>
    </form>


</div>

</br>
</br>


<div class="search-btn">
    </br>
    <!-- Indicates a successful or positive action -->
    <a href="#">
        <button type="button" class="btn btn-success btn-lg" onclick="uploadSpot()">Search!</button>
    </a>
    </br>
</div>

</br>
</br>
</br>
</br>
</br>


</body>

</html>






