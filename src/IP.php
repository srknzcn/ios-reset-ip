<?php
namespace IOSResetIP;

use IOSResetIP\Exceptions;

/**
 * IP Address resetter for jailbroken IOS Phones on cellular data.
 * Turns off cellular data and turns it on again.
 * 
 * @author SRKNZCN <serkanozcan@gmail.coms>
 */
class IP {
    protected $debug = null;
    protected $delayForRetry = 1;
    protected $activatorCommand = "activator";
    protected $switchOffCellularDataCommand = "activator send switch-off.com.a3tweaks.switch.cellular-data";
    protected $switchOnCellularDataCommand = "activator send switch-on.com.a3tweaks.switch.cellular-data";
    protected $checkNewIPUrl = "http://ip2json.info/?key=remoteAddr";

    public $IP;

    public function __construct($debug = false) {
        $this->debug = $debug;

        $isActivator = shell_exec("which " . $this->activatorCommand);
        if (!$isActivator) {
            throw new Exceptions\ActivatorNotFoundException();
            return false;
        }
        $this->switchOffCellularData();
        sleep($this->delayForRetry);
        $this->switchOnCellularData();

        // check new IP Addr
        return $this->checkForNewIPAddress();
    }

    /**
     * Checks ip query service until new connection detects
     * 
     * @return void
     */
    public function checkForNewIPAddress() {
        $newIP = FALSE;
        while ( !$newIP ) {
            $newIPData = @file_get_contents($this->checkNewIPUrl);
            if ($newIPData) {
                $json = json_decode($newIPData);
                $this->IP = $json->remoteAddr;
                if ($this->debug) {
                    echo ">>> NEW IP ADDR : " . $this->IP . "\n";
                }
                return $json->remoteAddr;
            } else {
                if ($this->debug) {
                    echo ".";
                }
                sleep($this->delayForRetry);
            }
        }
    }

    /**
     * Turns off cellular data
     * 
     * @return void
     */
    public function switchOffCellularData() {
        shell_exec($this->switchOffCellularDataCommand);
    }

    /**
     * Turns on cellular data
     * 
     * @return void
     */
    public function switchOnCellularData() {
        shell_exec($this->switchOnCellularDataCommand);
    }

    /**
     * Returns new IP address
     * 
     * @return string
     */
    public function getIP() {
        return $this->IP;
    }
}
