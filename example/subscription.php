<?php
require __DIR__ . "/assets/config.php";
require __DIR__ . "/../vendor/autoload.php";

use DanielPLeal\PrjApi\Subscriptions;

$subscription = new Subscriptions(
    "url",
    "yourmail@gmail.com",
    "password"
);

/**
 * index
 */
echo "<h1>INDEX</h1>";
$index = $subscription->index(null);

if ($index->error()) {
    var_dump($index->error());
} else {
    var_dump($index->response());
}


/**
 * create
 */
echo "<h1>CREATE</h1>";

$create = $subscription->create([
    "plan_id" => 1,
    "card_number" => "5117085265750323",
    "card_holder_name" => "DANIEL LEAL",
    "card_expiration_date" => "01/22",
    "card_cvv" => "525"
]);

if ($create->error()) {
    echo "<p class='error'>{$create->error()->message}</p>";
} else {
    var_dump($create->response());
}

/**
 * READ
 */
echo "<h1>READ</h1>";

$read = $subscription->read();

if ($read->error()) {
    echo "<p class='error'>{$read->error()->message}</p>";
} else {
    var_dump($read->response());
}

/**
 * UPDATE
 */
echo "<h1>UPDATE</h1>";

//$update = $subscription->update(["plan_id" => 2]);
$update = $subscription->update([
    "card_number" => "5117085265750323",
    "card_holder_name" => "DANIEL LEAL",
    "card_expiration_date" => "01/22",
    "card_cvv" => "525"
]);

if ($update->error()) {
    echo "<p class='error'>{$update->error()->message}</p>";
} else {
    var_dump($update->response());
}