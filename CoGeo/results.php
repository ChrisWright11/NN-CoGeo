<!DOCTYPE html>

<html>
<head>

    <?php
    /**
     * Created by PhpStorm.
     * User: Tidus
     * Date: 14-8-8
     * Time: 下午5:27
     */

    require "vendor/autoload.php";

    use Aws\DynamoDb\DynamoDbClient;
    use Aws\Common\Enum\Region;
    use Aws\DynamoDb\Enum\Type;
    use Aws\DynamoDb\Enum\AttributeAction;
    use Aws\DynamoDb\Enum\ReturnValue;

    $client = DynamoDbClient::factory(array(
        'key' => 'AKIAJ2TIE2BO4YR7ROVQ',
        'secret' => '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',
        'region' => Region::AP_SOUTHEAST_2
    ));

    $feeling1 = $_POST["feeling1"]; //Chatty
    $feeling2 = $_POST["feeling2"]; //Buzz
    $feeling3 = $_POST["feeling3"]; //Pump
    $feeling4 = $_POST["feeling4"]; //Adventure
    $feeling5 = $_POST["feeling5"]; //Bustle
    $feeling6 = $_POST["feeling6"]; //LoveyDovey
    $feeling7 = $_POST["feeling7"]; //Trackies

    $tableName = "CoGeo_Place_Database";

    $itemToBeRetrieved = array();

    $googleApiKey = "AIzaSyAiac_P0T3zRSeyxYy7cClNcVukbfZhslg";

    $i = 0;

    while (count($itemToBeRetrieved) <= 9) {
        $params = array(
            "TableName" => $tableName,
            "AttributesToGet" => array("PlaceReference"),
            "ScanFilter" => array(
                "Chatty" => array(
                    "AttributeValueList" => array(
                        array(TYPE::STRING => (string)(($feeling1 - $i >= 1) ? ($feeling1 - $i) : 0)),
                        array(TYPE::STRING => (string)(($feeling1 + $i <= 8) ? ($feeling1 + $i) : 9))
                    ),
                    "ComparisonOperator" => "BETWEEN"
                ),

                "Buzz" => array(
                    "AttributeValueList" => array(
                        array(TYPE::STRING => (string)(($feeling2 - $i >= 1) ? ($feeling2 - $i) : 0)),
                        array(TYPE::STRING => (string)(($feeling2 + $i <= 8) ? ($feeling2 + $i) : 9))
                    ),
                    "ComparisonOperator" => "BETWEEN"
                ),
                "Pump" => array(
                    "AttributeValueList" => array(
                        array(TYPE::STRING => (string)(($feeling3 - $i >= 1) ? ($feeling3 - $i) : 0)),
                        array(TYPE::STRING => (string)(($feeling3 + $i <= 8) ? ($feeling3 + $i) : 9))
                    ),
                    "ComparisonOperator" => "BETWEEN"
                ),
                "Adventure" => array(
                    "AttributeValueList" => array(
                        array(TYPE::STRING => (string)(($feeling4 - $i >= 1) ? ($feeling4 - $i) : 0)),
                        array(TYPE::STRING => (string)(($feeling4 + $i <= 8) ? ($feeling4 + $i) : 9))
                    ),
                    "ComparisonOperator" => "BETWEEN"
                ),
                "Bustle" => array(
                    "AttributeValueList" => array(
                        array(TYPE::STRING => (string)(($feeling5 - $i >= 1) ? ($feeling5 - $i) : 0)),
                        array(TYPE::STRING => (string)(($feeling5 + $i <= 8) ? ($feeling5 + $i) : 9))
                    ),
                    "ComparisonOperator" => "BETWEEN"
                ),
                "LoveyDovey" => array(
                    "AttributeValueList" => array(
                        array(TYPE::STRING => (string)(($feeling6 - $i >= 1) ? ($feeling6 - $i) : 0)),
                        array(TYPE::STRING => (string)(($feeling6 + $i <= 8) ? ($feeling6 + $i) : 9))
                    ),
                    "ComparisonOperator" => "BETWEEN"
                ),
                "Trackies" => array(
                    "AttributeValueList" => array(
                        array(TYPE::STRING => (string)(($feeling7 - $i >= 1) ? ($feeling7 - $i) : 0)),
                        array(TYPE::STRING => (string)(($feeling7 + $i <= 8) ? ($feeling7 + $i) : 9))
                    ),
                    "ComparisonOperator" => "BETWEEN"
                ),
            )
        );

        $response = $client->scan($params);
        $items = $response->get("Items");
        if ($items[$i]["PlaceReference"]["S"] != NULL) {
            array_push($itemToBeRetrieved, $items[$i]["PlaceReference"]["S"]);
        }
        $itemToBeRetrieved = array_unique($itemToBeRetrieved);
        $itemToBeRetrieved = array_filter($itemToBeRetrieved);
        $i = $i + 1;
    }

    $json_1 = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?reference="
        . $itemToBeRetrieved[0] . "&key=" . $googleApiKey);
    $json_2 = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?reference="
        . $itemToBeRetrieved[1] . "&key=" . $googleApiKey);
    $json_3 = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?reference="
        . $itemToBeRetrieved[2] . "&key=" . $googleApiKey);
    $json_4 = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?reference="
        . $itemToBeRetrieved[3] . "&key=" . $googleApiKey);
    $json_5 = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?reference="
        . $itemToBeRetrieved[4] . "&key=" . $googleApiKey);
    $json_6 = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?reference="
        . $itemToBeRetrieved[5] . "&key=" . $googleApiKey);
    $json_7 = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?reference="
        . $itemToBeRetrieved[6] . "&key=" . $googleApiKey);
    $json_8 = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?reference="
        . $itemToBeRetrieved[7] . "&key=" . $googleApiKey);
    $json_9 = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?reference="
        . $itemToBeRetrieved[8] . "&key=" . $googleApiKey);

    $data_1 = json_decode($json_1);
    $data_2 = json_decode($json_2);
    $data_3 = json_decode($json_3);
    $data_4 = json_decode($json_4);
    $data_5 = json_decode($json_5);
    $data_6 = json_decode($json_6);
    $data_7 = json_decode($json_7);
    $data_8 = json_decode($json_8);
    $data_9 = json_decode($json_9);

    $photoReference_1 = $data_1->result->photos[0]->photo_reference;
    $photoReference_2 = $data_2->result->photos[0]->photo_reference;
    $photoReference_3 = $data_3->result->photos[0]->photo_reference;
    $photoReference_4 = $data_4->result->photos[0]->photo_reference;
    $photoReference_5 = $data_5->result->photos[0]->photo_reference;
    $photoReference_6 = $data_6->result->photos[0]->photo_reference;
    $photoReference_7 = $data_7->result->photos[0]->photo_reference;
    $photoReference_8 = $data_8->result->photos[0]->photo_reference;
    $photoReference_9 = $data_9->result->photos[0]->photo_reference;


    $googlePlacePhotoUrl = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=1200&photoreference=";

    ?>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <!-- jquery -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- jquery UI-->
    <script src="http://code.jquery.com/ui/1.11.0/jqueryui/1.11.0/jquery-ui.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
    <style>


        body {
            text-align: center;
            background-image: url("galaxy.jpg");
            background-size: cover;
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

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            <li data-target="#carousel-example-generic" data-slide-to="5"></li>
            <li data-target="#carousel-example-generic" data-slide-to="6"></li>
            <li data-target="#carousel-example-generic" data-slide-to="7"></li>
            <li data-target="#carousel-example-generic" data-slide-to="8"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_1 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_2 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_3 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_4 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_5 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_6 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_7 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_8 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_9 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    ...
                </div>
            </div>
            ...
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>

</div>

</br>
</br>
</br>
</br>

</body>

</html>