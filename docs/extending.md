# Extending the Filter

Extending `Particle\Filter` leads to some boilerplate code, because of the fact that the filter-rules actually exist
as methods on the *FilterResource* object. This is because we want IDE-supported code-completion. So, in order to
write your own rules, you'll need to overwrite two classes: the *Filter* itself, and the *FilterResource*.

Overwriting the Filter itself is quite simple:

```php
use Particle\Filter\Filter;

class MyFilter extends Filter
{
    /**
     * {@inheritdoc}
     * @return MyFilterResource
     */
    public function value($key)
    {
        return $this->getFilterResource($key);
    }

    /**
     * {@inheritdoc}
     * @return MyFilterResource
     */
    public function values(array $keys)
    {
        return $this->getFilterResource($keys);
    }

    /**
     * {@inheritdoc}
     * @return MyFilterResource
     */
    public function all()
    {
        return $this->getFilterResource();
    }

    /**
     * {@inheritdoc}
     * @return FilterResource
     */
    public function getFilterResource($keys = null)
    {
        return new MyFilterResource($this, $keys);
    }
}
```

As you can see, it returns a different implementation of the *FilterResource* object. That's where you can add
the new filter-rules to the *FilterResource*. Luckily, also overwriting the *FilterResource* itself is rather simple:

```php
use Particle\Filter\FilterResource;

class MyFilterResource extends FilterResource
{
    /**
     * @return $this
     */
    public function grumpify()
    {
        return $this->addRule(new FilterRule\Grumpify);
    }
}
```

So we've exposed a new public method to the *FilterResource*: grumpify. However, that filter-rule doesn't exist
in the default filter, so we have to build it:

```php
use Particle\Filter\FilterRule;

class Grumpify extends FilterRule
{
    public function filter($value)
    {
        return 'I hate ' . $value . '!';
    }
}
```

All that's left is actually using your own filter:

```php
$f = new MyFilter();
$f->value('test')->trim()->grumpify();
$result = $f->filter([
    'test' => '  icecream  ',
]);
var_dump($result); // array(1) { ["test"]=> string(16) "I hate icecream!" }
```

That's that: you can now go wild on adding filter rules. If you think a rule should be added to the main
Particle\Filter repository, please create a pull request (or an issue).
