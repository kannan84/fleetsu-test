<?php

include 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule();
$capsule->addConnection([
    "driver"    => "mysql",
    "host"      => "localhost",
    "database"  => "telematics",
    "username"  => "root",
    "password"  => "password",
    "charset"   => "utf8",
    "collation" => "utf8_general_ci",
    "prefix"    => ""
    //"timezone"	=> "UTC"
]);

$capsule->bootEloquent();