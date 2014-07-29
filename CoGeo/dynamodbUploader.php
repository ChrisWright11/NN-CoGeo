<?php
/**
 * Created by PhpStorm.
 * User: Tidus
 * Date: 14-7-28
 * Time: 9:20 p.m.
 */

use Aws\DynamoDb\DynamoDbClient;
use Aws\Common\Enum\Region;
use Aws\DynamoDb\Enum\Type;
use Aws\DynamoDb\Enum\AttributeAction;
use Aws\DynamoDb\Enum\ReturnValue;

$client = DynamoDbClient::factory(array(
    'profile' => 'default',
    'region' => Region::AP_SOUTHEAST_2
));

$tableName = "CoGeo_Place_Database";
$placeName = $_POST["name1"];
$feeling1 = $_POST["feeling1"];
$feeling2 = $_POST["feeling2"];
$feeling3 = $_POST["feeling3"];
$feeling4 = $_POST["feeling4"];
$feeling5 = $_POST["feeling5"];
$feeling6 = $_POST["feeling6"];
$feeling7 = $_POST["feeling7"];


################################################################
//Adding data to CoGeo Primary Database

echo PHP_EOL;

$response = $client->putItem(array(
    "TableName" => $tableName,
    "Item" => $client->formatAttributes(array(
            "Name" => $placeName,
            "Feeling1" => $feeling1,
            "Feeling2" => $feeling2,
            "Feeling3" => $feeling3,
            "Feeling4" => $feeling4,
            "Feeling5" => $feeling5,
            "Feeling6" => $feeling6,
            "Feeling7" => $feeling7,

        )),
    "ReturnConsumedCapacity" => "TOTAL"
));