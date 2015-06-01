### Included filter-rules

Particle\Filter tries to provide you the most common filters. An overview is listed below. If you want to add custom
filters, take a look at the callback filter-rule, or check out "Extending the Filter" in the menu.

## Filter rules

* [append](#append)
* [bool](#bool)
* [callback](#callback)
* [float](#float)
* [int](#int)
* [lower](#lower)
* [prepend](#prepend)
* [regexReplace](#regexreplace)
* [replace](#replace)
* [string](#string)
* [stripHtml](#striphtml)
* [trim](#trim)
* [upper](#upper)
* [upperFirst](#upperfirst)

## Append

Appends a value to the end of the provided value.

```php
$f = new Filter;
$f->value('name')->append(' is your name.');
$result = $f->filter(['name' => 'Rick']);
// array(1) { ["name"]=> string(18) "Rick is your name."
```

## Bool

Make sure the value is a boolean. Check [PHP Validate filters](http://php.net/manual/en/filter.filters.validate.php)
for the expected outcome.

```php
$f = new Filter;
$f->value('newsletter')->bool();
$result = $f->filter(['newsletter' => 'yes']);
// array(1) { ["newsletter"]=> bool(true)
```

## Callback

@todo

## Float

@todo

## Int

@todo

## Lower

@todo

## Prepend

Appends a value to the end of the provided value.

```php
$f = new Filter;
$f->value('name')->prepend('Hello ');
$result = $f->filter(['name' => 'Rick']);
// array(1) { ["name"]=> string(10) "Hello Rick"
```

## RegexReplace

@todo

## Replace

@todo

## String

@todo

## StripHtml

@todo

## Trim

@todo

## Upper

Uppercase the full value.

```php
$f = new Filter;
$f->value('name')->upper();
$result = $f->filter(['name' => 'rick']);
// array(1) { ["name"]=> string(4) "RICK"
```

## UpperFirst

Uppercase the first character of the value.

```php
$f = new Filter;
$f->value('name')->upperFirst();
$result = $f->filter(['name' => 'rick']);
// array(1) { ["name"]=> string(4) "Rick"
```
