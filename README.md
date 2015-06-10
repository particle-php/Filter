![Particle\Filter](https://cloud.githubusercontent.com/assets/6495166/7777918/406635e8-00c7-11e5-90e3-96c590828ffd.png)
===

[![Travis-CI](https://img.shields.io/travis/particle-php/Filter/master.svg)](https://travis-ci.org/particle-php/Filter)
[![Packagist](https://img.shields.io/packagist/v/particle/filter.svg)](https://packagist.org/packages/particle/filter)
[![Packagist downloads](https://img.shields.io/packagist/dt/particle/filter.svg)](https://packagist.org/packages/particle/filter)
[![Scrutinizer](https://img.shields.io/scrutinizer/g/particle-php/Filter.svg)](https://scrutinizer-ci.com/g/particle-php/Filter/?branch=master)
[![Scrutinizer](https://img.shields.io/scrutinizer/coverage/g/particle-php/Filter/master.svg)](https://scrutinizer-ci.com/g/particle-php/Filter/?branch=master)

*Particle\Filter* is a very small filtering library, with the easiest and most usable API we could possibly create.

## Small usage example

```php
$f = new Particle\Filter\Filter;

$f->values(['user.first_name', 'user.last_name'])->trim()->lower()->upperFirst();
$f->value('newsletter')->bool();

$result = $f->filter([
    'user' => [
        'first_name' => '  JOHN ',
        'last_name' => ' DOE  ',
    ],
    'newsletter' => 'yes',
]);

var_dump($result);
/**
 * array(2) {
 *     ["user"]=> array(2) {
 *         ["first_name"]=> string(4) "John"
 *         ["last_name"]=> string(3) "Doe"
 *     }
 *     ["newsletter"]=> bool(true)
 * } 
 */
```

## Features

* Filter an array of values
* Get a cleaned array after filtering
* [Quite some filter-rules are provided](http://filter.particle-php.com/en/latest/filter-rules/)

===

Find more information and advanced usage examples at [filter.particle-php.com](http://filter.particle-php.com)
