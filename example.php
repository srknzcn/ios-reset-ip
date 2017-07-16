<?php

require './vendor/autoload.php';

try {
    
    new \IOSResetIP\IP();

} catch (\Exception $e) {
    echo $e->getMessage();
}