Integrates [Payline payment solution](http://www.payline.com/) with Symfony.


## Features

* Service integration and simple semantic configuration
* Simplified API for web payments
* Automatically validates web payments
* Extensibility using events


## Requirements

### Payline account
You will of course need a valid Payline account.

Mandatory elements from you Payline account are:
* **Merchant ID**
* **Access key**, which you can generate in Payline admin
* **Contract number**, related to the means of payment you configured in Payline admin

### PHP
* PHP >=7.2.5
* [PHP SOAP extension](http://php.net/soap) for Payline SDK

### Symfony
Symfony 4.4 / 5.x


## Installation

This bundle is installable with [Symfony Flex](https://flex.symfony.com).
You first need to allow contrib recipes before requiring the package:

```
composer config extra.symfony.allow-contrib true
composer req cramtor/payline-bundle
```

Everything will be pre-configured for you; however, ensure to **Encrypt sensitive environment variables**,
e.g. `PAYLINE_MERCHANT_ID` and `PAYLINE_ACCESS_KEY` with [`secrets:set` command](https://symfony.com/blog/new-in-symfony-4-4-encrypted-secrets-management):

````bash
php bin/console secrets:set PAYLINE_MERCHANT_ID
php bin/console secrets:set PAYLINE_ACCESS_KEY
````


## Documentation

See [Resources/doc/](Resources/doc/00-index.md)
