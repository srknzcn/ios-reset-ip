<?php
namespace IOSResetIP\Exceptions;

class BaseException extends \Exception {
    public function __construct() {
        return parent::__construct($this->message);
    }
}
