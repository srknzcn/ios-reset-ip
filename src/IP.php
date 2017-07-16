<?php
namespace IOSResetIP;

use IOSResetIP\Exceptions;

class IP {

    protected $delayForRetry = 1;
    protected $switchOffCellularDataCommand = "activator send switch-off.com.a3tweaks.switch.cellular-data";
    protected $switchOnCellularDataCommand = "activator send switch-on.com.a3tweaks.switch.cellular-data";

    public function __construct() {
        $turnOffCellular = shell_exec($this->switchOffCellularDataCommand);
        if (!$turnOffCellular) {
            throw new Exceptions\ActivatorNotFoundException();
            return false;
        }
        sleep($this->delayForRetry);
        shell_exec($this->switchOnCellularDataCommand);

        // // check new IP Addr
        $newIP = FALSE;
        
        // while ( !$newIP ) {
        //     $newIP = doRequest('http://ripequery.com/?key?remoteAddr', $ua, $ur);
        //     if ($newIP) {
        //         echo ">>> NEW IP ADDR : " . $newIP . "\n";
        //         break;
        //     } else
        //         sleep(1);
        // }

    }
}
