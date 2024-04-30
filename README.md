# CoinPal Payments advanced PHP SDK
**Le Brand REAL IT Solutions - https://xdata.gr - Charis Chrysochoou**

**NOTE : Coinpal's files are not yet integrated in the repo. INITIAL DEVELOPMENT STAGE!**.

**ATTENTION : Use only fake data for testing!!!**

**COMPATIBLE with PHP 5.4 and above (Recommended to use PHP 5.6 and above)**

**DEMO PAGE : https://pricex.gr/coinpalsetup.php**

-----

**HOW TO TEST IT :**
Grab a copy to your server and visit https://yourdomain.com/coinpalsetup.php (or where you have placed **coinpalsetup.php** and **lib** direcroty)

You can place the files in any directory other than your root. Just keep the file **coinpalsetup.php** in the same directory where the **lib** directory is.

-----

The main concept is to automate the PHP SDK integration creating a universal solution for websites that are not based on ready made e-commerce platforms or CMS. 

At this early stage of development you can test the functionality of reading and writing to the **config.php** file using **GUI form**. The form is auto created from the keys and values of the config array and when submited it's writing (for now) the new array back in the config.php file.

Login system code completed and integrated. Next step is to automate the DB tables creation (since DB credentials exist) and all settings will also be inserted into a DB table. After that, since DB credentials exist, the system will be writing and reading with DB priority but will be still creating the config file where from we will always be reading the settings for compatibility issues. (I have explained this in the relative project files).

The goal is to have an almost entirely GUI environment so that integration by novice users (and not only) will be as easy as possible.

The motives behind the development of this SDK are only the **Kaspa Ecosystem** although of course **CoinPal** payments is not only for Kaspa.
