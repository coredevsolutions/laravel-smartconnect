# laravel-smartconnect

#### Overview

A Laravel wrapper for sending SMS through [Smart Connect SMS API](https://messagingsuite.smart.com.ph/).



#### Requirements

- Laravel 5.5+
- PHP 7+
- Guzzle 6+
- Carbon 1.0+



#### Installation

You can install `laravel-smartconnect` package via composer.

```
composer require coredev/laravel-smartconnect
```



#### Configuration

Register provider and aliases on your `config/app.php` file.

```php
'providers' => [
    CoreDev\LaravelSmartConnect\SmartServiceProvider::class,
],

'aliases' => [
    'Smart' => CoreDev\LaravelSmartConnect\Smart::class,
],
```



#### Usage

You can use it like this: 

```php
use Smart;

Globe::send('phone_number', 'message', 'username', 'password');
```
