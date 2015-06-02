# Basic usage

First of all, Particle\Filter expects an array of values to filter. Once you have an array and you have installed
Particle\Filter (preferable with composer), you're ready to filter your array. First you need a new filter.

```php
use Particle\Filter\Filter;

$data = [
    'first_name' => ' rick',
    'mid_name' => 'van der',
    'last_name' => 'staaij ',
    'username' => 'RickvdStaaij',
];

$f = new Filter;
```

## Selecting values to filter

Particle\Filter can filter specific values by array key. You can filter on either one key, a set of keys or at all
values in the provided data.

### Filter by key

If you want to target one specific value of the array, use `$f->value($arrayKey)` and add/chain the filters you
want to apply.

```php
$f->value('first_name')->trim()->upperFirst();
```

### Filter by a set of keys

If you want to target multiple values of the array, use `$f->values(string[])` and add/chain the filters you
want to apply.

```php
$f->values(['first_name', 'last_name'])->trim()->upperFirst();
```

### Filter all values

If you want to target all values of the array, use `$f->all()` and add/chain the filters you want to apply.

```php
$f->all()->trim();
```

## Chaining filter-rules

Once you have selected the value(s) you want to filter, you can chain all wanted filter-rules. Your IDE will show you
all the available filter-rules.

```php
$f->value('first_name')->trim()->lower()->upperFirst()->replace(' ', '-');
```

## Filtering the array

Once you have specified what values of the array you want to target with what filters, you can simply call 
`$f->filter($data)`. The result of the filter function is the filtered data array.

```php
$result = $f->filter($data);
```
