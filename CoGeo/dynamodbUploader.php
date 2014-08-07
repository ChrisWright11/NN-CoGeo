<!DOCTYPE html>

<html>
<head>


    <title>Submitted!</title>

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


        body{
            text-align: center;
            background: url("http://wallpaperscraft.com/image/mountain_peak_stars_sky_night_light_snow_46057_1920x1200.jpg?orig=1");
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-repeat: no-repeat;
            background-position: position;

        }

        h1{
            text-align: center;
            color: white;
        }

        p{
            text-align: center;
            color: white;
        }

        h3{
            text-align: center;
            color: white;
        }

    </style>


</head>

<body>
<header class = "navbar">
    <div class = "container">


        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">CoGeo</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="submit.php">Add Spot</a></li>
                        <li><a href="places.php">See All</a></li>

                    </ul>


                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</header>
<div class="container">
    <h1> Thankyou for your submission!</h1>

    <?php
    /**
     * Created by PhpStorm.
     * User: Tidus
     * Date: 14-7-28
     * Time: 9:20 p.m.
     */

    require "vendor/autoload.php";


    use Aws\DynamoDb\DynamoDbClient;
    use Aws\Common\Enum\Region;
    use Aws\DynamoDb\Enum\Type;
    use Aws\DynamoDb\Enum\AttributeAction;
    use Aws\DynamoDb\Enum\ReturnValue;

    $client = DynamoDbClient::factory(array(
]
        'region' => Region::AP_SOUTHEAST_2
    ));

    $tableName = "CoGeo_Place_Database";
    $placeId  = $_POST["placeId"];
    $feeling1 = $_POST["feeling1"];
    $feeling2 = $_POST["feeling2"];
    $feeling3 = $_POST["feeling3"];
    $feeling4 = $_POST["feeling4"];
    $feeling5 = $_POST["feeling5"];
    $feeling6 = $_POST["feeling6"];
    $feeling7 = $_POST["feeling7"];
    $placeReference = $_POST["placeReference"];


    ################################################################
    //Adding data to CoGeo Primary Database


    $response = $client->putItem(array(
        "TableName" => $tableName,
        "Item" => $client->formatAttributes(array(
                    "PlaceId" => $placeId,
                    "Chatty" => $feeling1,
                    "Buzz" => $feeling2,
                    "Pump" => $feeling3,
                    "Adventure" => $feeling4,
                    "Bustle" => $feeling5,
                    "LoveyDovey" => $feeling6,
                    "Trackies" => $feeling7,
                    "PlaceReference" => $placeReference
                )
            ),
        "ReturnConsumedCapacity" => 'TOTAL',
        "Expected" => array(
            "Name" => array(
                "ComparisonOperator" => "NULL"
            ))
    ));


    echo "<br />";


    ?>
    <h3></h3>
    </br>
    </br>

    <div class="home-btn">
        </br>
        <!-- Indicates a successful or positive action -->
        <a href="index.php"><button type="button" class="btn btn-success btn-lg" onclick="uploadSpot()">Home</button></a>
        </br>
    </div>

    </br>
    </br>


</div>

</br>
</br>
</br>
</br>



</body>

</html>





