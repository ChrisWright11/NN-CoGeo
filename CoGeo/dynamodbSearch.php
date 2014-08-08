<!DOCTYPE html>

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

$json = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?reference="
    . $itemToBeRetrieved[0] . "&key=" . $googleApiKey);
$data = json_decode($json);

print_r($data->result->photos[0]->photo_reference);

echo "Successfully scanned!";
