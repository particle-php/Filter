# Multibyte encoding

To make sure your values get filtered correctly, we have to use the multi-byte (`mb_`) functionality from PHP. With
this feature comes the ability to set the encoding format on the filter.

```php
$filter = new Particle\Filter\Filter;

$filter->setEncodingFormat('utf-8'); // or another format if you like
```

If you don't use the function above, the string adaptive functions from php will use the default value from your
php.ini, which is most likely UTF-8.

**Note:** Make sure that you set the encoding format on before you add any filter rules to the filter, otherwise the
default encoding format will be used on the filter rules defined before that setEncodingFormat.

### Converting values to a specific encoding format

If you know data is coming in in a different encoding format than what you want to be working with, you can use the
encode filter rule to convert the value.

```php
$filter->value('first_name')->encode('UTF-8')->upper();
```

### Using multibyte a regex

If you want to use multi-byte encoded regex, the following php functions should be used:

```php
mb_regex_encoding('UTF-8');
```

These functions are not included in Particle\Filter as it might lead to unexpected behaviour.
