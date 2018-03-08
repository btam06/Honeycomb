# Honeycomb

Honeycomb is a collection of useful utility objects that are framework/library agnostic.  Each
class aims to do one thing and do it well.

## MethodSort

The `MethodSort` class is a stateful object which implements `__invoke`, such that an instance of
the object can be passed as a preconfigured comparison function for standard sorting.  Method sort
enables ordering objects via the results of called methods.

For example.  Let's say you have a Person:

```php
class Person {
	public function __construct($firstname, $lastname) {
		$this->firstname = $firstname;
		$this->lastname  = $lastname;
	}

	public function getFirstName()
	{
		return $this->firstname;
	}

	public function getLastName()
	{
		return $this->lastname;
	}
}
```

Now let's say you have an array of people:

```php
$objects     = [
	'ms' => new Person('Matthew', 'Sahagian'),
	'mj' => new Person('Matthew', 'Jones'),
	'bt' => new Person('Brian', 'Tam')
];
```

You can sort them, by first name, then by last name using `MethodSort`:

```php
$method_sort = new Honeycomb\MethodSort();

$method_sort->setOrder([
	'getFirstName' => 'asc',
	'getLastName'  => 'asc'
]);

uasort($objects, $method_sort);
```

Objects now contains:

```php
array (
  'bt' =>
  Person::__set_state(array(
     'firstname' => 'Brian',
     'lastname' => 'Tam',
  )),
  'mj' =>
  Person::__set_state(array(
     'firstname' => 'Matthew',
     'lastname' => 'Jones',
  )),
  'ms' =>
  Person::__set_state(array(
     'firstname' => 'Matthew',
     'lastname' => 'Sahagian',
  )),
)
```
