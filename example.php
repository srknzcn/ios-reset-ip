<?php
require './vendor/autoload.php';

try {
    // use true for debug
    // $resetIPResult = new \IOSResetIP\IP(true);

    $resetIPResult = new \IOSResetIP\IP();
    var_dump($resetIPResult->getIP());

} catch (\Exception $e) {
    echo $e->getMessage();
}