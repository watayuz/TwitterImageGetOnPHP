<?php

require("slim/vendor/autoload.php");

$app = new \Slim\Slim;

$app->get("/:name", function($name) {
    echo "hello slim php name: $name";
});

$app->run();