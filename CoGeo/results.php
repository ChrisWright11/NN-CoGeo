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

$placeName_1 = $data_1->result->name;
$placeName_2 = $data_2->result->name;
$placeName_3 = $data_3->result->name;
$placeName_4 = $data_4->result->name;
$placeName_5 = $data_5->result->name;
$placeName_6 = $data_6->result->name;
$placeName_7 = $data_7->result->name;
$placeName_8 = $data_8->result->name;
$placeName_9 = $data_9->result->name;

$placeAddress_1 = $data_1->result->formatted_address;
$placeAddress_2 = $data_2->result->formatted_address;
$placeAddress_3 = $data_3->result->formatted_address;
$placeAddress_4 = $data_4->result->formatted_address;
$placeAddress_5 = $data_5->result->formatted_address;
$placeAddress_6 = $data_6->result->formatted_address;
$placeAddress_7 = $data_7->result->formatted_address;
$placeAddress_8 = $data_8->result->formatted_address;
$placeAddress_9 = $data_9->result->formatted_address;


$googlePlacePhotoUrl = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=1200&photoreference=";

?>

<link rel="stylesheet" href="/sources/slider/css/slider.css">
<link rel="stylesheet" href="/sources/slider/js/bootstrap-slider.js">
<link rel="stylesheet" href="/sources/slider/less/slider.less">


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
        background-size: cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-repeat: no-repeat;
        background-position: center;

    }

    h1 {
        text-align: center;
        color: white;
    }

    p {
        color: rgba(255, 255, 255, 1);
        background: black;
        background: linear-gradient(bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, .4));
        background: -webkit-linear-gradient(bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, .4));
        background: -moz-linear-gradient(bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, .4));
        line-height: 28px;
        text-align: center;
    <!-- max-width : 400 px;
    --> height : 15 px;
        position: center;
        transition: height .5s;
        -webkit-transition: height .5s;
        -moz-transition: height .5s;
    }

    h3 {
        text-align: center;
        color: white;
    }

    small {
        opacity: 0;
    }

    .show-description p {
        height: 250px;
    }

    .show-description small {
        opacity: 1;
    }

    .carousel-caption {
        text-align: center;
        position: center;
    }

    .price {
        float: left;
        margin: 10px;
    }

    .relevance {
        margin: 10px;
    }

    .location {
        float: right;
        margin: 10px;
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

    <div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="" data-slide-to="0" class="active"></li>
            <li data-target="" data-slide-to="1"></li>
            <li data-target="" data-slide-to="2"></li>
            <li data-target="" data-slide-to="3"></li>
            <li data-target="" data-slide-to="4"></li>
            <li data-target="" data-slide-to="5"></li>
            <li data-target="" data-slide-to="6"></li>
            <li data-target="" data-slide-to="7"></li>
            <li data-target="" data-slide-to="8"></li>

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_1 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    <h3><?php echo $placeName_1 ?></h3>

                    <p><span class="price">INSERT PRICE</span>

                        <span class="location"><?php echo $placeAddress_1 ?></span></br>
                        <small>Bitches loooovvveeeee galaxies and babies and rainbows and candy</small>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_2 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    <h3><?php echo $placeName_2 ?></h3>

                    <p><span class="price">INSERT PRICE</span>

                        <span class="location"><?php echo $placeAddress_2 ?></span></br>
                        <small>Bitches loooovvveeeee galaxies and babies and rainbows and candy</small>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_3 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    <h3><?php echo $placeName_3 ?></h3>

                    <p><span class="price">INSERT PRICE</span>

                        <span class="location"><?php echo $placeAddress_3 ?></span></br>
                        <small>Bitches loooovvveeeee galaxies and babies and rainbows and candy</small>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_4 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    <h3><?php echo $placeName_4 ?></h3>

                    <p><span class="price">INSERT PRICE</span>

                        <span class="location"><?php echo $placeAddress_4 ?></span></br>
                        <small>Bitches loooovvveeeee galaxies and babies and rainbows and candy</small>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_5 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    <h3><?php echo $placeName_5 ?></h3>

                    <p><span class="price">INSERT PRICE</span>

                        <span class="location"><?php echo $placeAddress_5 ?></span></br>
                        <small>Bitches loooovvveeeee galaxies and babies and rainbows and candy</small>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_6 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    <h3><?php echo $placeName_6 ?></h3>

                    <p><span class="price">INSERT PRICE</span>

                        <span class="location"><?php echo $placeAddress_6 ?></span></br>
                        <small>Bitches loooovvveeeee galaxies and babies and rainbows and candy</small>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_7 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    <h3><?php echo $placeName_7 ?></h3>

                    <p><span class="price">INSERT PRICE</span>

                        <span class="location"><?php echo $placeAddress_7 ?></span></br>
                        <small>Bitches loooovvveeeee galaxies and babies and rainbows and candy</small>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_8 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    <h3><?php echo $placeName_8 ?></h3>

                    <p><span class="price">INSERT PRICE</span>

                        <span class="location"><?php echo $placeAddress_8 ?></span></br>
                        <small>Bitches loooovvveeeee galaxies and babies and rainbows and candy</small>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $googlePlacePhotoUrl . $photoReference_9 . "&key=" . $googleApiKey ?>" alt="...">

                <div class="carousel-caption">
                    <h3><?php echo $placeName_9 ?></h3>

                    <p><span class="price">INSERT PRICE</span>
                       
                        <span class="location"><?php echo $placeAddress_9 ?></span></br>
                        <small>Bitches loooovvveeeee galaxies and babies and rainbows and candy</small>
                    </p>
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

<input type="text" class="span2" value="" data-slider-min="-20" data-slider-max="20" data-slider-step="1"
       data-slider-value="-14" data-slider-orientation="vertical" data-slider-selection="after"
       data-slider-tooltip="hide">


</br>
</br>


<script>
    $('div').on('click', function () {
        $(this).toggleClass('show-description');
    });
</script>


</body>

</html>