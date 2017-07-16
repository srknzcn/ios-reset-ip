# IOS-Reset-IP

### Resets the cellular ip adress and gets new one with activator app on jailbroken iphone.

This package requires a **jailbroken** iphone and **activator** app installed.

You can install [Activator](http://cydia.saurik.com/package/libactivator/) via cydia on your device.

**Install via composer**
```
composer require srknzcn/ios-reset-ip
```
**Example:**
```php
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
```