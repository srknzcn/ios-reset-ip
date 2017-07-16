<?php
namespace IOSResetIP\Exceptions;

class ActivatorNotFoundException extends BaseException {
    public function __construct() {
        $this->message = "Activator not found. Maybe not installed on this device. Plase install and try again..." . PHP_EOL;
    }
}