<?php

require './vendor/autoload.php';

try {

    $resetIPResult = new \IOSResetIP\IP();

} catch (\Exception $e) {
    echo $e->getMessage();
}