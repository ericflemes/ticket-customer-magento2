# Magento 2 Ticket-customer


## How to install

**This module is now available through *Packagist* ! You don't need to specify the repository anymore.**

Add the following lines into your composer.json
 
```
...
"require":{
    ...
    "Os/Customer":"^1.0.8"
 }
```
or simply digit 
```
composer require ticket-magento2/ticket-customer-magento2
```
 
Then type the following commands from your Magento root:

```
$ composer update
$ ./bin/magento setup:upgrade
$ ./bin/magento setup:di:compile
```
