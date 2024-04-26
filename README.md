# coinpal_advanced_php_sdk
**CoinPal Payments advanced PHP SDK**

**NOTE : Coinpal's files are not yet integrated in the repo**.

**ATTENTION : Use only fake data for testing, until the login system is integrated!!!**

**Compatible with PHP 5.4 and above (Recommended to use PHP 5.6 and above)**

The main concept is to automate the PHP SDK integration creating a universal solution for websites that are not based on ready made e-commerce platforms or CMS. 

At this early development stage you can test the functionallity of reading and writing to the config.php file using GUI form. The form is auto created from the keys and values of the config array and when submited it's writing (for now) the new array back in the config.php file.

There will be added more fields in the config array in order to integrate more settings, including DB credentials. Since this is done, I will automate the DB tables creation and all settings will also be inserted into a DB table. After that, since DB credentials exists, the system will be writing and reading with priority from the DB but will be still creating the config file where from we will be always reading the settings for compatibility issues. (I have explained this in the relative project files).

The goal is to have an almost entirely gui environment so that integration by novice users is as easy as possible.

The motives behind the development of this SDK are only the Kaspa ecosystem although of course CoinPal payments if not only for Kaspa.

**TESTING :**
Grab a copy to your server and visit https://yourdomain.com/coinpalsetup.php
