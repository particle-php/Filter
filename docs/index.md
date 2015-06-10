![Particle\Filter](https://cloud.githubusercontent.com/assets/6495166/7777918/406635e8-00c7-11e5-90e3-96c590828ffd.png)

[![Travis-CI](https://img.shields.io/travis/particle-php/Filter/master.svg)](https://travis-ci.org/particle-php/Filter)
[![Packagist](https://img.shields.io/packagist/v/particle/filter.svg)](https://packagist.org/packages/particle/filter)
[![Packagist downloads](https://img.shields.io/packagist/dt/particle/filter.svg)](https://packagist.org/packages/particle/filter)
[![Scrutinizer](https://img.shields.io/scrutinizer/g/particle-php/Filter.svg)](https://scrutinizer-ci.com/g/particle-php/Filter/?branch=master)
[![Scrutinizer](https://img.shields.io/scrutinizer/coverage/g/particle-php/Filter/master.svg)](https://scrutinizer-ci.com/g/particle-php/Filter/?branch=master)

*Particle\Filter* is a very small filtering library, with the easiest and most usable API we could possibly create.

## Quick usage example

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

## Why Particle\Filter?

User input can contain pretty much anything. Filtering your data should always be done to make sure your data is
correct. With Particle\Filter you have an easy and quick way of doing that. There is an extremely easy API with full
auto-completion support in your IDE.

 - **A clear API**, so you understand it just by looking at it, and adding a filter is a breeze.
 - IDE-supported **code-completion**, so you don't have to look at documentation to write a rule.
 - **Well-documented**, so that if you *do* go to the documentation, you don't have to search for long.
 - **Extensible**, so you can simply add your own filter-rules.
 - **Well-tested**, so that you're absolutely sure that you can rely on the validation rules.
 - **Zero** dependencies, so that you can use it in *any* PHP project.
 
Although there are many filtering libraries out there, they seem to lack in one or more of the
above design goals.
